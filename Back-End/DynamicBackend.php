<?php
session_start();
header('Content-Type: application/json');
$response = array();
if (array_key_exists("id", $_GET)) {
    if(isset($_SESSION["id"])) {
        if ($_SESSION["id"] == 4) {
            $_SESSION["id"] = 1;
        } else {
            $_SESSION["id"] = $_SESSION["id"] + 1;
        }        
    } else {
        $_SESSION["id"] = 1;
    }
} else {
    $response = array("status" => "error", "message" => "Missing parameters.");
}
echo json_encode($response);
?>