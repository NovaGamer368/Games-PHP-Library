<?php
include_once "./Front-end/Header.php"
    ?>
    <h1>Login page</h1>
    <center>

        <form>
             <input type="text" id="usernameInput" placeholder="Username"/>
             <input type="password" id="passwordInput" placeholder="Password"/>
            <button name="a" onclick="myClickEvent()">Submit</button>
        </form>
    </center>
<script>
    function myClickEvent() {
        //alert("username: " + document.getElementById("usernameInput").value);
        //alert("password: " + document.getElementById("passwordInput").value);
        if (document.getElementById("passwordInput").value && document.getElementById("usernameInput").value) {
            //alert("calling JSON");
            loadJson(document.getElementById("usernameInput").value, document.getElementById("passwordInput").value)
        }
    }

    function loadJson(username, password) {
        request.open('GET', './Back-End/apiJsonQuery.php?username=' + username + '&password=' + password);
        request.onload = loadComplete;
        request.send();
    }

    function loadComplete(evt) {
        if (request.status >= 200 && request.status < 300) {
            let myResponse;
            let myData;
            // Create a table for display
            let myReturn = "<center><table><tr><td>Name &nbsp;  &nbsp; </td><td>Class &nbsp;  &nbsp; </td><td>STR &nbsp;  &nbsp; </td><td>DEX &nbsp;  &nbsp; </td><td>INT &nbsp;  &nbsp; </td></tr>";

            myResponse = request.responseText;
            //alert("A: " + myResponse); // Use for debugging
            //document.getElementById("B").innerHTML = myResponse; // Display the JSON for debugging
            myData = JSON.parse(myResponse);

            myReturn += "<tr><td>" + myData.Name + "</td><td>" +
                myData.Class + "</td><td>" +
                myData.STR + "</td><td>" +
                myData.DEX + "</td><td>" +
                myData.INT + "</td></tr>";
            myReturn += "</table></center>";
            document.getElementById("jsonData").innerHTML = myReturn; // Display table
        } else {
            document.getElementById("A").innerHTML = "Failed to load data. Status: " + request.status;
        }
    }

</script>
<?php
include_once "./Front-end/Footer.php"
    ?>
