<?php

$curl = curl_init();


$client_id =  'd4c860fba30d49e5ad6cce24a046379b';
$client_secret = '5174c572bd624d8588ce342797b766a4';

curl_setopt($curl, CURLOPT_URL, "https://accounts.spotify.com/api/token");
curl_setopt($curl, CURLOPT_POST, 1);
curl_setopt($curl, CURLOPT_POSTFIELDS, "grant_type=client_credentials");
$headers = array("Authorization: Basic ".base64_encode($client_id.":".$client_secret));
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($curl);
curl_close($curl);


$token = json_decode($result)->access_token;
$curl = curl_init();
$parametro = http_build_query(array( "type" => "artist", "q" => $_POST['artist']));
curl_setopt($curl, CURLOPT_URL, "https://api.spotify.com/v1/search?".$parametro);
$headers = array("Authorization: Bearer ".$token);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($curl);
echo $result;
curl_close($curl);

?>