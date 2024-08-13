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
<p>This page lets someone search for a specific game in the database</p>
<br />
<p>The main attributes of these games are their Name, Creator, Genre and Description</p>
<!--<h1>SELECTED INDEX <?php echo $selectedIndex ?></h1>-->
<center>
    <div>
        <form method="post" class="showGames">
            <div>
                            <input type="text" id="GameNameInput" placeholder="Name"/>
                <button type="submit" name="selectedIndex" value="1">search games!</button>
            </div>
        </form>
    </div>
</center>

<?php
switch ($selectedIndex) {
    case 1:
        include "./Front-end/Games/GamesTable.php";
        break;
}

include_once "./Front-end/Footer.php";
?>