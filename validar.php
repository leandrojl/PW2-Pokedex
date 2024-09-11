<?php
session_start();

$usuario = $_POST["usuario"];
$clave = $_POST["clave"];

if($usuario == "administrador" && $clave == "1234"){
    $_SESSION["logueado"] = 1;
    header("Location: abmPokemon.php");
    exit();
} else {
    header("Location: index.php");
    exit();

}

?>
