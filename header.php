<?php
session_start();
//$_SESSION['logueado']=1;
echo'
    
    <div class="w3-container w3-red w3-padding-16" >

    <div class="w3-row" >
        <img class="w3-col l3" src = "./imagenes/pokemon_logo.png" alt = "" >
        <h1 class="w3-col w3-center l6" > Pokedex</h1 >
        ';
if(!isset($_SESSION['logueado'])) {
    echo'

        <form class="w3-col l3" action = "validar.php" method = "POST" >

            <div class="" >
                <label class="w3-text-black" ><b > Usuario</b ></label >
                <input class="w3-input w3-border" type = "text" name = "usuario" required placeholder = "Ingrese su usuario" >
            </div >

            <div class="" >
                <label class="w3-text-black" ><b > Contraseña</b ></label >
                <input class="w3-input w3-border" type = "password" name = "clave" required placeholder = "Ingrese su contraseña" >
            </div >
            <div class="" >
                <button class="w3-button w3-blue" type = "submit" > Ingresar</button >
            </div >
        </form >
        ';}else echo '<h2 class="w3-text-black" ><b >Bienvenido Administrador</b ></h2 >
 <form class="w3-col l3" action = "logout.php" method = "POST" >

            <div class="" >
                <input class="w3-input w3-border" type = "submit" value="Cerrar sesion" >
            </div >

        </form >
';
    echo '
    </div >


</div >
';

?>


