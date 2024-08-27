<?php
session_start();
include_once "./dbConnector.php";
header('Content-Type: application/json');
$myJson = "";
$row = null;
$myDbConn = ConnGet();
if (array_key_exists("gsi", $_GET) && isset($_SESSION['gsi']) && $_SESSION['gsi'] != "") {
    $myJsonResult = GameSearch($myDbConn, $_SESSION['gsi']);
} else {
    $myJsonResult = GamesGet($myDbConn);
}

if(array_key_exists("genre",$_GET)){
    $myJsonResult = GameGenresGet($myDbConn);
}

if (array_key_exists("filter", $_GET)) {
    $myJsonResult = GameFilterGenre($myDbConn, $_SESSION['genre']);
}

if(array_key_exists('id', $_GET)){
    $myJsonResult = GetGameById($myDbConn, $_SESSION['id']);
    $myJsonImage = GetGameImage($myDbConn, $_SESSION['id']);
}

if ($myJsonResult) {
    // Loop through records and get json
    while ($row = mysqli_fetch_array($myJsonResult)) {
        $rowArray[] = json_decode($row[0]);
    }
    if ($myJsonImage) {
        while ($row2 = mysqli_fetch_array($myJsonImage)) {
            $rowArray2[] = json_decode($row2[0]);
        }
        $myJson = json_encode(array('a' => $rowArray, 'b' => $rowArray2));
    } else {
    $myJson = json_encode($rowArray);
    }
    if(array_key_exists("genre", $_GET)) {
        $_SESSION['genres'] = $myJson;
    }
}
$myDbConn->close();

echo $myJson;
?>