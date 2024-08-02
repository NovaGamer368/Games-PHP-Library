<?php

session_start();
include_once "./dbConnector.php";

header('Content-Type: application/json');

$response = array();

// Process if there is a parameter (username and password)
if (array_key_exists("username", $_GET) && array_key_exists("password", $_GET)) {
    // Get the db connection
    $myDbConn = ConnGet();
    $myUsername = $_GET["username"];
    $myPassword = $_GET["password"];

    $dataSet = MyLogin($myDbConn, $myUsername, $myPassword);

    // If the data exists, format the values
    if ($dataSet) {
        // Fetch associative array
        if ($row = mysqli_fetch_assoc($dataSet)) {
            $_SESSION['username'] = $row['Username']; 
            $_SESSION['isAdmin'] = $row['isAdmin']; 

            $response = array(
                "status" => "success",
                "Username" => $row['Username'],
                "isAdmin" => $row['isAdmin']
            );
        } else {
            $response = array("status" => "error", "message" => "Invalid credentials.");
        }
    } else {
        $response = array("status" => "error", "message" => "Query failed.");
    }
    mysqli_close($myDbConn);
} else {
    $response = array("status" => "error", "message" => "Missing parameters.");
}

echo json_encode($response);
?>