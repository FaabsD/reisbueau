<?php
include_once('IdP/IdP.php');
$username = "reisbureau ZIP";
$password = "123";
$credentials = array();
$credentials['username'] = $username;
$credentials['password'] = $password;
$credentials['exp'] = time() + (60*60);

$idp = new IdP($credentials);

