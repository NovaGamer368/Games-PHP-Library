<?php
include_once "./dbConnector.php";

header('Content-Type: application/json');

$myDbConn = ConnGet();
$myJsonResult = MyJsonGet($myDbConn);

$myJson = "";
$row = null;

if ($myJsonResult) {
    // Loop through records and get json
    while ($row = mysqli_fetch_array($myJsonResult)) {
        $rowArray[] = json_decode($row[0]);
    }
    $myJson = json_encode($rowArray);
}

$myDbConn->close();

echo $myJson;
