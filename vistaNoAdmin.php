<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/pw2-pokedex/database.php"?>
<!DOCTYPE html>
<html lang="es">

<body>

<!-- Header -->
<?php include_once $_SERVER["DOCUMENT_ROOT"] . "/pw2-pokedex/header.php" ?>

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
    </div>
</main>

</body>
</html>
