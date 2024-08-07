    <center  >
        <form>           
           
            <input type="text" id="GameIdInput" placeholder="Game Id"/>

            <input type="text" id="GameEditNameInput" placeholder="Name"/>
            
            <input type="text" id="GameEditCreatorInput" placeholder="Creator"/>
            
            <input type="text" id="GameEditGenreInput" placeholder="Genre"/>
            
            <input type="text" id="GameEditDescInput" placeholder="Description"/>
             <button name="a" onclick="myClickEvent()">Update</button>
        </form>
    </center>
    
 <script>
     function updateClickEvent() {
            alert("in update")
            if (document.getElementById("GameIdInput").value && 
                document.getElementById("GameEditNameInput").value && 
                document.getElementById("GameEditCreatorInput").value && 
                document.getElementById("GameEditGenreInput").value && 
                document.getElementById("GameEditDescInput").value) {
                loadJson(
                    document.getElementById("GameIdInput").value, 
                    document.getElementById("GameEditNameInput").value, 
                    document.getElementById("GameEditCreatorInput").value, 
                    document.getElementById("GameEditGenreInput").value, 
                    document.getElementById("GameEditDescInput").value
                );
            } else {
                alert("All fields are required.");
            }
        }

        function loadJson(id, name, creator, genre, description) {
            var request = new XMLHttpRequest();
            request.open('POST', './Back-End/apiSqlUpdate.php', true);
            request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            request.onload = function () {
                if (request.status >= 200 && request.status < 400) {
                    var data = JSON.parse(request.responseText);
                    console.log("Response data: ", data);
                    if (data.status !== "success") {
                        alert("Error: " + data.message);
                    } else {
                        alert("Record updated successfully.");
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