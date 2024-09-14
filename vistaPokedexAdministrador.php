<?php
include 'database.php';


    $database = new Database(); //en esta instancia creo la conexion a la base de datos
/*
    $query = "SELECT       pokemon.nro_id_unico, 
                       pokemon.nombre,
                       pokemon.descripcion AS pokemon_descripcion,
                       tipo.imagen AS tipo_img, 
                       tipo.descripcion AS tipo_descripcion

          FROM         pokemon
              
          JOIN         tipo ON pokemon.tipo_id = tipo.id
          
        
";

    $resultado = $database->query($query);*/
$resultado=$database->devolverListadoCompleto();

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
<?php
include './buscador.php';
?>
<div class="w3-container w3-gray w3-padding-16">
    <form class="w3-row" action="login.php" method="POST">

        <div class="w3-col l8">
            <input class="w3-input w3-border" type="text" name="username" required placeholder="Ingrese el nombre, tipo o numero de pokemon que busca">
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
<?php
foreach ($resultado as $pokemon){
    $nombre_pokemon = $pokemon['nombre']; //guardo el nombre del pokemon
    $tipo_pokemon = $pokemon['tipo_descripcion']; //guardo el tipo de pokemon
    $nro_id_unico =$pokemon['nro_id_unico']; //guardo su numero identificador unico
    $pokemon_descripcion = $pokemon['pokemon_descripcion']; //guardo la descripcion del pokemon
    echo '

    
        <tr>
            <td><img src="./imagenes/'.$nombre_pokemon.'.png" alt="Bulbasaur" class="w3-image" style="width:100px;"></td>
            <td><img src="./imagenes/'.$tipo_pokemon.'.png" alt="Tipo Planta" class="w3-image" style="width:100px;"></td>
            <td>#001</td>
            <td> <a href="vistaPokedexBusqueda.php?page=Bulbasaur">'.$nombre_pokemon.'</a> </td>
           <td> <button class="w3-button w3-blue" onclick="window.location.href=\'vistaPokemonSeleccionado.php?page='.$nombre_pokemon.'\'">'.$nombre_pokemon.'</button> </td>
            <td>
                <button class="w3-button w3-green"">Modificar</button>
                <button class="w3-button w3-red" ">Baja</button>
            </td>

        </tr>
'  ;}
?>
        </tbody>
    </table>
</div>




</body>
</html>

