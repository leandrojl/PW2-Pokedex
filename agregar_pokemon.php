<?php
session_start();

// Verificar si el usuario está logueado
if (!isset($_SESSION["logueado"])) {
    // Si no está logueado, redirigir al inicio
    header("Location: vistaPokemonBusqueda.php");
    exit();
}

include_once 'database.php';
include_once 'PokemonManager.php';


$db = new Database();
$pokemonManager = new PokemonManager($db);


$tipos = $pokemonManager->obtenerTipos();

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

<header>
    <div class="logo"><img src="img/pokedex-removebg-preview.png" alt="Logo"></div>
    <div class="titulo"><img src="img/pokedex-titulo.png" alt=""></div>

    <div class="login">
        <img src="img/foto_perfil.webp" alt="Usuario" class="user-image">
        <p>Usuario: Administrador</p>
    </div>
</header>

<main>
    <div id="popupForm" class="popup">
        <div class="popup-content">
            <span class="close">&times;</span>
            <h2>Ingrese nuevo pokémon</h2>
            <form id="nuevoForm" method="post">
                <label for="niu">Número identificador único:</label>
                <input type="number" id="niu" name="niu">

                <label for="archivo">Subir imagen:</label>
                <input type="file" id="archivo" name="archivo" accept="image/*">
                <img id="previewImg" src="" alt="Vista previa de la imagen">

                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre">

                <label for="tipo">Tipo:</label>
                <select name="tipo" id="tipo">
                    <option value="Fuego">Fuego</option>
                    <option value="Agua">Agua</option>
                    <option value="Hierba">Hierba</option>
                    <option value="Electrico">Electrico</option>
                </select>

                <label for="descripcion">Descripción:</label>
                <textarea id="descripcion"></textarea>

                <button type="submit" class="cargar">Cargar nuevo pokémon</button>
            </form>
        </div>
    </div>
</main>

</body>
</html>
