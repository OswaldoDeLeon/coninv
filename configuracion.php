<?php
require_once 'vendor/autoload.php';

$clientID = '866316404631-8oma80tlmd435q51kqdph11ejb9imhe0.apps.googleusercontent.com';
$clientSecret = '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';
$redirectUri = 'http://127.0.0.1/control-inventarios/home.php';

// create Client to access Google API
$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope("email");
$client->addScope("profile");


?>