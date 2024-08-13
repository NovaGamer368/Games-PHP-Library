<?php
include_once "./Front-end/Header.php"
    ?>
    <h1>Login page</h1>
    <center>
        <div>
             <input type="text" id="usernameInput" placeholder="Username"/>
             <input type="password" id="passwordInput" placeholder="Password"/>
            <button name="a" onclick="LoginEvent()">Submit</button>
            
        </div>
<p id="A"></p>
<p id="B"></p>
<!--<p id="jsonData">No Users found!</p>-->

    </center>
<script>
    function LoginEvent() {
        if (document.getElementById("passwordInput").value && document.getElementById("usernameInput").value) {
            //alert("calling JSON");
            loadJson(document.getElementById("usernameInput").value, document.getElementById("passwordInput").value)
        }
    }

        function loadJson(username, password) {
            var request = new XMLHttpRequest();
            //alert("username: " + username);
            //alert("password: " + password);
        
            request.open('GET', './Back-End/apiSqlQuery.php?username=' + encodeURIComponent(username) + '&password=' + encodeURIComponent(password), true);

            //DEBUGGING

            request.onload = function () {
                if (request.status >= 200 && request.status < 400) {
                    // Success!
                    var data = JSON.parse(request.responseText);
                    console.log("Response data: ", data);
                    if (data.status === "success") {
                        //alert("Username: " + data.Username + "\nAdmin: " + data.isAdmin);
                        window.location.href = "http://localhost:30126/index.php"; 
                    } else {
                        alert("Error: " + data.message);
                    }
                } else {
                    // We reached our target server, but it returned an error
                    alert("Error: " + request.status);
                }
            }
                 request.onerror = function () {
                     // There was a connection error of some sort
                     alert("Request failed");
                 };
            //request.onload = loadComplete;
            request.send();

        }

</script>
<?php
include_once "./Front-end/Footer.php"
    ?>
