<?php
session_start();
?>

<html>
<head>
    <title>Games PHP Library</title>
    <?php
        //echos the dark and light modes
    if (isset($_COOKIE["darkMode"]) && $_COOKIE["darkMode"] == "1") {
        // dark mode
        echo '<link rel="stylesheet" type="text/css" href="./Front-end/Styles/myGamesDarkCSS.php">';
    } else {
        // light mode
        echo '<link rel="stylesheet" type="text/css" href="./Front-end/Styles/myGamesCSS.php">';
    }
    ?>
</head>
<body>
    <h1>Games PHP Library</h1>
    <div class="navbar">
        
        <!--navigation bar links-->
        <span><a href="index.php">Home</a></span> &nbsp; &nbsp;
        <span><a href="about.php">About</a></span> &nbsp; &nbsp;
        <span><a href="games.php">Games</a></span> &nbsp; &nbsp;
        <span><a href="search.php">Search & Filter</a></span> &nbsp; &nbsp;
        <span><a href="IndividualPages.php">Individual pages</a></span> &nbsp; &nbsp;

        <!--checks if user is logged in and lets them see the link to the admin pages + color mode button if they are-->
        <?php
        if (isset($_SESSION['username'])) {
            if (isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] == 1) {
                echo '<span><a href="admin.php">Admin Page</a></span> &nbsp; &nbsp;';
            }
            echo '<span>Welcome, ' . htmlspecialchars($_SESSION['username']) . '!</span> &nbsp; &nbsp;';
            echo '<span><a href="logout.php">Logout</a></span> &nbsp; &nbsp;';
        } else {
            echo '<span><a href="login.php">Login</a></span> &nbsp; &nbsp;';
        }
        ?>
        <button type="submit" onclick="toggleDarkMode()">Toggle Dark Mode</button>
    </div>


    <script>
        function toggleDarkMode() {
            fetch('toggleDarkMode.php', {
                method: 'POST',
            })
            .then(response => response.text())
            .then(data => {
                location.reload();
            })
            .catch(error => console.error('Error:', error));
        }
    </script>
