<?php
include_once "./Front-end/Header.php"
    ?>

<!--<img width="1000" height="900" src="https://assets.xboxservices.com/assets/0e/71/0e71c7b6-9675-45c3-9a61-c722ed4733ef.jpg?n=896254_GLP-Page-Hero-1084_1920x1080.jpg" />
<button  ></button>
<button  ></button>-->

<?php
$dir = "C:/Users/jbrickwedde/Source/Repos/NovaGamer368/Games-PHP-Library/Gallery/";    //image folder name
if (is_dir($dir)) {
    if ($dh = opendir($dir)) {
        while (($file = readdir($dh)) !== false) {
            if ($file == "." or $file == "..") {
            } else { ?>
                    <img style="width: 260px;" src="C:/Users/jbrickwedde/Source/Repos/NovaGamer368/Games-PHP-Library/Gallery/<?php echo $file ?>" />
            
<?php
            }
        }
        closedir($dh);
    }
}?>




<?php
include_once "./Front-end/Footer.php"
    ?>