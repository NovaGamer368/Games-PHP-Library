<script>
    const request = new XMLHttpRequest();

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
            for (let index in myData) {
                "<h3>" + myData[index].Name + "</h3>"
            }
            myReturn += "</center>";
            document.getElementById("jsonData").innerHTML = myReturn; // Display table
        }
    }
</script>