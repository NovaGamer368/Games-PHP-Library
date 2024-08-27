<script>
    // Create a new XMLHttpRequest object
    const request = new XMLHttpRequest();
    
    // Don't run until the page is loaded and ready
    window.onload = function () {
        loadJson();
    };
    
    // Call the microservice and get the data
    function loadJson() {
        request.open('GET', './Back-End/apiJsonQuery.php?genre=true', true);
        request.onload = loadComplete;
        request.send();
    }

    // Run when the data has been loaded
    function loadComplete(evt) {
        if (request.status >= 200 && request.status < 300) {
            let myResponse;
            let myData;
            let myReturn = "";
            myResponse = request.responseText;
            myData = JSON.parse(myResponse);

            // Loop through each JSON record and create the HTML
            for (let index in myData) {
                myReturn += "<option>" + myData[index].Genre + "</option>";
            }
            //myReturn += "</>";
            //document.getElementById("FilterOptions").innerHTML = myReturn; // Display table
        }
        //else {
        //    document.getElementById("A").innerHTML = "Failed to load data. Status: " + request.status;
        //}
    }
</script>