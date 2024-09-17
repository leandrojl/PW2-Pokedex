<?php
session_start();
/*
// Verificar si el usuario está logueado
if (!isset($_SESSION["logueado"])) {
    // Si no está logueado, redirigir al inicio
    header("Location: index.php");
    exit();
}
*/
include_once 'database.php';
include_once 'PokemonManager.php';


$db = new Database();
$pokemonManager = new PokemonManager($db);


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
    <title>Agregar Pokémon</title>
</head>
<body>

<header>
    <div class="logo"><img src="img/pokedex-removebg-preview.png" alt="Logo"></div>
    <div class="titulo"><img src="img/pokedex-titulo.png" alt=""></div>

    <div class="login">
        <img src="img/foto_perfil.webp" alt="Usuario" class="user-image">
        <p>Usuario: Administrador</p>
    </div>
</header>

<main>
    <div class="w3-container">
        <h2 class="w3-center">Agregar Nuevo Pokémon</h2>
        <form action="ABM.php" method="POST"  enctype="multipart/form-data" class="w3-form">
            <div class="w3-row-padding">
                <div class="w3-half">
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" required class="w3-input w3-border">
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
</main>

</body>
</html>
