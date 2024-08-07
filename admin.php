<?php
include_once "./Front-end/Header.php";

session_start(); // Ensure session is started

if (!isset($_SESSION['isAdmin']) || $_SESSION['isAdmin'] === 0) {
    header("Location: /error.php");
    exit; // Ensure script stops executing
}
?>
    <h1>Admin page</h1>
<?php
// Admin page details CRUD
include "./Back-End/Admin/Create.php";
include_once "./Front-end/Footer.php";
?>