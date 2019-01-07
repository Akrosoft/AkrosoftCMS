<?php

  use Illuminate\Http\Request;


  if (!function_exists('testDBConnectivity')){
    /**
    * 
    * @return null
    */
    function testDBConnectivity($configuration) {

      $servername = $configuration['host'];
      $username = $configuration['username'];
      $password = $configuration['password'];
      $database = $configuration['database'];

      try {
        $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return response()->json([
          'status' => true,
          'message' => 'Connected Successfully.'
        ]);
      } catch(PDOException $e) {
        return response()->json([
          'status' => false,
          'message' => "Connection failed. Please ensure database credentials are correct."
        ]);
      }
    }
  }
  
?>