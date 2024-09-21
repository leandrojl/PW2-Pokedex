<?php
session_start();
$pokemonBuscado = $_POST['datoBuscado'];
//echo $pokemonBuscado;
require 'database.php';
$database = new Database();
$query = "SELECT * FROM pokemon WHERE nombre= ?";
$stmt=$database->prepare($query);
$stmt->bind_param("s", $pokemonBuscado);
$stmt->execute();
$resultado = $stmt->getResult();
$registro=$resultado->fetch_assoc();
print_r ($registro);
