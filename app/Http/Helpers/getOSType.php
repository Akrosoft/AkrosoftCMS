<?php

  use Illuminate\Http\Request;


  if (!function_exists('getOSType')){
    /**
    * checks if a database engine has been installed
    * 
    * @return boolean
    */
    function getOSType(){
        // Simple browser and OS detection script.
        // This will not work if User Agent is false.

        $agent = $_SERVER['HTTP_USER_AGENT'];

        // Detect Device/Operating System

        if(preg_match('/Linux/i',$agent)) $os = 'Linux';
        elseif(preg_match('/Mac/i',$agent)) $os = 'Mac'; 
        elseif(preg_match('/iPhone/i',$agent)) $os = 'iPhone'; 
        elseif(preg_match('/iPad/i',$agent)) $os = 'iPad'; 
        elseif(preg_match('/Droid/i',$agent)) $os = 'Droid'; 
        elseif(preg_match('/Unix/i',$agent)) $os = 'Unix'; 
        elseif(preg_match('/Windows/i',$agent)) $os = 'Windows';
        else $os = 'Unknown';

        if ($os === 'Linux' || $os === 'Mac' || $os === 'Windows') {
            return $os;
        } else {
            return "Unknown";
        }
    }
}

?>