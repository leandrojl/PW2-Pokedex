<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Pokémon y Tipo</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        header {
            background-color: #f8f9fa;
            padding: 20px;
        }
        main {
            margin-top: 30px;
        }
        form {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>

<header class="container">
    <h2>Agregar Pokémon y Tipo</h2>
</header>

<main class="container">

    <!-- Formulario para agregar Pokémon -->
    <div class="mb-5">
        <h4>Agregar Pokémon</h4>
        <form action="vistaDarDeAltaNuevoPokemon.php.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="nombrePokemon" class="form-label">Nombre del Pokémon</label>
                <input type="text" class="form-control" id="nombrePokemon" name="nombre" required>
            </div>
            <div class="mb-3">
                <label for="idPokemon" class="form-label">ID del Pokémon</label>
                <input type="number" class="form-control" id="idPokemon" name="id" required>
            </div>
            <div class="mb-3">
                <label for="imagenPokemon" class="form-label">Imagen del Pokémon (texto)</label>
                <input type="text" class="form-control" id="imagenPokemon" name="imagen" placeholder="charmander.jpg" required>
            </div>
            <div class="mb-3">
                <label for="descripcionPokemon" class="form-label">Descripción del Pokémon</label>
                <textarea class="form-control" id="descripcionPokemon" name="descripcion" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="tipoId" class="form-label">ID del Tipo</label>
                <input type="number" class="form-control" id="tipoId" name="tipo_id" required>
            </div>
            <button type="submit" class="btn btn-success">Guardar Pokémon</button>
        </form>
    </div>

</main>

</body>
</html>

<?php



?>
