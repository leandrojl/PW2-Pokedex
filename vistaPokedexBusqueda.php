<?php
session_start();
include 'database.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokedex</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="estilos/estilos.css">
    <link rel="stylesheet" href="estilos/estilos_tabla_vistaPokedexBusqueda.css">
    <link rel="shortcut icon" href="imagenes/Pokebola.png">


</head>
<header>
    <?php include './header.php'; ?>
</header>
<body>
<?php
include './navbar.php';
?>

<?php include './barraBuscadora.php'; ?>

<div class="w3-container">
    <h2 class="w3-center">Lista de Pokémon</h2>

    <?php
    $database = new Database();
    $resultado = $database->traerTodos();
    ?>

    <!-- Contenedor de la tabla (visible en escritorio) -->
    <div class="table-container" id="pokemonTable">
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
            <?php

            ?>
            <?php foreach ($resultado as $pokemon) {

                $nombre_pokemon = $pokemon['nombre']; //guardo el nombre del pokemon

                $tipo_pokemon = $pokemon['tipo_descripcion']; //guardo el tipo de pokemon

                $nro_id_unico = $pokemon['nro_id_unico']; //guardo su numero identificador unico

                $pokemon_descripcion = $pokemon['pokemon_descripcion']; //guardo la descripcion del pokemon


                echo '<tr>
                        <!-- Mostrar la imagen del Pokémon -->
                        <td><img src="' . $database->buscarImagen($pokemon['imagen']) . '" alt="' . $nombre_pokemon . '" class="w3-image" style="width:100px;"></td>
        
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

    <!-- Contenedor de tarjetas (visible en móviles) -->
    <div class="w3-row-padding "  id="pokemonCards">
        <?php foreach ($resultado as $pokemon) {
            $nombre_pokemon = $pokemon['nombre'];
            $tipo_pokemon = $pokemon['tipo_descripcion'];
            $nro_id_unico = $pokemon['nro_id_unico'];

            echo '<div class="w3-col l12 m12 s12">
                <div class="w3-card-4 w3-margin w3-center" >
                    <img src="' . $database->buscarImagen($pokemon['imagen']) . '" alt="' . $nombre_pokemon . '" style="width:100px;">
                    <div class="w3-container w3-padding">
                        <img src="./imagenes/' . $tipo_pokemon . '.png" alt="Tipo ' . $tipo_pokemon . '" style="width: 40px;">
                        <h3>' . $nombre_pokemon . '</h3>
                        <p>Número: ' . $nro_id_unico . '</p>
                        <button class="w3-button w3-blue" onclick="window.location.href=\'vistaPokemonSeleccionado.php?page=' . $nombre_pokemon . '\'">Ver a ' . $nombre_pokemon . '</button>
                    </div>
                </div>
              </div>';
        } ?>
    </div>


</div>
<script>
    function updateDisplay() {
        const isMobile = window.innerWidth <= 768;
        const isTablet = window.innerWidth > 768 && window.innerWidth <= 1024;
        const isMonitor = window.innerWidth > 1024;
        if(window.innerWidth <= 768){
            document.getElementById('pokemonTable').style.display = isMobile ? 'none' : 'block';
            document.getElementById('pokemonCards').style.display = isMobile ? 'block' : 'none';
        }else if(window.innerWidth > 768 && window.innerWidth <= 1024){
            document.getElementById('pokemonTable').style.display = isTablet ? 'none' : 'block';
            document.getElementById('pokemonCards').style.display = isTablet ? 'block' : 'none';

        }else if(window.innerWidth > 1024){
            document.getElementById('pokemonTable').style.display = isMonitor ? 'block' : 'none';
            document.getElementById('pokemonCards').style.display = isMonitor ? 'none' : 'block';
        }





    }

    window.addEventListener('resize', updateDisplay);
    window.addEventListener('load', updateDisplay);
</script>
</body>
</html>

