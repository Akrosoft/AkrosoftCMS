<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index() {
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
