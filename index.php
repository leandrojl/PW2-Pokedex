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
    <form class="buscador" action="resultados.php" method="get">
        <input type="text" name="query" placeholder="Ingrese el nombre, tipo o numero de pokemon" required>
        <input type="submit" value="¿Quién es este pokemon?">
    </form>


</main>

</body>
</html>
