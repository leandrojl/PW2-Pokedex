<?php
include 'database.php';

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokedex</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style>
        .w3-bar {
            display: flex;
            justify-content: space-between;
            margin: 0 auto; /* Centra el menú horizontalmente */
        }

        .iframe-container {
            display: flex;
            justify-content: center;

            align-items: center;
            width: 80%;
            max-width: 1200px;
            margin: 0 auto;
            height: 70vh;
            padding: 0;
        }

        iframe {
            width: 100%;
            height: 100%;
            border: none;
        }

    </style>
</head>
<body>
<?php
include './header.php';
?>

<div class="w3-container w3-gray w3-padding-16">
    <form class="w3-row" action="vistaPokemonBuscado.php" method="POST">

        <div class="w3-col l8">
            <input class="w3-input w3-border" type="text" name="busquedaPokemon" required
                   placeholder="Ingrese el nombre, tipo o numero de pokemon que busca">
        </div>

        <div class="w3-col l4">
            <button class="" type="submit">Buscar pokemon</button>
        </div>
    </form>
</div>

<!DOCTYPE html>
<html>
<head>
    <title>Tabla de Pokémon</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
<?php
if(isset($_GET['status'])){
if ($_GET['status'] == "no_encontrado") {
    echo '

<div class="w3-container">
    <h1 style="align-items: center;text-align: center;">POKEMON NO ENCONTRADO</h1>
</div>
';
}
}
?>
<div class="w3-container">
    <h2 class="w3-center">Lista de Pokémon traido de la BD</h2>

    <?php

    $database = new Database();
    $resultado=$database->devolverListadoCompleto();
    ?>

    <table class="w3-table w3-bordered w3-striped w3-hoverable">
        <thead>
        <tr class="w3-light-grey">
            <th>Imagen</th>
            <th>Tipo</th>
            <th>Número</th>
            <th>Nombre</th>
            <th>Ver Pokémon</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($resultado as $pokemon) {
            $nombre_pokemon = $pokemon['nombre']; //guardo el nombre del pokemon

            $tipo_pokemon = $pokemon['tipo_descripcion']; //guardo el tipo de pokemon

            $nro_id_unico = $pokemon['nro_id_unico']; //guardo su numero identificador unico

            $pokemon_descripcion = $pokemon['pokemon_descripcion']; //guardo la descripcion del pokemon


            echo '<tr>
                        <!-- Mostrar la imagen del Pokémon -->
                        <td><img src="./imagenes/' . $nombre_pokemon . '.png" alt="' . $nombre_pokemon . '" class="w3-image" style="width:100px;"></td>
        
                        <!-- Mostrar la imagen del tipo de Pokémon -->
                        <td><img src="./imagenes/' . $tipo_pokemon . '.png" alt="Tipo ' . $tipo_pokemon . '" class="w3-image" style="width:100px;"></td>
        
                        <!-- Mostrar el número del Pokémon -->
                        <td>' . $nro_id_unico . '</td>
        
                        <!-- Mostrar el nombre del Pokémon como un enlace -->
                        <td><a href="vistaPokedexBusqueda.php?page=' . $nombre_pokemon . '">' . $nombre_pokemon . '</a></td>
        
                        <!-- Botón para ver más detalles del Pokémon -->
                        <td><button class="w3-button w3-blue" onclick="window.location.href=\'vistaPokemonSeleccionado.php?page=' . $nombre_pokemon . '\'">Ver a ' . $nombre_pokemon . '</button></td>

                        </tr>';
        }
        ?>


        </tbody>
    </table>
</div>


</body>
</html>








