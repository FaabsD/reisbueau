<?php
include_once('IdP/IdP.php');
$username = "reisbureau ZIP";
$password = "123";
$credentials = array();
$credentials['username'] = $username;
$credentials['password'] = $password;
$credentials['exp'] = time() + (60*60);

$idp = new IdP($credentials);

$token = $idp->getToken();

$APIurl = "http://localhost/reisbureau/IdP/microservices/GetStedentripsApi.php";

// creëer url resource
$ch = curl_init($APIurl);

// set header options
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer '.$token));

// post gegevens
$curl_post_data = array(
    'apiKey' => '1234567890',
    'username' => $username,
    'password' => $password,
);

// enable post method
curl_setopt($ch, CURLOPT_POSTFIELDS, $curl_post_data);

// return results as string
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// run service request
$response = curl_exec($ch);


