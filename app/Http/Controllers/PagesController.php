<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;

class PagesController extends Controller
{
    public function index(Request $request) {
        
        if (false) {
            $page_request = $request->all();
            
            $page = isset($page_request['page']) ? $page_request['page'] : null;

            if($page) {
                $page = SitePagesController::getPageBySlug();
                if ($page == "error") {
                    dd($page);
                }
                // $data = SitePagesController::getSitePageContents($page);
                dd($page);

            } else {
                $page = SitePagesController::getHomePage();
                // $data = SitePagesController::getSitePageContents($page);
                dd($page);
            }
        } else {
            // get OS Type
            $OS = getOSType();
            
            //  Check if database server is installed!!!
            $hasDBServerInstalled = getDBServerInstallationStatus($OS);

            if ($hasDBServerInstalled['DBServerIsInstalled']) { 
            /*
            if Db Server is installed proceed to get environment variable
            */

            // Display DB Server info
            // dd($hasDBServerInstalled['DBServerInfo']);

            // Check if .env file exist
                $dotENV = app()->environmentFilePath();

                if (file_exists($dotENV)) {
                    if (static::isENVConfigured()) {
                        return static::yesENVIsConfigured();
                    } else {
                        return static::noENVIsNotConfigured();
                    }
                }
            } else {
            /*
            if Db Server is NOT installed, ask user to install a database server
            MySQL Server or PostgreSQL
            */
                dd("You DO NOT have a DATABASE SERVER install on this machine, Please Install MySQL Database Server or PostgreSQL Database Server to use Akrosoft CMS.");
            }
        }
    }

    public function contactGetRequest(Request $request) {
        return view('site.contact');
    }

    public function contactPostRequest(Request $request) {
        if ($request->ajax()) {
            
            $this->validate($request, [
                'formData' => 'required'
            ]);

            $contact = new Contact;
            $contact->fullname = $request->formData['fullname'];
            $contact->email = $request->formData['email'];
            $contact->phone = $request->formData['phone'];
            $contact->message = $request->formData['message'];
            if (isset($request->formData['subject'])) {
                $contact->subject = $request->formData['subject'];
            }
            $contact->response_id = 1;

            if ($contact->save()) {
                return response()->json([
                    'status' => true,
                    'message' => "Message sent, you'll be contacted by one of our representative shortly.",
                    'url' => ''
                ]);
            }
            return response()->json([
                'status' => false,
                'message' => 'Message was not sent, please try again later.',
                'url' => ''
            ]);
        }
    }

    private static function isENVConfigured() {

        $app_key = env('APP_KEY');

        $connection = env('DB_CONNECTION');
        $host = env('DB_HOST');
        $port = env('DB_PORT');
        $database = env('DB_DATABASE');
        $username = env('DB_USERNAME');
        $password  = env('DB_PASSWORD');

        if ( !$connection || !$host || !$port ||
            (!$database || $database == "homestead") ||
            (!$username || $username === "homestead") ||
            (!$password || $password === "secret")
            ) {
                return false;
        }
        return true;
    }

    private static function yesENVIsConfigured() {
        return redirect('/manager/login');
    }

    private static function noENVIsNotConfigured() {
        return redirect('/akrosoft-cms');
    }
}
