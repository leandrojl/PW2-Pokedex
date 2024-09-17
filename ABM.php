<?php

include_once 'database.php';

$db = new Database();


if (isset($_POST['id']) && isset($_POST['accion'])) {
    $id = intval($_POST['id']);
    $accion = $_POST['accion'];

    if ($accion === 'modificar') {
        header("Location: agregar_pokemon.php?id=$id");
    } elseif ($accion === 'baja') {

        $sqlQuery = "DELETE FROM pokedex WHERE id = ?";
        $stmt = $db->conexion->prepare($sqlQuery);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $stmt->close();

        header("Location: perfilAdmin.php");
    } elseif ($accion === 'agregar') {
        // Asegúrate de que estos datos provengan de un formulario o de algún input válido
        $nombre = $_POST['nombre'];
        $tipo = $_POST['tipo'];
        $numero = $_POST['numero'];
        $imagen = $_POST['imagen'];

        $sqlQuery = "INSERT INTO pokedex (nombre, tipo, numero, imagen) VALUES (?, ?, ?, ?)";
        $stmt = $db->conexion->prepare($sqlQuery);
        $stmt->bind_param('ssis', $nombre, $tipo, $numero, $imagen);
        $stmt->execute();
        $stmt->close();

        header("Location: lista_pokemon.php");
    }
}


