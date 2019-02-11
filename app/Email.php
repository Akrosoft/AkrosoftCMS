<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\SiteAttribute;
use App\ConfigureEmail;
use App\Contact;

class Email extends Model
{
    protected $table = 'emails';
    protected $primaryKey = 'id';
    public $timestamps = true;

    private static $data;

    protected $fillable = [
        'sender', 'recipient', 'subject', 'message'
    ];

    public function statusCode() {
        return $this->belongsTo('App\EmailStatusCode', 'status', 'id');
    }

    public static function initializeEmail($data){
        static::$data = (object)$data;

        return new Email();
    }

    private function loadEmailTemplate($templateName, $emailData) {
        // Get Data to configure load email request
        $emailProcessingData = (array)$emailData['sendEmailRequestInfo'];

        // Get call to action configuration if email has a call to action option
        $callToAction = (object)(isset($emailData['callToAction']) ? $emailData['callToAction'] : null);
        
        $templateMessage = $this->loadEmailMessage($templateName, $emailProcessingData);
        // if message body is not set, use email template body from database
        if ( !isset($emailProcessingData["message"]) ) {
            $emailProcessingData["message"] = $templateMessage->message;
        }
    
        // if message subject is not set, use email template subject from database
        if (!isset($emailProcessingData["subject"])) {
            $emailProcessingData["subject"] = $templateMessage->subject;
        }

        $emailProcessingData["message"] = preg_replace("/[\r]/", "<br />", $emailProcessingData["message"]);
        
        
        $message = [
            "body" => $emailProcessingData["message"], "subject" => $emailProcessingData["subject"]
        ];

        if (!isset($message['cta_link']) && ($callToAction && isset($callToAction->link))) {
            $message["cta_link"] = $callToAction->link;
            $message["cta_text"] = $callToAction->label;
        }

        return (Object)$message;
    }
    
    private function loadEmailMessage($message_name, $data) {
        $settings = ConfigureEmail::loadTemplateParams($message_name);
        
        $message_data = (object)[
            "subject" => isset($settings->subject)? $settings->subject : null, 
            "message" =>  isset($settings->message)? $settings->parseMessage($data) : null
        ];
        return $message_data;
    }

    public static function buildContact($recipient_name, $recipient_email) {
        return "{$recipient_name} <{$recipient_email}>";
    }

    private function sendEmail($recipient, $message, $attachments = []) {
        $sender = static::getEmailSender();
        $from = $this->buildContact($sender->name, "no-reply@" . $sender->domain);
        
        $logEmail = static::saveSentEmail($from, $recipient, $message, $attachments);
        $result = $logEmail->sendMessage($message);
        return $result;
    }

    private function saveSentEmail($from, $recipient, $message, $attachments = []) {
        $logEmail = new Email([
            'sender' => $from, 
            'recipient' => $recipient, 
            'subject' => $message->subject,
            'message' => $message->body,
            'attachments' => $attachments
        ]);
        
        $logEmail->save();
        
        return $logEmail;
    }

    public function sendMessage($extract_cta) {
        $sender = $this->sender;
        $email = $this->recipient;
        $site_url = asset('/');
        $client_name = SiteAttribute::getClientName();
        $logo_link = SiteAttribute::getClientLogo();
        $subject = $this->subject;
        $message_body = $this->message;
        $cta_link = isset($extract_cta->cta_link) && $extract_cta->cta_link != null ? $extract_cta->cta_link : null;
        $cta_text = isset($extract_cta->cta_text) && $extract_cta->cta_text != null ? $extract_cta->cta_text : null;
        try {
            \Mail::send('email.index', compact('site_url', 'client_name', 'logo_link', 'subject', 'message_body', 'cta_link', 'cta_text'), function ($message) 
                use ($email,$subject)  { 
                    $message->to($email)->subject($subject);
            });

            if( count(\Mail::failures()) > 0 ) {
                $response = false;
            } else {
                $response = true;
            }
        } catch (\Exception $ex) {
            $response = $ex->getMessage();
        }
        
        return $response;
    }

    public function administratorContactReplyEmail() {
        $d = self::$data;
        $message = $this->loadEmailTemplate("welcome_to_akrosoft_cms", [
            "callToAction" => null, 
            "sendEmailRequestInfo" => $d
        ]);
        $to = $d->recipient;
        $sent = $this->sendEmail($to, $message, []);
    
        return $sent;
    }

    public function sendToAllContacts() {
        $d = self::$data;
        $message = $this->loadEmailTemplate("", [
            "callToAction" => $d->callToAction, 
            "sendEmailRequestInfo" => $d
        ]);

        $params = $d->params;
        $temp_message = $message->body;
        $contacts = Contact::all();
        foreach ($contacts as $contact) {
            $params['name'] = $contact->fullname;
            $params['email'] = $contact->email;
            $message->body = $this->parseComposedMail($temp_message, $params);
            $sent = $this->sendEmail($contact->email, $message, []);
        } 
        
        return true;
    }

    public function sendToSelectedContacts() {
        $d = self::$data;
        $message = $this->loadEmailTemplate("", [
            "callToAction" => $d->callToAction, 
            "sendEmailRequestInfo" => $d
        ]);

        $contact_id = $d->contactList;
        $params = $d->params;
        $temp_message = $message->body;

        for($i=0; $i < count($contact_id); $i++) {
            $contact = Contact::find($contact_id[$i]);
            $message->body = null;
            $params['name'] = $contact->fullname;
            $params['email'] = $contact->email;
            $message->body = $this->parseComposedMail($temp_message, $params);
            $sent = $this->sendEmail($contact->email, $message, []);
        }
    
        return true;
    }

    public  function sendToAnEmailAddress() {
        $d = self::$data;
        $message = $this->loadEmailTemplate("", [
            "callToAction" => $d->callToAction, 
            "sendEmailRequestInfo" => $d
        ]);
        $temp_message = $message->body;
        $email = $d->email;
        $params = $d->params;
        $params['email'] = $email;
        $message->body = $this->parseComposedMail($temp_message, $params);
        $sent = $this->sendEmail($email, $message, []);

        return true;
    }

    private function parseComposedMail($message, $emailParams=[]) {
        $matches = [];
        preg_match_all("/#([a-z][a-zA-Z]\w+)/", $message, $matches);

        if (empty($matches)) {
            return $message;
        }

        $params = (Object) $emailParams;
        $msg = $message; 
        

        foreach ($matches[1] as $p) {
            if (isset($params->{$p})) {
                $msg = str_replace("#{$p}", $params->{$p}, $msg);
            }
        }

        return $msg;
    }

    private static function getEmailSender() {
        return SiteAttribute::getClientEmailSendDetails();
    }
}
