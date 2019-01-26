<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConfigureEmail extends Model
{
    protected $table = 'configure_emails';
    protected $primaryKey = 'id';
    public $timestamps = true;

    /*
        This function get the store email template from the database by email template name 
        attribute 
    */
    public static function loadTemplateParams($message_name) {
        return static::where('name', $message_name)->first();
    }

    public function parseMessage($data) {
        $matches = [];
        preg_match_all("/#([a-z][a-zA-Z]\w+)/", $this->message, $matches);

        if (empty($matches)) {
            return $this->message;
        }

        $params = (Object) $data;
        $msg = $this->message;  

        foreach ($matches[1] as $p) {
            if (isset($params->{$p})) {
                $msg = str_replace("#{$p}", $params->{$p}, $msg);
            }
        }

        return $msg;
    }

    public function getParamsAttribute($params) {
        if (!preg_match('/,/', $params)) {
            return [$params];
         }
   
         return explode(",", $params);
    }
}
