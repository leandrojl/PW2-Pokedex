<?php
// Verificar si el usuario está logueado
if (!isset($_SESSION["logueado"])) {
// Si no está logueado le muestro el header de login
    echo '<div class="w3-container w3-red w3-padding-16">

    <div class="w3-row">
        <img class="w3-col l3" src="./imagenes/pokemon_logo.png" alt="">
        <h1 class="w3-col w3-center l6">Pokedex</h1>
        <form class="w3-col l3" action="validar.php" method="POST">

            <div class="">
                <label class="w3-text-black"><b>Usuario</b></label>
                <input class="w3-input w3-border" type="text" name="usuario" required placeholder="Ingrese su usuario">
            </div>

            <div class="">
                <label class="w3-text-black"><b>Contraseña</b></label>
                <input class="w3-input w3-border" type="password" name="clave" required placeholder="Ingrese su contraseña">
            </div>
            <div class="">
                <button class="w3-button w3-blue" type="submit">Ingresar</button>
            </div>
        </form>
    </div>

</div>
';

}else{
//si esta logeado, le muestro el header para salir

    echo '<header>
    <div class="logo"><img src="imagenes/pokedex-removebg-preview.png"></div>
    <div class="titulo"><img src="imagenes/pokedex-titulo.png"></div>
    <div class="login">
        <p>Usuario Administrador</p>
        <input type="button" value="Salir" onclick="window.location.href=\'logout.php\'">
    </div>
</header>';
}

?>