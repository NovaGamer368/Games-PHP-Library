<?php
include_once "dbConnector.php";

header('Content-Type: application/json');

$myJSON = "";
// Process if there is a parameter (id)
if (array_key_exists("username", $_GET) && array_key_exists("password", $_GET)) {
    // Get the db connection
    $myDbConn = ConnGet();
    $myUsername = $_GET["username"];
    $myPassword = $_GET["password"];

    $dataSet = MyUserLogin($myDbConn, $myUsername, $myPassword);
    // Get the records
    // If the data exists, format the values
    if ($dataSet) {
        // Fetch associative array
        if ($row = mysqli_fetch_assoc($dataSet)) {
            $myJSON = json_encode(array(
                "Username" => $row['Username'],
                "isAdmin" => $row['isAdmin']
            ));
        }
    }
    mysqli_close($myDbConn);
}

if (array_key_exists("name", $_GET)) {
    // Get the db connection
    // Get the data
    $myDbConn = ConnGet();
    $myGet = $_GET["name"];
    // Get the records
    $dataSet = MyGetName($myDbConn, $myGet);

    // If the data exists, format the values
    if ($dataSet) {
        // $myJSON = "[";
        if ($row = mysqli_fetch_array($dataSet)) {
            $myJSON = json_encode(array(
                "Name" => $row['Name'],
                "Class" => $row['Class'],
                "STR" => $row['STR'],
                "DEX" => $row['DEX'],
                "INT" => $row['INT']
            ));}
    }
    mysqli_close($myDbConn);
}

echo $myJSON;
?>