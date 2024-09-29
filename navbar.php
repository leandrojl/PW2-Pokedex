<?php

if (isset($_SESSION["logueado"])) {

echo '
    
    <div class="w3-bar w3-blue w3-hide-medium w3-hide-large w3-center">
    <div class="w3-bar-item w3-center" style="width:100%"> <!-- Usamos un div contenedor para centrar -->
        <a href="perfilAdmin.php" class="w3-button">Inicio</a>
    </div>
</div>

<!-- Navbar para pantallas grandes -->
<div class="w3-bar w3-blue w3-hide-small w3-center">
    <div class="w3-bar-item w3-center" style="width:100%">
        <a href="perfilAdmin.php" class="w3-button">Inicio</a>
    </div>
</div>
';}else{

    echo '
    
    <div class="w3-bar w3-blue w3-hide-medium w3-hide-large w3-center">
    <div class="w3-bar-item w3-center" style="width:100%"> 
        <a href="vistaPokedexBusqueda.php" class="w3-button">Inicio</a>
    </div>
</div>

<!-- Navbar para pantallas grandes -->
<div class="w3-bar w3-blue w3-hide-small w3-center">
    <div class="w3-bar-item w3-center" style="width:100%">
        <a href="vistaPokedexBusqueda.php" class="w3-button">Inicio</a>
    </div>
</div>
';


}


?>

