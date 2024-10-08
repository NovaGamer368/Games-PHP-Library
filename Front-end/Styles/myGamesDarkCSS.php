<?php
$tableBorderColor = "red";
$textColor = "#ccc";
$buttonBgColor = "#9c1a1a";
$buttonHoverColor = "red";
$inputBorderColor = "#ccc";
$navBgColor = "#424242";
$navLinkColor = "#ff0000";
$navLinkHoverColor = "#0056b3";
?>

<style>
h1 {
    text-shadow: 1px 2px grey;
    text-align: center;
}

html {
    text-align: center;
    background: #08202a;
    color: white;
    font-family: "Franklin Gothic Book";
}

    p {
        font-size: 16px;
        color: <?php echo $textColor; ?>;
        line-height: 1.5;
        margin: 10px 70px;
        text-align: left;
    }

    li {
    font-size: 16px;
    color: <?php echo $textColor; ?>;
    line-height: 1.5;
    margin: 10px 70px;
    text-align: left;
     }

table {
    width: 45%;
    border-collapse: collapse;
    margin: 20px 0;
    border: 2px solid <?php echo $tableBorderColor; ?>;
}

table1 {
    width: 25%;
    border-collapse: collapse;
    margin: 20px 0;
    border: 2px solid <?php echo $tableBorderColor; ?>;
}

table th, table td {
    border: 1px solid <?php echo $tableBorderColor; ?>;
    padding: 10px;
    text-align: left;
}

button {
    background-color: <?php echo $buttonBgColor; ?>;
    border: none;
    color: white;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    border-radius: 4px;
}

button:hover {
    background-color: <?php echo $buttonHoverColor; ?>;
}

form {
    display: flex;
    flex-direction: column;
    justify-content: center;
    width: 25%;
}
input[type="text"],
input[type="password"] {
    padding: 10px;
    margin: 10px 0;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 16px;
}

input[type="submit"] {
    width: 100%;
    background-color: <?php echo $buttonBgColor; ?>;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: <?php echo $buttonHoverColor; ?>;
}

.onlyGames {
    width: 20%
}

.showGames{
    min-width: 800px;
    margin-left:auto;
    margin-right:auto;
}

.navbar {
    background-color: <?php echo $navBgColor; ?>;
    padding: 10px;
    text-align: center;
    border-bottom: 2px solid <?php echo $tableBorderColor; ?>;
}

.navbar span {
    margin: 0 10px;
}

.navbar a {
    color: <?php echo $navLinkColor; ?>;
    text-decoration: none;
    font-size: 16px;
    padding: 8px 16px;
    border-radius: 4px;
}

.navbar a:hover {
    background-color: <?php echo $buttonBgColor; ?>;
    color: white;
}
</style>
