<?php
include_once "../../Front-end/Header.php";
?>



    <center >
        <p id="A"></p> <!--DEBUG PURPOSES-->
        <p id="B"></p> <!--DEBUG PURPOSES-->
        <form>
            <input type="text" id="GameIdInput" placeholder="Game Id"/>
            <input type="text" id="GameNameInput" placeholder="Name"/>
            
            <input type="text" id="GameCreatorInput" placeholder="Creator"/>
            
            <input type="text" id="GameGenreInput" placeholder="Genre"/>
            
            <input type="text" id="GameDescInput" placeholder="Description"/>
             <button name="a" onclick="createClickEvent()">Create</button>
            <p>in order to use the "CREATE" button, you must fill in all boxes except the "Id" box.</p>
             <button name="a" onclick="updateClickEvent()">Update</button>       
            <p>in order to use the "UPDATE" button, you must fill in all boxes.</p>
             <button name="a" onclick="deleteClickEvent()">Delete</button>    
            <p>in order to use the "DELETE" button, you only need to fill it the "Name" box (check grammar & spelling).</p>
            </form>
    </center>

<!--Create-->
<script>
    function createClickEvent() {
        if (document.getElementById("GameNameInput").value && 
            document.getElementById("GameCreatorInput").value && 
            document.getElementById("GameGenreInput").value && 
            document.getElementById("GameDescInput").value) {
            loadCreateJson(
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

    function loadCreateJson(name, creator, genre, description) {
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

<!--delete-->
 <script>
     function deleteClickEvent() {
            if (document.getElementById("GameNameInput").value) {
                loadDeleteJson(
                    document.getElementById("GameNameInput").value
                );
            } else {
                alert("The name of the game is required.");
            }
        }

        function loadDeleteJson(name) {
            var request = new XMLHttpRequest();
            request.open('POST', './Back-End/apiSqlQuery.php', true);
            request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            request.onload = function () {
                if (request.status >= 200 && request.status < 400) {
                    if (request.status === 200) {
                        alert("Game successfully Deleted!");
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
            var postData = `_method=DELETE&name=${name}`;
            request.send(postData);
        }
    </script>

<!--Update-->
 <script>
     function updateClickEvent() {
            if (document.getElementById("GameIdInput").value && 
                document.getElementById("GameNameInput").value && 
                document.getElementById("GameCreatorInput").value && 
                document.getElementById("GameGenreInput").value && 
                document.getElementById("GameDescInput").value) {
                loadUpdateJson(
                    document.getElementById("GameIdInput").value, 
                    document.getElementById("GameNameInput").value, 
                    document.getElementById("GameCreatorInput").value, 
                    document.getElementById("GameGenreInput").value, 
                    document.getElementById("GameDescInput").value
                );
            } else {
                alert("All fields are required.");
            }
        }

        function loadUpdateJson(id, name, creator, genre, description) {
            var request = new XMLHttpRequest();
            request.open('POST', './Back-End/apiSqlQuery.php', true);
            request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            request.onload = function () {
                if (request.status >= 200 && request.status < 400) {
                    if (request.status === 200) {
                        alert("Game successfully updated!");
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

            var postData = `_method=UPDATE&id=${encodeURIComponent(id)}&name=${encodeURIComponent(name)}&creator=${encodeURIComponent(creator)}&genre=${encodeURIComponent(genre)}&description=${encodeURIComponent(description)}`;
            request.send(postData);
        }
    </script>

<?php
include_once "../../Front-end/Footer.php"
    ?>
   