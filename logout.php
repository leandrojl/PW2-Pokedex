<?php
session_start();
session_destroy(); // Destruye la sesión actual
header("Location: vistaPokedexBusqueda.php"); // Redirige al login
exit();
