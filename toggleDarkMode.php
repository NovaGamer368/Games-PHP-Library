<?php
if (isset($_COOKIE["darkMode"])) {
    $darkMode = $_COOKIE["darkMode"] == "1" ? "0" : "1";
} else {
    $darkMode = "1";
}

setcookie("darkMode", $darkMode, time() + (365 * 24 * 60 * 60), "/");
echo "Cookie set to " . $darkMode;
?>
