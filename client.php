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
$sheet2 = "slot";

$params = [
    'valueInputOption' => 'USER_ENTERED'
];

function giveDate($tid) {
    $dcode = substr($tid,0,2);
    if ($dcode == 18 || $dcode == 25) {
        $dstr = "Monday";
    } else if ($dcode == 19 || $dcode == 26) {
        $dstr = "Tuesday";
    } else if ($dcode == 21 || $dcode == 28) {
        $dstr = "Thursday";
    } else if ($dcode == 22 || $dcode == 29) {
        $dstr = "Friday";
    }
    return $dstr . ", " . $dcode . " May 2020"; 
}

function giveHour($tid) {
    $hcode = substr($tid,2,2);
    $mcode = substr($tid,4,2);
    return $hcode . ":" . $mcode; 
}

function giveCode($date, $hour) {
    return $date . $hour;
}

function isWeek11($tid) {
    $dcode = substr($tid,0,2);
    if ($dcode == 18 || $dcode == 19 || $dcode == 21 || $dcode == 22) {
        return TRUE;
    } else if ($dcode == 25 || $dcode == 26 || $dcode == 28 || $dcode == 29) {
        return FALSE;
    }
}

function updateSpreadSheet($value, $sheet, $range, $service, $spreadsheetId, $params) {
    $new_values = [[$value]];
    $updateRange = $sheet . "!B" . $range;
    $body = new Google_Service_Sheets_ValueRange(['values' => $new_values]);
    $result = $service->spreadsheets_values->update($spreadsheetId, $updateRange, $body, $params);
}