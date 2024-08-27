<?php
if (isset($_POST['currentGameId'])) {
    $currentGameId = (int)$_POST['currentGameId'] + 1;
} else {
    $currentGameId = 1;
}
?>
<h2>Final Fantasy 14</h2>
<center>
    <form method="post" class="dynamicGamePage">
        <div>
            <button type="submit" name="currentGameId" onclick="GetGameId()">Change Game</button>
        </div>
    </form>
</center>
<script>
    async function GetGameId() {
        var request = new XMLHttpRequest();
        request.open('GET', './Back-End/DynamicBackend.php?id=true', true);
        request.onerror = function () {
            // There was a connection error of some sort
            alert("Request failed");
        };
        await request.send();
    }
</script>
<?php
    if($currentGameId) {
        include_once "./IndividualGamesPages/DynamicPageCreator.php";
        echo "<h5>working</h5>";
    } else {
        echo "<h5>not working</h5>";
    }
?>