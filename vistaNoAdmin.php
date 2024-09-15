<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/pw2-pokedex/database.php"?>
<!DOCTYPE html>
<html lang="es">

<body>

<!-- Header -->
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
    </style>
</head>

<header class="container d-flex justify-content-between align-items-center">
    <div>
        <img src="https://example.com/pokedex-logo.png" alt="Pokedex Logo" width="100"> <!-- Reemplaza con una URL válida -->
    </div>
    <h2>Pokedex</h2>
    <form action="validarLogin.php" method="post" enctype="application/x-www-form-urlencoded" class="d-flex">
        <input type="text" name="usuario" placeholder="Usuario" class="form-control me-2">
        <input type="password" name="password" placeholder="Contraseña" class="form-control me-2">
        <input type="submit" name="login" value="Enviar" class="btn btn-primary">
    </form>
</header>

<!-- Main Section -->
<main class="container my-5">
    <!-- Buscador -->
    <div class="mb-4">
        <form action="pokemonBuscado.php" method="post" enctype="application/x-www-form-urlencoded">
        <input type="text" name="buscador" placeholder="Buscar Pokémon" class="form-control">
        <input type="submit" class="btn btn-success mt-2 w-100" name="buscar" value="¿Quién es este Pokémon?">
        </form>
    </div>



    <?php
            $conexion = new Database();
    $pokemones = $conexion->query("SELECT p.imagen as pokemon_img,t.imagen as tipo_img,p.id,p.nombre,p.descripcion FROM pokemon p  join tipo t on p.tipo_id = t.id order by p.nombre ASC");


    foreach ($pokemones as $pokemon) {
                echo '
                
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
                <p>'.$pokemon["id"].'</p>
            </div>
        </div>

        <!-- Nombre -->
        <div class="card">
            <div class="card-body">
                <p><strong>Nombre</strong></p>
                <p>'.$pokemon["nombre"].'</p>
            </div>
        </div>
        
        <div class="card">
            <div class="card-body">
                <p><strong>Acciones</strong></p>
                <div class="btn-group-vertical">
                        <form action="detallePokemon.php" method="post" enctype="application/x-www-form-urlencoded">
                        <input type="hidden" name="pokemon_img" value="' .$pokemon["pokemon_img"].'">
                        <input type="hidden" name="tipo_img" value="'.$pokemon["tipo_img"].'">
                        <input type="hidden" name="id" value="'.$pokemon["id"].'">
                        <input type="hidden" name="nombre" value="'.$pokemon["nombre"].'">
                        <input type="hidden" name="descripcion" value="'.$pokemon["descripcion"].'">
                <input type="submit" name="ver" class="btn btn-info" value="Ver detalles">
                </form> 
                </div>
            </div>
        </div>
    </div>
                
                ';
            }
    ?>

</main>

</body>
</html>
