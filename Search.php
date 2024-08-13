<?php
include_once "./Front-end/Header.php";

// Check if form is submitted and get the selected index from POST data
if (isset($_POST['selectedIndex'])) {
    $selectedIndex = $_POST['selectedIndex'];
} else {
    $selectedIndex = 0;
}
?>

<h1>Games</h1>
<hr />
<p>This page lets someone search and filter for a specific game or specific information in the database</p>
<br />
<p>The main attributes of these games are their Name, Creator, Genre and Description,  this page allows you to filter by the name, genre, and creatore of a game.</p>
<!--<h1>SELECTED INDEX <?php echo $selectedIndex ?></h1>-->
<center>
    <div>
        <form method="post" class="showGames">
            <div>
                <input type="text" id="GameSearchInput" placeholder="Search"/>
                <button type="submit" name="selectedIndex" value="1">search Games!</button>
                <div>
                <input type="text" id="GameSearchInput" placeholder="Search"/>
                <button type="submit" name="selectedIndex" value="3">search Creator!</button>
                <!--<button type="submit" name="selectedIndex" value="2">search Genre!</button>-->


            </div>
        </form>
    </div>
</center>

<?php
switch ($selectedIndex) {
    case 1:
        include "./Front-end/Games/GamesTable.php";
        break;
    /*    case 2:
        include "./Front-end/Games/GamesNameGenre.php";
        break;*/
    case 3:
        include "./Front-end/Games/GamesNameCreator.php";
        break;
}

include_once "./Front-end/Footer.php";
?>