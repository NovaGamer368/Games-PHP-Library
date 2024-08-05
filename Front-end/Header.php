<?php
    session_start();
?>

<html>
    <head>
        <title>Games PHP Library</title>
        <link rel="stylesheet" type="text/css" href="./Front-end/Styles/myGamesCSS.php">
    </head>
    <body>  
        <h1>Games PHP Library</h1>
        <div class="navbar">
            <span><a href="index.php">Home</a></span> &nbsp; &nbsp;
            <span><a href="about.php">About</a></span> &nbsp; &nbsp;
            <span><a href="games.php">Games</a></span> &nbsp; &nbsp;
             <?php
                if (isset($_SESSION['username'])) {
                    if(isset($_SESSION['isAdmin']))
                    {
                        if($_SESSION['isAdmin'] == 1){
                         echo '<span><a href="admin.php">Admin Page</a></span> &nbsp; &nbsp;';
                        }
                    }
                    echo '<span>Welcome, ' . htmlspecialchars($_SESSION['username']) . '!</span> &nbsp; &nbsp;';
                    echo '<span><a href="logout.php">Logout</a></span> &nbsp; &nbsp;';

                } else {
                    echo '<span><a href="login.php">Login</a></span> &nbsp; &nbsp;';
                }
                ?>
        </div> 