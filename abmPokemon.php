<?php
session_start();

if(isset($_SESSION["logueado"])) {
    echo "solo entran los usuarios logueados<br><br>";

    echo "<a href='logout.php'>Salir</a>";


} else {
    header("Location: index.php");
    exit();

}


?>
