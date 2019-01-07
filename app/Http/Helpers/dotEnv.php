<?php

  use Illuminate\Http\Request;


  if (!function_exists('createDotEnvFileIfItDoesNotExist')){
        /**
         * checks if .env file exist
         * 
         * 
         * @return boolean
         */
      function createDotEnvFileIfItDoesNotExist($file){
        $dotEnvPathArray = explode('/', $file);
        $appPath = "";

        for($i=0; $i < count($dotEnvPathArray)-1; $i++) {
            $appPath .= $dotEnvPathArray[$i] . "/";
        }

        try {
          $exampleEnv = $appPath .'.env.example ';

          shell_exec('cp -a ' . $exampleEnv .' ' . $file);
          $appKey = 'APP_KEY=' . getAppKey();
          // changeEnvironmentVariable('APP_KEY', $appKey);
          $file=fopen($file,"a+") or exit("Unable to open file!");
          if ($appKey <> "") {
            fwrite($file,"\n\n".$appKey."\n");
          }
          fclose($file);
          return;
        } catch (\Exception $ex) {
          dd($ex);
        }
      }
  }
  
?>