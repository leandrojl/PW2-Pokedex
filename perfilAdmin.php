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

$db = new Database();

$sqlQuery = "SELECT pokemon.nro_id_unico, pokemon.imagen, pokemon.nombre, pokemon.descripcion FROM pokemon JOIN tipo ON pokemon.tipo_id = tipo.id;";
$resultado = $db->query($sqlQuery);

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

<header>
    <div class="logo"><img src="img/pokedex-removebg-preview.png" alt="Logo"></div>
    <div class="titulo"><img src="img/pokedex-titulo.png" alt=""></div>

    <div class="login">
        <img src="img/foto_perfil.webp" alt="Usuario" class="user-image">
        <p>Usuario: Administrador</p>
    </div>

</header>

<main>
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
                <th>Ver Pokémon</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($resultado as $pokemon): ?>
            <?php var_dump($pokemon);?>
                <tr>
                    <td><img src="img/<?php echo htmlspecialchars($pokemon['nombre']); ?>.png" alt="<?php echo htmlspecialchars($pokemon['nombre']); ?>" class="w3-image" style="width:100px;"></td>
                    <td><img src="img/<?php echo htmlspecialchars($pokemon['pokemon_tipo']); ?>.png" alt="Tipo <?php echo htmlspecialchars($pokemon['tipo']); ?>" class="w3-image" style="width:100px;"></td>
                    <td>#<?php echo htmlspecialchars($pokemon['numero']); ?></td>
                    <td><?php echo htmlspecialchars($pokemon['nombre']); ?></td>
                    <td><button class="w3-button w3-blue" onclick="window.location.href='vistaPrincipalDeBusqueda.php?page=<?php echo urlencode($pokemon['nombre']); ?>&id=<?php echo $pokemon['id']; ?>'">Ver a <?php echo htmlspecialchars($pokemon['nombre']); ?></button></td>
                    <td>
                        <form action="ABM.php" method="POST">
                            <input type="hidden" name="id" value="<?php echo $pokemon['id']; ?>">
                            <input type="hidden" name="accion" value="modificar">
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

        <a href="agregar_pokemon.php" class="w3-button w3-teal">Agregar Pokémon</a>
    </div>




</main>

</body>
</html>
