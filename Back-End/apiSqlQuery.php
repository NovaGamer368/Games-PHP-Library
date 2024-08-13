<?php
session_start();
include_once "./dbConnector.php";

header('Content-Type: application/json');
$response = array();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $myDbConn = ConnGet();

    $method = $_POST['_method'] ?? '';

    if ($method === 'UPDATE') {
        $id = $_POST['id'] ?? '';
        $name = $_POST['name'] ?? '';
        $creator = $_POST['creator'] ?? '';
        $genre = $_POST['genre'] ?? '';
        $description = $_POST['description'] ?? '';

        if (empty($id) || empty($name) || empty($creator) || empty($genre) || empty($description)) {
            echo json_encode(['status' => 'error', 'message' => 'All fields are required for updating.']);
            exit;
        }

        updateGame($myDbConn, $id, $name, $creator, $genre, $description);
    }
    else if ($method === 'DELETE') {
        $id = $_POST['name'] ?? '';

        if (empty($id) ) {
            echo json_encode(['status' => 'error', 'message' => 'All fields are required for deleting.']);
            exit;
        }

        deleteGame($myDbConn, $id);
    }else {
        $name = $_POST['name'] ?? '';
        $creator = $_POST['creator'] ?? '';
        $genre = $_POST['genre'] ?? '';
        $description = $_POST['description'] ?? '';

        if (empty($name) || empty($creator) || empty($genre) || empty($description)) {
            echo json_encode(['status' => 'error', 'message' => 'All fields are required for creating.']);
            exit;
        }

        createGame($myDbConn, $name, $creator, $genre, $description);
    }

    $myDbConn->close();
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