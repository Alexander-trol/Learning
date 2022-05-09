<?php
  function fetch($url, $method='GET', $payload = null){

    $req = curl_init();

    $options = array(
      CURLOPT_POST => strtolower($method) == 'post' || $payload != null ? true : false,
      CURLOPT_URL => $url,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_MAXREDIRS => 3,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_SSL_VERIFYPEER => false,
      CURLOPT_TIMEOUT => 5 
    );

    if($payload != null){
      $json = json_encode($payload);
      $options[CURLOPT_HTTPHEADER] = array(
        'Content-Type: application/json',
        'Content-Length: ' . strlen($json)
      );
      $options[CURLOPT_POSTFIELDS] = $json;
    }

    curl_setopt_array($req, $options);
  
    $response = curl_exec($req);
  
    if($response == false){
      $error = curl_error($req);
      curl_close($req);
      throw new ErrorException($error);
    }
    else{
      curl_close($req);
      return $response;
    }
  }
?>