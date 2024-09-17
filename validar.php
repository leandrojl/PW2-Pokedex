<?php
session_start();

$usuario = $_POST["usuario"];
$clave = $_POST["clave"];

if($usuario == "administrador" && $clave == "1234"){
    $_SESSION["logueado"] = 1;
    header("Location: vistaPokedexAdministrador.php");
    exit();
} else {
    header("Location: vistaPokedexBusqueda.php");
    exit();

}

?>
