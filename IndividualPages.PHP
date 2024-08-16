<?php
include_once "./Front-end/Header.php";

if (isset($_POST['selectedIndex'])) {
    $selectedIndex = $_POST['selectedIndex'];
} else {
    $selectedIndex = 1;
}

?>

<!--<form method="post" name="nextpage">

    <button type="submit" name="nextpageBTN">Next</button>

</form>
    
    <script>

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        if (isset($_POST['nextpage'])) {

            $i++

            include_once "./IndividualGamesPages/IndividualPage{\$i}.php";

        } else {

            throw Exception("how did you do that?")

        }


    }


</script>-->

<!--<h1>SELECTED INDEX <?php echo $selectedIndex ?></h1>-->

<center>
    <div>
        <form method="post" class="showGames">
            
            <!--3 buttons that load the 3 individual pages-->
            <div>
                <button type="submit" name="selectedIndex"  value="1">next</button>
                <button type="submit" name="selectedIndex" value="2">Page 2</button>
                <button type="submit" name="selectedIndex" value="3">Page 3 </button>
            </div>
        </form>
    </div>
</center>

<?php
switch ($selectedIndex) {
    //switch case that allows the user to look at the 3 different "individual" pages
    case 1:
        include_once "./IndividualGamesPages/IndividualPage1.php";
        break;
    case 2:
        include_once "./IndividualGamesPages/IndividualPage2.php";
        break;
    case 3:
        include_once "./IndividualGamesPages/IndividualPage3.php";
        break;
}

include_once "./Front-end/Footer.php";
?>