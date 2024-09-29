<?php
session_start();
include_once 'database.php';
include_once 'PokemonManager.php';

// Crear instancia de la base de datos y el manejador de Pokémon
$db = new Database();
$pokemonManager = new PokemonManager($db);

// Obtener el ID del Pokémon desde el parámetro GET
$id = intval($_GET['id']);

// Obtener los detalles del Pokémon utilizando la clase PokemonManager
$pokemon = $pokemonManager->obtenerPokemonPorId($id);

// Obtener lista de tipos para el dropdown
$tipos = $pokemonManager->obtenerTipos();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="estilos/estilos.css">
    <link rel="stylesheet" href="estilos/estilos_modificar_pokemon.css">
    <link rel="shortcut icon" href="imagenes/Pokebola.png">
    <title>Modificar Pokémon</title>
</head>
<body>
<header>
    <?php


    include './header.php';


    ?>
</header>
<?php
include './barraBuscadora.php'
?>

<main>
    <div class="w3-container">
        <h2 class="w3-center">Modificar Pokémon</h2>
        <form action="ABM.php" method="POST" enctype="multipart/form-data" class="form_modificar">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($pokemon['id']); ?>">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" value="<?php echo htmlspecialchars($pokemon['nombre']); ?>" required>

            <label for="tipo_id">Tipo:</label>
            <select id="tipo_id" name="tipo_id" required>
                <?php foreach ($tipos as $tipo) { ?>
                    <option value="<?php echo htmlspecialchars($tipo['id']); ?>" <?php echo $tipo['id'] == $pokemon['tipo_id'] ? 'selected' : ''; ?>>
                        <?php echo htmlspecialchars($tipo['descripcion']); ?>
                    </option>
                <?php } ?>
            </select>

            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion" name="descripcion" required><?php echo htmlspecialchars($pokemon['descripcion']); ?></textarea>


            <label for="imagen">Imagen (archivo):</label>
            <input type="file" id="imagen" name="imagen"  accept="image/*" class="w3-input w3-border">
            <input type="hidden" name="accion" value="modificar">
            <button type="submit" class="w3-button w3-green">Modificar Pokémon</button>
        </form>
    </div>
</main>
</body>
</html>
