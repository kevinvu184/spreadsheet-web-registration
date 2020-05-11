<?php

require __DIR__ . '/vendor/autoload.php';

$client = new \Google_Client();
$client->setApplicationName('Network Programming Demo Registration');
$client->setScopes([\Google_Service_Sheets::SPREADSHEETS]);
$client->setAccessType('offline');
$client->setAuthConfig(__DIR__ . '/credentials.json');

$service = new Google_Service_Sheets($client);

$spreadsheetId = "1oF6Pu1tK-8WcfDQzwkCQepPyBpanp319MTk1VSXzEUs";
$sheet1 = "student";
$sheet2 = "team";
$sheet3 = "slot";