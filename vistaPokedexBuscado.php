<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokedex</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="estilos/estilos.css">
    <link rel="shortcut icon" href="imagenes/Pokebola.png">
</head>
<header>
    <?php
    include './header.php';
    ?>
</header>
<?php
include './barraBuscadora.php';
?>


    <?php
    include 'buscador.php';
    ?>

</html>