<?php

session_start();
include_once "./dbConnector.php";

header('Content-Type: application/json');

$response = array();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the POST data
    $myDbConn = ConnGet();
    $name = $_POST['name'] ?? '';
    $creator = $_POST['creator'] ?? '';
    $genre = $_POST['genre'] ?? '';
    $description = $_POST['description'] ?? '';

    // Validate the data (this is a basic example, you may need more validation)
    if (empty($name) || empty($creator) || empty($genre) || empty($description)) {
        echo json_encode(['status' => 'error', 'message' => 'All fields are required.']);
        exit;
    }

    myNewGame($myDbConn, $name, $creator, $genre, $description);
    //if ($dataSet) {
    //    // Fetch associative array
    //    if ($row = mysqli_fetch_assoc($dataSet)) {
    //        $response = array(
    //            "status" => "success",
    //            "name" => $row['name'],
    //            "creator" => $row['creator'],
    //            "genre" => $row['genre'],
    //            "description" => $row['description']
    //        );
    //    } else {
    //        $response = array("status" => "error", "message" => "Invalid credentials.");
    //    }
    //} else {
    //    $response = array("status" => "error", "message" => "Query failed.");
    //}
     mysqli_close($myDbConn);
    
}

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