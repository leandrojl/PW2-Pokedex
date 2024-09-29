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
    <link rel="stylesheet" href="estilos/estilos_tabla_perfilAdmin.css">
    <link rel="shortcut icon" href="imagenes/Pokebola.png">
</head>
<header>
    <?php
    include './header.php';
    ?>
</header>
<body>
<?php include './navbar.php'; ?>
<?php
include './barraBuscadora.php';
?>


<?php
include 'buscador.php';
?>
<script>
    function updateDisplay() {
        const isMobile = window.innerWidth <= 768;
        const isTablet = window.innerWidth > 768 && window.innerWidth <= 1024;
        const isMonitor = window.innerWidth > 1024;
        if(window.innerWidth <= 768){
            document.getElementById('pokemonTable').style.display = isMobile ? 'none' : 'block';
            document.getElementById('pokemonCards').style.display = isMobile ? 'block' : 'none';
        }else if(window.innerWidth > 768 && window.innerWidth <= 1024){
            document.getElementById('pokemonTable').style.display = isTablet ? 'block' : 'block';
            document.getElementById('pokemonCards').style.display = isTablet ? 'none' : 'none';

        }else if(window.innerWidth > 1024){
            document.getElementById('pokemonTable').style.display = isMonitor ? 'block' : 'none';
            document.getElementById('pokemonCards').style.display = isMonitor ? 'none' : 'block';
        }





    }

    window.addEventListener('resize', updateDisplay);
    window.addEventListener('load', updateDisplay);
</script>
</body>



</html>