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


<?php
if (isset($_POST["ver"])) {

    $imagen_pokemon = $_POST["pokemon_img"];
    $tipo = $_POST["tipo_img"];
    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];

    echo '<main class="container my-5">
                 <div class="card text-center shadow-sm">
                     <div class="card-header d-flex justify-content-center align-items-center">
                         <img src="https://example.com/icon.png" alt="Icono" style="width: 40px; margin-right: 10px;">
                         <h3 class="card-title m-0">' . $nombre . '</h3>
                     </div>
                     <div class="card-body">
                         <img src="imagenes/pokemon/' . $imagen_pokemon . '" alt="' . $nombre . '" class="img-fluid" style="max-width: 200px;">
                         <p class="mt-3"><strong>ID:</strong> ' . $id . '</p>
                         <p><strong>Descripción:</strong> ' . $descripcion . '</p>
                     </div>
                 </div>
               </main>';


}else{
    header("Location: " .$_SERVER['HTTP_REFERER']);
    exit();
}








