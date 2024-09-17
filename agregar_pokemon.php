<?php
session_start();

// Verificar si el usuario está logueado
if (!isset($_SESSION["logueado"])) {
    // Si no está logueado, redirigir al inicio
    header("Location: vistaPokedexBusqueda.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="shortcut icon" href="img/Pokebola.png">
    <title>Agregar Pokémon</title>
</head>
<body>

<?php

// Verificar si el usuario está logueado
if (!isset($_SESSION["logueado"])) {
    // Si no está logueado le muestro el header de login

    include './header.php';
}else{
    //si esta logeado, le muestro el header para salir

    echo '<header>
            <div class="logo"><img src="imagenes/pokedex-removebg-preview.png"></div>
            <div class="titulo"><img src="imagenes/pokedex-titulo.png"></div>
            <div class="login">
                <p>Usuario Administrador</p>
                <input type="button" value="Salir" onclick="window.location.href=\'logout.php\'">
            </div>
        </header>';
}

?>

<main>
    <div class="w3-container">
        <h2 class="w3-center">Agregar Nuevo Pokémon</h2>
        <form action="ABM.php" method="POST">
            <div class="w3-row-padding">
                <div class="w3-half">
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" required class="w3-input w3-border">
                </div>
                <div class="w3-half">
                    <label for="tipo">Tipo:</label>
                    <input type="text" id="tipo" name="tipo" required class="w3-input w3-border">
                </div>
            </div>
            <div class="w3-row-padding">
                <div class="w3-half">
                    <label for="numero">Número:</label>
                    <input type="number" id="numero" name="numero" required class="w3-input w3-border">
                </div>
                <div class="w3-half">
                    <label for="imagen">Imagen:</label>
                    <input type="text" id="imagen" name="imagen" required class="w3-input w3-border">
                </div>
            </div>
            <input type="hidden" name="accion" value="agregar">
            <button type="submit" class="w3-button w3-teal">Agregar Pokémon</button>
        </form>
    </div>
</main>

</body>
</html>
