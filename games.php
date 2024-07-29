<?php
include_once "./Front-end/Header.php"
    ?>
<h1>Games</h1>
<hr />
<p>This page is listing all the possible Games that are in the GamesTable in a MySQL database</p>
<br />
<p>The main attributes of these games are their Name, Creator, Genre and Description</p>
<p id="A"></p> <!--DEBUG PURPOSES-->
<p id="B"></p> <!--DEBUG PURPOSES-->
<p id="jsonData">No Games found!</p>
<script>

    // Create a new XMLHttpRequest object
    const request = new XMLHttpRequest();

    // Don't run until the page is loaded and ready
    window.onload = function () {
        //alert("onload worked"); // For debugging
        loadJson();
    };

    // Call the microservice and get the data
    function loadJson() {
        request.open('GET', './Back-End/apiJsonQuery.php', true);
        request.onload = loadComplete;
        request.send();
    }

    // Run when the data has been loaded
    function loadComplete(evt) {
        if (request.status >= 200 && request.status < 300) {
            let myResponse;
            let myData;
            // Create a table for display
            let myReturn = "<center><table><tr><td>Name &nbsp;  &nbsp; </td><td>Creator &nbsp;  &nbsp; </td><td>Genre &nbsp;  &nbsp; </td><td>Description &nbsp;  &nbsp; </td></tr>";

            myResponse = request.responseText;
            //alert("A: " + myResponse); // Use for debugging
            /*document.getElementById("B").innerHTML = myResponse; // Display the JSON for debugging*/
            myData = JSON.parse(myResponse);

            // Loop through each JSON record and create the HTML
            for (let index in myData) {
                myReturn += "<tr><td>" +
                    myData[index].Name + "</td><td>" +
                    myData[index].Creator + "</td><td>" +
                    myData[index].Genre + "</td><td>" +
                    myData[index].Description + "</td></tr>";
            }
            myReturn += "</table><center>";
            document.getElementById("jsonData").innerHTML = myReturn; // Display table
        } else {
            document.getElementById("A").innerHTML = "Failed to load data. Status: " + request.status;
        }
    }

</script>
<?php
include_once "./Front-end/Footer.php";
?>
