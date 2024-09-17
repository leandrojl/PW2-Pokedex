<?php
session_start();

// Verificar si el usuario está logueado
if (!isset($_SESSION["logueado"])) {
    // Si no está logueado, redirigir al inicio
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos/estilos.css">
    <link rel="shortcut icon" href="imagenes/Pokebola.png">
    <title>Pokedex</title>

</head>
<body>

<header>
    <div class="logo"><img src="imagenes/pokedex-removebg-preview.png"></div>
    <div class="titulo"><img src="imagenes/pokedex-titulo.png"></div>
    <div class="login">
        <p>Usuario Administrador</p>
        <input type="button" value="Salir" onclick="window.location.href='logout.php'">
    </div>
</header>

<main>
    <form class="buscador" action="resultados.php" method="get">
        <input type="text" name="query" placeholder="Ingrese el nombre, tipo o numero de pokemon" required>
        <input type="submit" value="¿Quién es este pokemon?">
    </form>


</main>

</body>
</html>
