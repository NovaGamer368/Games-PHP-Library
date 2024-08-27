<p id="jsonData">No Games found!</p>
<script>
    const request = new XMLHttpRequest();
    const imageRequest = new XMLHttpRequest();

    // Don't run until the page is loaded and ready
    window.onload = function () {
        //alert("onload worked"); // For debugging
        loadJson();
    };

    function loadJson() {
        request.open('GET', './Back-End/apiJsonQuery.php?id=1', true);
        request.onload = loadComplete;
        request.send();
    }

    function loadComplete(evt) {
        if(request.status >= 200 && request.status < 300) {
            let myResponse;
            let myData;
            // Create a table for display
            let myReturn = "<center>";
            myResponse = request.responseText;
            myData = JSON.parse(myResponse);
            myReturn += "<img height='700px' src='" + myData.b[0].gameImage + "'>" +
                "<h3>" + myData.a[0].Name + "</h3>" +
                "<p>Creator: " + myData.a[0].Creator + "</p>" +
                "<p>Genre: " + myData.a[0].Genre + "</p>" +
                "<p>Description: " + myData.a[0].Description + "</p>"
            myReturn += "</center>";
            document.getElementById("jsonData").innerHTML = myReturn; // Display table
        } else {
            document.getElementById("A").innerHTML = "Failed to load data. Status: " + request.status;
        }
    }
</script>