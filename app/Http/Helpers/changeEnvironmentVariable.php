<?php

  use Illuminate\Http\Request;


  if (!function_exists('changeEnvironmentVariable')){
        /**
         * 
         * 
         * 
         * @return null
         */
      function changeEnvironmentVariable($key, $value) {
        $path = base_path('.env');

        if(is_bool(env($key)))
        {
            $old = env($key)? 'true' : 'false';
        }
        elseif(env($key)==null){
            $old = 'null';
        }
        else{
            $old = env($key);
        }

        if (file_exists($path)) {
            file_put_contents($path, str_replace(
                "$key=".$old, "$key=".$value, file_get_contents($path)
            ));
            return true;
        }
      }
  }
  
?>