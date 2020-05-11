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

$id = $_POST['id'];

$range = $sheet1 . "!A2:B128";

$response = $service->spreadsheets_values->get($spreadsheetId, $range);
$values = $response->getValues();
if (empty($values)) {
    print "No data found.\n";
} else {
    foreach ($values as $row) {
        if ($row[0] == $id) {
            $cookie_name = "user_name";
            $cookie_value = $row[1];
            setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
            break;
        }
    }
}

header("Location: /np/main.php");
