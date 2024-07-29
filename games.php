<?php
include_once "./Front-end/Header.php"
    ?>
<h1>Games</h1>
<hr />
<p>This page is listing all the possible Games that are in the GamesTable in a MySQL database</p>
<br />
<p>The main attributes of these games are their Name, Creator, Genre and Description</p>

<?php
include "./Front-end/Games/GamesTable.php";
include_once "./Front-end/Footer.php";
?>
