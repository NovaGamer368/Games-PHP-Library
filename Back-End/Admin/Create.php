<?php
include_once "../../Front-end/Header.php";
?>
    <center >
        <p id="A"></p> <!--DEBUG PURPOSES-->
        <p id="B"></p> <!--DEBUG PURPOSES-->
        <div>
            <input type="text" id="GameNameInput" placeholder="Name"/>
            
            <input type="text" id="GameCreatorInput" placeholder="Creator"/>
            
            <input type="text" id="GameGenreInput" placeholder="Genre"/>
            
            <input type="text" id="GameDescInput" placeholder="Description"/>
            </div>
             <button name="a" onclick="myClickEvent()">Create</button>
        </div>           
    </center>
    <script>
        function myClickEvent() {
            if (document.getElementById("GameNameInput").value && 
                document.getElementById("GameCreatorInput").value && 
                document.getElementById("GameGenreInput").value && 
                document.getElementById("GameDescInput").value) {
                loadJson(
                    document.getElementById("GameNameInput").value, 
                    document.getElementById("GameCreatorInput").value, 
                    document.getElementById("GameGenreInput").value, 
                    document.getElementById("GameDescInput").value
                );
                document.getElementById("GameNameInput").value = "";
                document.getElementById("GameCreatorInput").value = "";
                document.getElementById("GameGenreInput").value = "";
                document.getElementById("GameDescInput").value = "";
            } else {
                alert("All fields are required.");
            }
        }

        function loadJson(name, creator, genre, description) {
            var request = new XMLHttpRequest();
            request.open('POST', './Back-End/apiSqlQuery.php', true);
            request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            request.onload = function () {
                if (request.status >= 200 && request.status < 400) {
                    if (request.status === 200) {
                        alert("Game successfully created!");
                    } else {
                        alert("Error: " + request.message);
                    }
                } else {
                    alert("Error: " + request.status);
                }
            };

            request.onerror = function () {
                alert("Request failed");
            };

            var postData = `name=${encodeURIComponent(name)}&creator=${encodeURIComponent(creator)}&genre=${encodeURIComponent(genre)}&description=${encodeURIComponent(description)}`;
            request.send(postData);
        }
</script>

<?php
include_once "../../Front-end/Footer.php"
    ?>
   