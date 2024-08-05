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
<p>This page is listing all the possible Games that are in the GamesTable in a MySQL database</p>
<br />
<p>The main attributes of these games are their Name, Creator, Genre and Description</p>
<!--<h1>SELECTED INDEX <?php echo $selectedIndex ?></h1>-->
<center>
    <div>
        <form method="post">
            <div>
                <button type="submit" name="selectedIndex" value="1">Show Games!</button>
                <button type="submit" name="selectedIndex" value="2">Show Games Description</button>
            </div>
            <div>
                <button type="submit" name="selectedIndex" value="3">Show Games Genre</button>
                <button type="submit" name="selectedIndex" value="4">Show Games Creator</button>
            </div>
            <button type="submit" name="selectedIndex" value="5">Show Everything about games!</button>
        </form>
    </div>
</center>

<?php
switch ($selectedIndex) {
    case 1:
        include "./Front-end/Games/GamesName.php";
        break;
    case 2:
        include "./Front-end/Games/GamesNameDesc.php";
        break;
    case 3:
        include "./Front-end/Games/GamesNameGenre.php";
        break;
    case 4:
        include "./Front-end/Games/GamesNameCreator.php";
        break;
    case 5:
        include "./Front-end/Games/GamesTable.php";
        break;
}

include_once "./Front-end/Footer.php";
?>