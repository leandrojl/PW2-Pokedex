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
    <link rel="stylesheet" href="estilos/estilos.css">
    <link rel="stylesheet" href="estilos/estilos_tabla_perfilAdmin.css">
    <link rel="shortcut icon" href="imagenes/Pokebola.png">
    <title>Pokedex</title>
</head>


<header><?php


    include './header.php';


?>
</header>
<body>
<main>
    <div class="w3-container contenedor-agregar">
        <h2 class="w3-center">Agregar Nuevo Pokémon</h2>
        <form action="ABM.php" method="POST"  enctype="multipart/form-data" class="w3-form" id="nuevoForm">
            <div class="w3-row-padding">
                <div class="w3-half">
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" class="w3-input w3-border" placeholder="Nombre del pokemon">
                </div>

                <div class="w3-half">
                    <label for="nro_id_unico">Id unico:</label>
                    <input type="number" name="nro_id_unico" id="nro_id_unico" class="w3-input w3-border" placeholder="ID del pokemon">
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
                <div class="w3-half">
                    <label for="descripcion">Descripcion:</label>
                    <textarea name="descripcion" id="descripcion" class="w3-input w3-border" placeholder="Breve descripcion"></textarea>
                </div>
            </div>
            <div class="w3-row-padding">
                <div class="w3-half">
                    <label for="imagen">Imagen (archivo):</label>
                    <input type="file" id="imagen" name="imagen"  accept="image/*" required class="w3-input w3-border">
                </div>
            </div>
            <input type="hidden" name="accion" value="agregar">
            <button type="submit" id="nuevoBtn">Agregar Pokémon</button>
        </form>
    </div>

    <?php
    include './barraBuscadora.php'
    ?>

    <div class="w3-container">
        <h2 class="w3-center">Lista de Pokémon</h2>

        <!-- Tabla para pantallas grandes -->
        <div class="w3-table-responsive" id="pokemonTable">
            <table class="w3-table w3-bordered w3-striped w3-hoverable">
                <thead>
                <tr class="w3-light-grey">
                    <th>Imagen</th>
                    <th>Tipo</th>
                    <th>Número</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Ver Pokémon</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($resultado as $pokemon): ?>
                    <tr>
                        <td><img src="<?php echo $db->buscarImagen($pokemon['imagen'])?>" alt="<?php echo htmlspecialchars($pokemon['nombre']); ?>" style="width:100px;"></td>
                        <td><img src="imagenes/<?php echo $pokemon['tipo']; ?>.png" alt="Tipo <?php echo $pokemon['tipo']; ?>" style="width:100px;"></td>
                        <td>#<?php echo $pokemon['id']; ?></td>
                        <td><?php echo $pokemon['nombre']; ?></td>
                        <td><?php echo $pokemon['descripcion']; ?></td>
                        <td>
                            <button class="w3-button w3-blue" onclick="window.location.href='vistaPokemonSeleccionado.php?page=<?php echo $pokemon['nombre'] ?>&id=<?php echo $pokemon['id']; ?>'">Ver a <?php echo $pokemon['nombre']; ?></button>
                        </td>
                        <td>
                            <form action="modificar_pokemon.php" method="GET" style="display:inline;">
                                <input type="hidden" name="id" value="<?php echo $pokemon['id']; ?>">
                                <button type="submit" class="w3-button w3-green">Modificar</button>
                            </form>
                            <form action="ABM.php" method="POST" style="display:inline;">
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

        <!-- Tarjetas para pantallas pequeñas -->
        <div class="w3-row-padding" id="pokemonCards">
            <?php foreach ($resultado as $pokemon): ?>
                <div class="w3-col s12 m6 l4">
                    <div class="w3-card-4 w3-margin-bottom pokemon-card">
                        <header class="w3-container w3-light-grey">
                            <h3><?php echo $pokemon['nombre']; ?> (#<?php echo $pokemon['id']; ?>)</h3>
                        </header>
                        <div class="w3-container">
                            <img src="<?php echo $db->buscarImagen($pokemon['imagen'])?>" alt="<?php echo htmlspecialchars($pokemon['nombre']); ?>" style="width:100px;">
                            <p><strong>Tipo:</strong> <img src="imagenes/<?php echo $pokemon['tipo']; ?>.png" alt="Tipo <?php echo $pokemon['tipo']; ?>" style="width:30px;"></p>
                            <p><strong>Descripción:</strong> <?php echo $pokemon['descripcion']; ?></p>
                        </div>

                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

</main>
<script>
    function updateDisplay() {
        const isMobile = window.innerWidth <= 768;
        document.getElementById('pokemonTable').style.display = isMobile ? 'none' : 'block';
        document.getElementById('pokemonCards').style.display = isMobile ? 'block' : 'none';
    }

    window.addEventListener('resize', updateDisplay);
    window.addEventListener('load', updateDisplay);
</script>
</body>
</html>

<footer class="w3-container w3-light-grey actions">
    <button class="w3-button w3-blue" onclick="window.location.href='vistaPokemonSeleccionado.php?page=<?php echo $pokemon['nombre'] ?>&id=<?php echo $pokemon['id']; ?>'">Ver a <?php echo $pokemon['nombre']; ?></button>
    <form action="modificar_pokemon.php" method="GET" style="display:inline;">
        <input type="hidden" name="id" value="<?php echo $pokemon['id']; ?>">
        <button type="submit" class="w3-button w3-green">Modificar</button>
    </form>
    <form action="ABM.php" method="POST" style="display:inline;">
        <input type="hidden" name="id" value="<?php echo $pokemon['id']; ?>">
        <input type="hidden" name="accion" value="baja">
        <button type="submit" class="w3-button w3-red">Baja</button>
    </form>
</footer>