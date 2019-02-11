<?php

  use Illuminate\Http\Request;


  if (!function_exists('getAppKey')){
        /**
         * checks if .env file exist
         * 
         * 
         * @return boolean
         */
      function getAppKey(){
        return "base64:iR1qwWXey7laYIkay3jTGYEii7C8kFGVdnCOn63Ava4=";
      }
  }
  
?>