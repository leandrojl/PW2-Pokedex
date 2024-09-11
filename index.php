<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos/estilos.css">
    <title>Pokedex</title>

</head>
<body>

<header>
    <div class="logo"><img src="imagenes/pokedex-removebg-preview.png"></div>
    <div class="titulo"><img src="imagenes/pokedex-titulo.png"></div>
    <div class="login">
        <form class="login" action="validar.php" method="post" enctype="application/x-www-form-urlencoded">
           <input type="text" name="usuario" placeholder="Usuario">
            <input type="password" name="clave" placeholder="Password">
            <input type="submit">
        </form>
    </div>
</header>

<main>
    <h1>Tabla con 6 Columnas</h1>
    <table>
        <tr>
            <th>Columna 1</th>
            <th>Columna 2</th>
            <th>Columna 3</th>
            <th>Columna 4</th>
            <th>Columna 5</th>
            <th>Columna 6</th>
        </tr>
        <tr>
            <td>Dato 1</td>
            <td>Dato 2</td>
            <td>Dato 3</td>
            <td>Dato 4</td>
            <td>Dato 5</td>
            <td>Dato 6</td>
        </tr>
        <!-- Agrega más filas aquí según sea necesario -->
    </table>
</main>

</body>
</html>
