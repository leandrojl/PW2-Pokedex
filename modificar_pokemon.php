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
    <link rel="stylesheet" href="styles/style.css">
    <link rel="shortcut icon" href="img/Pokebola.png">
    <title>Modificar Pokémon</title>
</head>
<body>
<header>
    <div class="logo"><img src="img/pokedex-removebg-preview.png" alt="Logo"></div>
    <div class="titulo"><img src="img/pokedex-titulo.png" alt=""></div>
    <div class="login">
        <img src="img/ash.jfif" alt="Usuario" class="user-image">
        <p>Usuario: Administrador</p>
    </div>
</header>
<?php
include './barraBuscadora.php'
?>

<main>
    <div class="w3-container">
        <h2 class="w3-center">Modificar Pokémon</h2>
        <form action="ABM.php" method="POST">
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
            <label for="imagen">Imagen:</label>
            <input type="text" id="imagen" name="imagen" value="<?php echo htmlspecialchars($pokemon['imagen']); ?>" required>
            <input type="hidden" name="accion" value="modificar">
            <button type="submit" class="w3-button w3-green">Modificar Pokémon</button>
        </form>
    </div>
</main>
</body>
</html>
