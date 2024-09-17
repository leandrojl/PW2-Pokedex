<?php
session_start();

// Verificar si el usuario está logueado
if (!isset($_SESSION["logueado"])) {
    // Si no está logueado, redirigir al inicio
    header("Location: vistaPokedexBusqueda.php");
    exit();
}
?>
<?php
include 'database.php';
$database = new Database();

$query = "SELECT       pokemon.id,
                       pokemon.nro_id_unico, 
                       pokemon.nombre,
                       pokemon.descripcion AS pokemon_descripcion,
                       tipo.imagen AS tipo_img, 
                       tipo.descripcion AS tipo_descripcion

              FROM         pokemon
                  
              JOIN         tipo ON pokemon.tipo_id = tipo.id;
    ";
// Ejecutar la consulta
$resultado = $database->query($query);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokedex</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style>

    </style>
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

<!DOCTYPE html>
<html>
<head>
    <title>Tabla de Pokémon</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>

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
            <?php foreach ($resultado as $pokemon){

                $nombre_pokemon = $pokemon['nombre']; //guardo el nombre del pokemon

                $tipo_pokemon = $pokemon['tipo_descripcion']; //guardo el tipo de pokemon

                $nro_id_unico =$pokemon['nro_id_unico']; //guardo su numero identificador unico

                $pokemon_descripcion = $pokemon['pokemon_descripcion']; //guardo la descripcion del pokemon


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
                        <td>
                                    <form action="ABM.php" method="POST">
                                        <input type="hidden" name="id" value="'.$pokemon['id'].'">
                                        <p>El pokemon ID: '.$pokemon['id'].'</p>
                                        <input type="hidden" name="accion" value="modificar">
                                        <button type="submit" class="w3-button w3-green">Modificar</button>
                                    </form>
                                    <form action="ABM.php" method="POST">
                                        <input type="hidden" name="id" value="'.$pokemon['id'].'">
                                        <input type="hidden" name="accion" value="baja">
                                        <button type="submit" class="w3-button w3-red">Baja</button>
                                    </form>
                        </td>
                        </tr>';
            }
            ?>


        </tr>

        </tbody>
    </table>
</div>

</body>
</html>










</body>
</html>