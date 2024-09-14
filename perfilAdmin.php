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
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="shortcut icon" href="img/Pokebola.png">
    <title>Pokedex</title>

</head>
<body>

<header>
    <div class="logo"><img src="img/pokedex-removebg-preview.png"></div>
    <div class="titulo"><img src="img/pokedex-titulo.png"></div>

    <div class="login">
        <img src="img/foto_perfil.webp" alt="Usuario" class="user-image">
        <p>Usuario: Administrador</p>
    </div>

</header>

<main>
    <form class="buscador" action="resultados.php" method="get">
        <input type="text" name="query" placeholder="Ingrese el nombre, tipo o número de pokemon" required>
        <input type="submit" value="¿Quién es este pokemon?">
    </form>

    <div class="w3-container">
        <h2 class="w3-center">Lista de Pokémon</h2>

        <table class="w3-table w3-bordered w3-striped w3-hoverable">

            <thead>
            <tr class="w3-light-grey">
                <th>Imagen</th>
                <th>Tipo</th>
                <th>Número</th>
                <th>Nombre</th>
                <th>Ver pokemon</th>
                <th>Acciones</th>
            </tr>
            </thead>

            <tbody>
            <tr>
                <td><img src="img/Bulbasaur.png" alt="Bulbasaur" class="w3-image" style="width:100px;"></td>
                <td><img src="img/Hierba.png" alt="Tipo Planta" class="w3-image" style="width:100px;"></td>
                <td>#001</td>
                <td> <a href="vistaPokedexBusqueda.php?page=Bulbasaur">Bulbasaur</a> </td>
                <td> <button class="w3-button w3-blue" onclick="window.location.href='vistaPrincipalDeBusqueda.php?page=Bulbasaur'">Ver a Bulbasaur</button> </td>
                <td>
                    <button class="w3-button w3-green"">Modificar</button>
                    <button class="w3-button w3-red" ">Baja</button>
                </td>

            </tr>
            <tr>
                <td><img src="img/Charmander.png" alt="Charmander" class="w3-image" style="width:100px;"></td>
                <td><img src="img/Fuego.png" alt="Tipo Fuego" class="w3-image" style="width:100px;"></td>
                <td>#004</td>
                <td>Charmander</td>
                <td> <button class="w3-button w3-blue" onclick="window.location.href='vistaPrincipalDeBusqueda.php?page=Bulbasaur'">Ver a Bulbasaur</button> </td>
                <td>
                    <button class="w3-button w3-green"">Modificar</button>
                    <button class="w3-button w3-red" ">Baja</button>
                </td>
            </tr>
            <tr>
                <td><img src="img/Squirtle.png" alt="Squirtle" class="w3-image" style="width:100px;"></td>
                <td><img src="img/Agua.png" alt="Tipo Agua" class="w3-image" style="width:100px;"></td>
                <td>#007</td>
                <td>Squirtle</td>
                <td> <button class="w3-button w3-blue" onclick="window.location.href='vistaPrincipalDeBusqueda.php?page=Bulbasaur'">Ver a Bulbasaur</button> </td>
                <td>
                    <button class="w3-button w3-green"">Modificar</button>
                    <button class="w3-button w3-red" ">Baja</button>
                </td>
            </tr>
            <tr>
                <td><img src="img/Pikachu.png" alt="Pikachu" class="w3-image" style="width:100px;"></td>
                <td><img src="img/Electrico.png" alt="Tipo Eléctrico" class="w3-image" style="width:100px;"></td>
                <td>#025</td>
                <td>Pikachu</td>
                <td> <button class="w3-button w3-blue" onclick="window.location.href='vistaPrincipalDeBusqueda.php?page=Bulbasaur'">Ver a Bulbasaur</button> </td>
                <td>
                    <button class="w3-button w3-green"">Modificar</button>
                    <button class="w3-button w3-red" ">Baja</button>
                </td>
            </tr>
            </tbody>
        </table>
    </div>

</main>

</body>
</html>
