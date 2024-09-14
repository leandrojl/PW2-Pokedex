<?php
session_start();
include_once 'database.php';

$db = new Database();

// Obtener el ID del Pokémon desde el parámetro GET
$id = intval($_GET['id']);

// Consultar la base de datos para obtener los detalles del Pokémon
$sqlQuery = "SELECT nombre, tipo, numero, imagen FROM pokemon WHERE id = ?";
$stmt = $db->conexion->prepare($sqlQuery);
$stmt->bind_param('i', $id);
$stmt->execute();
$resultado = $stmt->get_result()->fetch_assoc();
$stmt->close();
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
    <!-- ... otros elementos ... -->
</header>
<main>
    <div class="w3-container">
        <h2 class="w3-center">Modificar Pokémon</h2>
        <form action="ABM.php" method="POST" class="w3-container">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" value="<?php echo htmlspecialchars($resultado['nombre']); ?>" required class="w3-input">
            <label for="tipo">Tipo:</label>
            <input type="text" id="tipo" name="tipo" value="<?php echo htmlspecialchars($resultado['tipo']); ?>" required class="w3-input">
            <label for="numero">Número:</label>
            <input type="text" id="numero" name="numero" value="<?php echo htmlspecialchars($resultado['numero']); ?>" required class="w3-input">
            <label for="imagen">Imagen:</label>
            <input type="text" id="imagen" name="imagen" value="<?php echo htmlspecialchars($resultado['imagen']); ?>" required class="w3-input">
            <input type="hidden" name="accion" value="modificar">
            <button type="submit" class="w3-button w3-green">Modificar Pokémon</button>
        </form>
    </div>
</main>
</body>
</html>
