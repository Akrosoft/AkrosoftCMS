<?php

  use Illuminate\Http\Request;


  if (!function_exists('getDBServerInstallationStatus')){
        /**
        * checks if a database engine has been installed
        * 
        * @return boolean
        */
      function getDBServerInstallationStatus($os){
        
        $hasDBServerInstalled = null;
        

        switch($os) {
            case 'Linux':
                {
                    // check if MySQL Server is Installed
                    $hasDBServerInstalled = shell_exec('mysql --version');
                    if ($hasDBServerInstalled === null) {
                        $hasDBServerInstalled = shell_exec('postgres -V');
                    }
                    //  check if Postgres Server is Installed
                }
                break;
            case 'Mac':
                {

                }
                break;
            case 'Windows':
                {

                }
                break;
            default:
                dd("Akrosoft CMS was not designed to work properly for your OS type.");
        }

        return [
            'DBServerIsInstalled' => $hasDBServerInstalled? true : false,
            'DBServerInfo' => $hasDBServerInstalled
        ];
      }
  }

?>