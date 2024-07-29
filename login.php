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
            alert("username" + document.getElementById("usernameInput").value);
            alert("password" + document.getElementById("passwordInput").value);
        }

</script>
<?php
include_once "./Front-end/Footer.php"
    ?>
