<?php
session_start();
include 'database.php';
if (isset($_GET['page'])) {
    $page = $_GET['page'];

$database = new Database(); //en esta instancia creo la conexion a la base de datos

$query = "SELECT       pokemon.nro_id_unico, pokemon.imagen,
                       pokemon.nombre,
                       pokemon.descripcion AS pokemon_descripcion,
                       tipo.imagen AS tipo_img, 
                       tipo.descripcion AS tipo_descripcion

          FROM         pokemon
              
          JOIN         tipo ON pokemon.tipo_id = tipo.id
          
          WHERE        pokemon.nombre LIKE '%$page%'
";

$resultado = $database->query($query);
}
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="estilos/estilos.css">
    <link rel="shortcut icon" href="imagenes/Pokebola.png">
    <title>Pokedex</title>
</head>
<header>

    <?php


    include './header.php';


    ?>
</header>
<body>
<?php
include './barraBuscadora.php'
?>



<?php foreach ($resultado as $pokemon){

    $nombre_pokemon = $pokemon['nombre']; //guardo el nombre del pokemon

    $tipo_pokemon = $pokemon['tipo_descripcion']; //guardo el tipo de pokemon

    $nro_id_unico =$pokemon['nro_id_unico']; //guardo su numero identificador unico

    $pokemon_descripcion = $pokemon['pokemon_descripcion']; //guardo la descripcion del pokemon

    echo '<div class="w3-row-padding w3-margin">
                    <div class="w3-col l6 m6 s12">
                        <img src="'.$database->buscarImagen($pokemon['imagen']).'" alt="'.$nombre_pokemon.'" class="w3-image w3-round-large w3-card-4" style="width: 100%; max-width: 400px;">
                    </div>
                    <div class="w3-col l6 m6 s12">
                        <div class="w3-container">
                            <img src="./imagenes/'.$tipo_pokemon.'.png" alt="Tipo'.$tipo_pokemon.'" class="w3-image w3-right w3-margin-bottom" style="width: 80px;">
                            <h2 class="w3-text-blue w3-large w3-margin-top">'.$nombre_pokemon.'</h2>
                            <p>Número de Pokémon: '.$nro_id_unico.'</p>
                            <p>Descripción del Pokémon: '.$pokemon_descripcion.'</p>
                        </div>
                    </div>
           </div>';


}
?>
</body>
</html>










</body>
</html>



