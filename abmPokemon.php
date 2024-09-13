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

    <button id="nuevoBtn">Nuevo pokemon</button>

    <div id="popupForm" class="popup">
        <div class="popup-content">
            <span class="close">&times;</span>
            <h2>Formulario</h2>
            <form id="nuevoForm">
                <label for="nombre">Número identificador único:</label>
                <input type="number" id="niu" name="niu"><br><br>

                <form id="formSubida">
                    <label for="archivo">Subir imagen:</label>
                    <input type="file" id="archivo" name="archivo" accept="image/*"><br><br>
                </form>

                <div id="preview">
                    <img id="previewImg" src="" alt="Vista previa de la imagen" style="display:none; width: 200px; height: auto;">
                </div>
                <br><br>
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre">
                <br><br>
                <label for="tipo">Tipo:</label>
                <select name="tipo" id="tipo">
                    <option value="Fuego">Fuego</option>
                    <option value="Agua">Agua</option>
                    <option value="Hierba">Hierba</option>
                    <option value="Electrico">Electrico</option>
                </select>
                <br><br>
                <label for="descripcion">Descripción:</label>
                <textarea id="descripcion"></textarea>
                <br><br>
                <button type="submit" class="cargar">Cargar nuevo pokemon</button>
            </form>
        </div>
    </div>

</main>

<script src="./JS/script.js"></script>
</body>
</html>
