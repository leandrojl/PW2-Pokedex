<?php
// Verificar si el usuario está logueado
if (!isset($_SESSION["logueado"])) {
// Si no está logueado le muestro el header de login
    echo '
    
    <div class="logo"><img src="imagenes/pokedex-removebg-preview.png"></div>
    <div class="titulo"><img src="imagenes/pokedex-titulo.png"></div>
    <div class="login">
        <form class="login" action="validar.php" method="post" enctype="application/x-www-form-urlencoded">
            <input type="text" name="usuario" placeholder="Usuario">
            <input type="password" name="clave" placeholder="Password">
            <input type="submit">
        </form>
    </div>
';

}else{
//si esta logeado, le muestro el header para salir

    echo '
    
    <div class="logo"><img src="imagenes/pokedex-removebg-preview.png"></div>
    <div class="titulo"><img src="imagenes/pokedex-titulo.png"></div>
    <div class="login">
        <p>Usuario Administrador</p>
        <input type="button"  value="Salir" onclick="window.location.href=\'logout.php\'">
    </div>
';
}

?>