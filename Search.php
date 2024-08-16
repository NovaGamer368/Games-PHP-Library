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
<p>The main attributes of these games are their Name, Creator, Genre and Description,  this page allows you to search for a game or filter by a genre.</p>
<!--<h1>SELECTED INDEX <?php echo $selectedIndex ?></h1>-->
<center>
    <div>
        <form method="post" class="showGames">
            <div>
                <!--search block for user to type in what they wanna search for-->
                <input type="text" id="GameSearchInput" placeholder="Search"/>
                <button type="submit" name="selectedIndex" onclick="GSI()" value="1">Search Games!</button>
                <div>
                    <!--allows user to look for games of a specific genre/made by a certain company-->
                    <label for="Filter">Filter</label>
                    <select id="FilterOptions">
                        <?php
                        $genreJSON = $_SESSION['genres'];
                        $genres = json_decode($genreJSON);
                        $list = "";
                        foreach ($genres as $genre) {
                            $g = $genre->Genre;
                            $list .= "<option>" . $g . "</option>";
                        }
                        echo $list;
                        ?>
                    </select>
                <button type="submit" name="selectedIndex" onclick="GSI()" value="2">Filter Games!</button>
                </div>
                <!--<button type="submit" name="selectedIndex" value="3">search Genre!</button>-->
            </div>
        </form>
    </div>
</center>

<script>
    //searches for game
    async function GSI() {
        
        var request = new XMLHttpRequest();
        if (document.getElementById("GameSearchInput").value) {
            var gsi = document.getElementById("GameSearchInput").value;
            request.open('GET', './Back-End/SearchBackend.php?gsi=' + encodeURIComponent(gsi), true);
            //await GSI(document.getElementById("GameSearchInput").value);
        } else if (document.getElementById("FilterOptions").value) {
            var genre = document.getElementById("FilterOptions").value;
            request.open('GET', './Back-End/SearchBackend.php?genre=' + encodeURIComponent(genre), true);
        }
        request.onerror = function () {
            // There was a connection error of some sort
            alert("Request failed");
        };
        await request.send();
    }
</script>

<?php
switch($selectedIndex) {
    case 1:
        include_once "./Front-end/Games/GamesSearch.php";
        break;
    case 2:
        include_once "./Front-end/Games/GamesFilter.php";
        break;
}
include_once "./Front-end/Footer.php";
?>