<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokedex</title>

    <!-- Incluir Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        header {
            background-color: #f8f9fa;
            padding: 20px;
        }
        .pokemon-info {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 20px;
            text-align: center;
        }
        .pokemon-info img {
            width: 100%;
        }
        .btn-group-vertical {
            display: flex;
            flex-direction: column;
        }
    </style>
</head>
<body>

<!-- Header -->
<header class="container d-flex justify-content-between align-items-center">
    <div>
        <img src="https://example.com/pokedex-logo.png" alt="Pokedex Logo" width="100"> <!-- Reemplaza con una URL válida -->
    </div>
    <h2>Pokedex</h2>
    <div class="d-flex align-items-center">
        <?php session_start();
        $nombreUsuario = $_SESSION['usuario']; // Manejar si no hay sesión
        echo '<p class="me-3 mb-0">Usuario: ' . htmlspecialchars($nombreUsuario) . '</p>';
        ?>
        <a href="logout.php" class="btn btn-danger">Cerrar sesión</a>
    </div>
</header>

<!-- Main Section -->
<main class="container my-5">
    <!-- Buscador -->
    <div class="mb-4">
        <form action="vistaPokemon.php" method="post" enctype="application/x-www-form-urlencoded">
            <input type="text" name="buscador" placeholder="Buscar Pokémon" class="form-control">
            <input type="submit" class="btn btn-success mt-2 w-100" name="buscar" value="¿Quién es este Pokémon?">
        </form>
    </div>

    <!-- Información del Pokémon -->
    <div class="pokemon-info">
        <!-- Imagen -->
        <div class="card">
            <div class="card-body">
                <p><strong>Imagen</strong></p>
                <img src="" alt="Imagen del Pokémon" class="img-fluid">
            </div>
        </div>

        <!-- Tipo -->
        <div class="card">
            <div class="card-body">
                <p><strong>Tipo</strong></p>
                <img src="" alt="Tipo del Pokémon" class="img-fluid">
            </div>
        </div>

        <!-- Número -->
        <div class="card">
            <div class="card-body">
                <p><strong>Número</strong></p>
                <p>007</p>
            </div>
        </div>

        <!-- Nombre -->
        <div class="card">
            <div class="card-body">
                <p><strong>Nombre</strong></p>
                <p>Charmander</p>
            </div>
        </div>

        <!-- Acciones -->
        <div class="card">
            <div class="card-body">
                <p><strong>Acciones</strong></p>
                <div class="btn-group-vertical">
                    <button class="btn btn-primary mb-2">Modificar</button>
                    <button class="btn btn-danger">Eliminar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Botón de nuevo Pokémon -->
    <div class="mt-4 text-center">
        <button class="btn btn-info">Nuevo Pokémon</button>
    </div>
</main>

</body>
</html>
