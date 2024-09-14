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
