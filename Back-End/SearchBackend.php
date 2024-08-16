<?php
session_start();
header('Content-Type: application/json');
$response = array();
if (array_key_exists("gsi", $_GET)) {
    $gsi = $_GET['gsi'];
    $_SESSION['gsi'] = $gsi;
    $response = array(
        "status" => "success",
        "gsi" => $gsi
    );
} else if (array_key_exists("genre", $_GET)) {
    $genre = $_GET['genre'];
    $_SESSION['genre'] = $genre;
    $response = array(
        "status" => "success",
        "gsi" => $genre
    );
}
else {
    $response = array("status" => "error", "message" => "Missing parameters.");
}
echo json_encode($response);
?>