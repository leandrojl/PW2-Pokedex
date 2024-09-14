<?php
include 'database.php';
if (isset($_GET['page'])) {
    $page = $_GET['page'];

$database = new Database(); //en esta instancia creo la conexion a la base de datos

$query = "SELECT       pokemon.nro_id_unico, 
                       pokemon.nombre,
                       pokemon.descripcion AS pokemon_descripcion,
                       tipo.imagen AS tipo_img, 
                       tipo.descripcion AS tipo_descripcion

          FROM         pokemon
              
          JOIN         tipo ON pokemon.tipo_id = tipo.id
          
          WHERE        pokemon.nombre LIKE '%$page%'
";


$resultado = $database->query($query);
}else header('Location: ');
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <title>Pokedex</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
<?php
include './header.php';
?>
<?php
include './buscador.php';
?>

<?php
$nombre_pokemon = $resultado[0]['nombre']; //guardo el nombre del pokemon

$tipo_pokemon = $resultado[0]['tipo_descripcion']; //guardo el tipo de pokemon

$nro_id_unico =$resultado[0]['nro_id_unico']; //guardo su numero identificador unico

$pokemon_descripcion = $resultado[0]['pokemon_descripcion']; //guardo la descripcion del pokemon

echo '<div class="w3-row-padding w3-margin">
                    <div class="w3-col l6 m6 s12">
                        <img src="./imagenes/'.$nombre_pokemon.'.png" alt="'.$nombre_pokemon.'" class="w3-image w3-round-large w3-card-4" style="width: 100%; max-width: 400px;">
                    </div>
                    <div class="w3-col l6 m6 s12">
                        <div class="w3-container">
                            <img src="./imagenes/'.$tipo_pokemon.'.png" alt="Tipo'.$tipo_pokemon.'" class="w3-image w3-right w3-margin-bottom" style="width: 80px;">
                            <h2 class="w3-text-blue w3-large w3-margin-top">'.$nombre_pokemon.'</h2>
                            <p>Número de Pokémon: '.$nro_id_unico.'</p>
                            <p>Descripción del Pokémon: '.$pokemon_descripcion.'</p>';
                           if(isset($_SESSION['logueado'])) {
                               echo '
                            <button class="w3-button w3-green"">Modificar</button>
                            <button class="w3-button w3-red" ">Baja</button>';
                           }
                        echo'</div>
                    </div>
           </div>';
/*foreach ($resultado as $pokemon){

    $nombre_pokemon = $pokemon['nombre']; //guardo el nombre del pokemon

    $tipo_pokemon = $pokemon['tipo_descripcion']; //guardo el tipo de pokemon

    $nro_id_unico =$pokemon['nro_id_unico']; //guardo su numero identificador unico

    $pokemon_descripcion = $pokemon['pokemon_descripcion']; //guardo la descripcion del pokemon

    echo '<div class="w3-row-padding w3-margin">
                    <div class="w3-col l6 m6 s12">
                        <img src="./imagenes/'.$nombre_pokemon.'.png" alt="'.$nombre_pokemon.'" class="w3-image w3-round-large w3-card-4" style="width: 100%; max-width: 400px;">
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


}*/
?>
</body>
</html>
