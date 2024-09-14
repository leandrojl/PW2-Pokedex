<?php
session_start(); //cargamos la sesion
$pokemonBuscado = $_POST['busquedaPokemon']; //Obtenemos el pokemon por del buscador
require_once 'database.php'; //cargamos la clase base

$database = new Database();
$query = "SELECT       *
          FROM         pokemon
          WHERE nombre = ?";
$stmt = $database->prepare($query);
$stmt->bind_param('s', $pokemonBuscado);
$stmt->execute();
$resultado = $stmt->get_result();
//prepara y ejecuta toda la consulta buscando el pokemon evitando inyecciones
//devuelve un objeto mysql, para chequear si esta vacio usamos ->num_rows que nos da
//la cantidad de filas que obtuvo de la consulta.

if ($resultado->num_rows == 1) {//Si num_rows es igual a 1 es que encontro.

    if (!isset($_SESSION["logueado"])) {
        header('Location:vistaPokemonSeleccionado.php?page=' . $pokemonBuscado . '');
        exit();
    } else {
        header('Location:vistaPokemonAdministrador.php?page=' . $pokemonBuscado . '');
        exit();
    }
} else {
    header('Location: vistaPokedexBusqueda.php?status=no_encontrado');
    exit();

}





/*

query = "SELECT       pokemon.nro_id_unico,
                       pokemon.nombre,
                       pokemon.descripcion AS pokemon_descripcion,
                       tipo.imagen AS tipo_img,
                       tipo.descripcion AS tipo_descripcion

              FROM         pokemon

              JOIN         tipo ON pokemon.tipo_id = tipo.id
WHERE pokemon.nombre ='$pokemonBuscado';

    ";
$nombre_pokemon = $resultado[0]['nombre']; //guardo el nombre del pokemon

$tipo_pokemon = $resultado[0]['tipo_descripcion']; //guardo el tipo de pokemon

$nro_id_unico =$resultado[0]['nro_id_unico']; //guardo su numero identificador unico

$pokemon_descripcion = $resultado[0]['pokemon_descripcion']; //guardo la descripcion del pokemon


echo'<tr>
                        <!-- Mostrar la imagen del Pokémon -->
                        <td><img src="./imagenes/'.$nombre_pokemon.'.png" alt="'.$nombre_pokemon.'" class="w3-image" style="width:100px;"></td>
        
                        <!-- Mostrar la imagen del tipo de Pokémon -->
                        <td><img src="./imagenes/'.$tipo_pokemon.'.png" alt="Tipo '.$tipo_pokemon.'" class="w3-image" style="width:100px;"></td>
        
                        <!-- Mostrar el número del Pokémon -->
                        <td>'.$nro_id_unico.'</td>
        
                        <!-- Mostrar el nombre del Pokémon como un enlace -->
                        <td><a href="vistaPokedexBusqueda.php?page='.$nombre_pokemon.'">'.$nombre_pokemon.'</a></td>
        
                        <!-- Botón para ver más detalles del Pokémon -->
                        <td><button class="w3-button w3-blue" onclick="window.location.href=\'vistaPokemonSeleccionado.php?page='.$nombre_pokemon.'\'">Ver a '.$nombre_pokemon.'</button></td>

                        </tr>';
*/