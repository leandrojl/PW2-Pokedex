<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/pw2-pokedex/database.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/pw2-pokedex/header.php";


if (isset($_POST["buscar"]) && $_POST["buscador"] != "") {
    $nombrePokemon = $_POST["buscador"];
    $conexion = new Database();
    //$query = "SELECT * FROM pokemon WHERE nombre LIKE '%" . $nombrePokemon . "%' LIMIT 1";
    $query = "SELECT * FROM pokemon WHERE nombre = '$nombrePokemon'";
    $resultado = $conexion->query($query);

    if ($resultado != null) {
        foreach ($resultado as $pokemon) {
            echo '<main class="container my-5">
                    <div class="card text-center shadow-sm">
                        <div class="card-header d-flex justify-content-center align-items-center">
                            <img src="https://example.com/icon.png" alt="Icono" style="width: 40px; margin-right: 10px;">
                            <h3 class="card-title m-0">' . $pokemon["nombre"] . '</h3>
                        </div>
                        <div class="card-body">
                            <img src="imagenes/pokemon/' . $pokemon["imagen"] . '" alt="' . $pokemon["nombre"] . '" class="img-fluid" style="max-width: 200px;">
                            <p class="mt-3"><strong>ID:</strong> ' . $pokemon["id"] . '</p>
                            <p><strong>Descripción:</strong> ' . $pokemon["descripcion"] . '</p>
                        </div>
                    </div>
                  </main>';
        }
    } else {
        echo 'No encontrado';
        header("Location: vistaNoAdmin.php");
        exit();
    }
}else{
    echo 'No encontrado';
    header("Location: vistaNoAdmin.php");
    exit();
}







