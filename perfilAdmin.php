<?php
session_start();

// Verificar si el usuario está logueado
if (!isset($_SESSION["logueado"])) {
    // Si no está logueado, redirigir al inicio
    header("Location: vistaPokedexBusqueda.php");
    exit();
}


include_once 'database.php';
include_once 'PokemonManager.php';

// Instancio la BDD y la clase que maneja el ABM de los pokemons

$db = new Database();
$pokemonManager = new PokemonManager($db);

// Creo la query pra obtener todos los pokemons y todos sus atributos
$sqlQuery = "
    SELECT p.id, p.imagen, p.nombre,p.descripcion, t.descripcion AS tipo
    FROM pokemon p
    JOIN tipo t ON p.tipo_id = t.id
";
// Acceso a la BDD, ejecuto la consulta y la almaceno en una variable

$resultado = $db->conexion->query($sqlQuery);

function obtenerRutaImagen($ruta) {
    // Si viene con/img lo elimina
    $rutaLimpia = str_replace('imagenes/', '', $ruta);

    return 'img/' . $rutaLimpia;
}

$tipos = $pokemonManager->obtenerTipos();
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

<main>
    <div class="w3-container">
        <h2 class="w3-center">Agregar Nuevo Pokémon</h2>
        <form action="ABM.php" method="POST"  enctype="multipart/form-data" class="w3-form">
            <div class="w3-row-padding">
                <div class="w3-half">
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" class="w3-input w3-border">
                </div>
                <div class="w3-half">
                    <label for="tipo_id">Tipo:</label>
                    <select id="tipo_id" name="tipo_id" required class="w3-select w3-border">
                        <option value="" disabled selected>Selecciona el tipo</option>
                        <?php foreach ($tipos as $tipo): ?>
                            <option value="<?php echo htmlspecialchars($tipo['id']); ?>"><?php echo htmlspecialchars($tipo['descripcion']); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="w3-row-padding">
                <div class="w3-half">
                    <label for="imagen">Imagen (archivo):</label>
                    <input type="file" id="imagen" name="imagen"  accept="image/*" required class="w3-input w3-border">
                </div>
            </div>
            <input type="hidden" name="accion" value="agregar">
            <button type="submit" class="w3-button w3-teal">Agregar Pokémon</button>
        </form>
    </div>
    <form class="buscador" action="" method="get">
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
                <th>Descripcion</th>
                <th>Ver Pokémon</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($resultado as $pokemon): ?>
                <tr>
                    <td>
                         <img src="./imagenes/<?php echo $pokemon['nombre']; ?>.png"
                               alt="<?php echo htmlspecialchars($pokemon['nombre']); ?>"
                               class="w3-image"
                               style="width:100px;">
                    </td>


                    <td><img src="imagenes/<?php echo $pokemon['tipo']; ?>.png" alt="Tipo <?php echo $pokemon['tipo']; ?>" class="w3-image" style="width:100px;"></td>
                    <td>#<?php echo $pokemon['id']; ?></td>
                    <td><?php echo $pokemon['nombre']; ?></td>
                    <td><?php echo $pokemon['descripcion']; ?></td>
                    <td><button class="w3-button w3-blue" onclick="window.location.href='vistaPokemonSeleccionado.php?page=<?php echo $pokemon['nombre'] ?>&id=<?php echo $pokemon['id']; ?>'">Ver a <?php echo $pokemon['nombre']; ?></button></td>
                    <td>
                        <form action="modificar_pokemon.php" method="GET">
                            <input type="hidden" name="id" value="<?php echo $pokemon['id']; ?>">
                            <button type="submit" class="w3-button w3-green">Modificar</button>
                        </form>
                        <form action="ABM.php" method="POST">
                            <input type="hidden" name="id" value="<?php echo $pokemon['id']; ?>">
                            <input type="hidden" name="accion" value="baja">
                            <button type="submit" class="w3-button w3-red">Baja</button>
                        </form>
                    </td>

                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>


    </div>
</main>
</body>
</html>
