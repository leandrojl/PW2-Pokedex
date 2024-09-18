<?php
session_start();
include "database.php";
$usuario = $_POST["usuario"];
$clave = $_POST["clave"];

$db = new Database();
$stmt = $db->conexion->prepare("SELECT * FROM usuario WHERE nombre = ? AND password = ?");
$stmt->bind_param("ss",$usuario,$clave);
$stmt->execute();
$resultado = $stmt->get_result();

if($resultado->num_rows == 1){
    $_SESSION["logueado"] = 1;
    header("Location: perfilAdmin.php");
    exit();
} else {
    header("Location: vistaPokedexBusqueda.php");
    exit();

}

?>
