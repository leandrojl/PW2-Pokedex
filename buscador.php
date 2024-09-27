<?php
$pokemonBuscado = $_POST['datoBuscado'];
//echo $pokemonBuscado;
require 'database.php';
$database = new Database();


$query = "SELECT pokemon.id as pokemon_id,       
    pokemon.nro_id_unico, pokemon.imagen,
                       pokemon.nombre,
                       pokemon.descripcion AS pokemon_descripcion,
                       tipo.imagen AS tipo_img, 
                       tipo.descripcion AS tipo_descripcion

          FROM         pokemon
              
          JOIN         tipo ON pokemon.tipo_id = tipo.id 
          WHERE nombre= ?";
$stmt = $database->prepare($query);
$stmt->bind_param("s", $pokemonBuscado);
$stmt->execute();
$resultado = $stmt->get_result();
$pokemonPorNombre = $resultado->fetch_assoc();

$query = "SELECT       pokemon.id as pokemon_id,pokemon.nro_id_unico, pokemon.imagen,
                       pokemon.nombre,
                       pokemon.descripcion AS pokemon_descripcion,
                       tipo.imagen AS tipo_img, 
                       tipo.descripcion AS tipo_descripcion

          FROM         pokemon
              
          JOIN         tipo ON pokemon.tipo_id = tipo.id
          WHERE tipo.descripcion = ?";
$stmt = $database->prepare($query);
$stmt->bind_param("s", $pokemonBuscado);
$stmt->execute();
$resultado = $stmt->get_result();
$pokemonPorTipo = $resultado->fetch_all(MYSQLI_ASSOC);


$query = "SELECT       pokemon.id as pokemon_id,pokemon.nro_id_unico, pokemon.imagen,
                       pokemon.nombre,
                       pokemon.descripcion AS pokemon_descripcion,
                       tipo.imagen AS tipo_img, 
                       tipo.descripcion AS tipo_descripcion

          FROM         pokemon
              
          JOIN         tipo ON pokemon.tipo_id = tipo.id 
          WHERE nro_id_unico =?";
$bindParam = "s";
$pokemonPorNumero = factorizacionDeConsulta($query, $bindParam, $pokemonBuscado);


if (!empty($pokemonPorNumero)) {
    $buscarDato = true;
    foreach ($pokemonPorTipo as $pokemon) {
        if ($pokemon['nro_id_unico'] == $pokemonPorNumero['nro_id_unico'])
            $buscarDato = false;
    }
    if ($buscarDato) $pokemonPorTipo[] = $pokemonPorNumero;
}


if (!empty($pokemonPorNombre)) {
    $buscarDato = true;
    foreach ($pokemonPorTipo as $pokemon) {
        if ($pokemon['nro_id_unico'] == $pokemonPorNombre['nro_id_unico'])
            $buscarDato = false;
    }
    if ($buscarDato) $pokemonPorTipo[] = $pokemonPorNombre;

}


if (!empty($pokemonPorTipo)) {

    echo '<div class="w3-container">
    <h2 class="w3-center">Resultado de busqueda</h2>

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
        ';

    foreach ($pokemonPorTipo as $pokemon) {
        $pokemon_id = $pokemon['pokemon_id'];
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
';
        //Evaluamos si esta logueado, si es asi, le agregamos los botones de modificar o borrar
        if (isset($_SESSION['logueado']) && $_SESSION['logueado'] == 1) {
            echo ' <td>
                        <form action="modificar_pokemon.php" method="GET">
                            <input type="hidden" name="id" value="' . $pokemon['pokemon_id'] . '">
                            <button type="submit" class="w3-button w3-green">Modificar</button>
                        </form>
                        <form action="ABM.php" method="POST">
                            <input type="hidden" name="id" value="' . $pokemon['pokemon_id'] . '">
                            <input type="hidden" name="accion" value="baja">
                            <button type="submit" class="w3-button w3-red">Baja</button>
                        </form>
                    </td>';
        }

        echo '                       </tr>';
    }
    echo '      </tbody>
    </table>
    </div>
    ';
} else {
    echo '    <h1 class="w3-center">Búsqueda sin resultados</h1>
';

    $resultado = $database->traerTodos();
    echo '<div class="w3-container">
    <h2 class="w3-center">Pokedex Disponible</h2>

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
        ';

    foreach ($resultado as $pokemon) {

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
'; //Evaluamos si esta logueado, si es asi, le agregamos los botones de modificar o borrar
        if (isset($_SESSION['logueado']) && $_SESSION['logueado'] == 1) {
            echo ' <td>
                        <form action="modificar_pokemon.php" method="GET">
                            <input type="hidden" name="id" value="' . $pokemon['pokemon_id'] . '">
                            <button type="submit" class="w3-button w3-green">Modificar</button>
                        </form>
                        <form action="ABM.php" method="POST">
                            <input type="hidden" name="id" value="' . $pokemon['pokemon_id'] . '">
                            <input type="hidden" name="accion" value="baja">
                            <button type="submit" class="w3-button w3-red">Baja</button>
                        </form>
                    </td>';
        }

        echo '                       </tr>';
    }
    echo '      </tbody>
    </table>
    </div>
    ';

}


function factorizacionDeConsulta($consulta, $bind_param1, $busqueda)
{
    $database = new Database();
    $stmt = $database->prepare($consulta);
    $stmt->bind_param($bind_param1, $busqueda);
    $stmt->execute();
    $resultado = $stmt->get_result();
    $resultado = $resultado->fetch_assoc();
    return $resultado;
}