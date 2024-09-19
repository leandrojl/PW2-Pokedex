<?php
include_once 'database.php';
include_once 'PokemonManager.php';

$db = new Database();
$pokemonManager = new PokemonManager($db);

session_start();

// Verificar si el usuario está logueado

if (!isset($_SESSION["logueado"])) {
    header("Location: vistaPokedexBusqueda.php");
    exit();
}

if (isset($_POST['accion'])) {
    $accion = $_POST['accion'];
    $nombre = $_POST['nombre'];
    $tipo_id = intval($_POST['tipo_id']);
    $rutaImagen = null;
    $extensionArchivo = "";
    $numeroTotalDePokemones = 0;

    // Verifico que el campo de archivo se envió y  verifico que no hubo errores en el proceso de carga del archivo
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
        $nombreArchivo = $_FILES['imagen']['name'];
        $tipoArchivo = $_FILES['imagen']['type'];
        $tamanioArchivo = $_FILES['imagen']['size'];
        $archivoTemporal = $_FILES['imagen']['tmp_name'];


        // Si se sube un archivo que no sea png, me da error
        $extensionArchivo = pathinfo($nombreArchivo, PATHINFO_EXTENSION);


        // Limito el tamaño del archivo a 2mb
        if ($tamanioArchivo > 2097152) {
            echo "El archivo es muy pesado. Tamaño máximo permitido es 2MB.";
            exit();
        }

        $carpetaDestino = 'imagenes/';
        $nombreImagen = $_POST["nombre"]; // Hago que el nombre de la imagen sea igual al nombre del pokemon, para despues mostrarlo bien en la vista principal
        $rutaImagen = $carpetaDestino . $nombreImagen . '.' . $extensionArchivo;

        // Mover el archivo desde su ubicación temporal a la carpeta de destino
        if (!move_uploaded_file($archivoTemporal, $rutaImagen)) {
            echo "Error al subir la imagen.";
            exit();
        }else{
            $numeroTotalDePokemones = $pokemonManager->obtenerNumeroTotalDePokemones();
            rename($rutaImagen, "./imagenes/" . $numeroTotalDePokemones . "." . $extensionArchivo); //cambio el nombre de la img de pikachu a 3 (de nombre a id)
        }

    } else { // Si no se sube una imagen, se mantiene la imagen existente
        $rutaImagen = null;
        if ($accion === 'modificar') {
            $pokemonExistente = $pokemonManager->obtenerPokemonPorId($_POST['id']);
            $rutaImagen = $pokemonExistente['imagen'];  // Mantener la imagen existente
        }
    }


    if ($accion === 'agregar') {
        // Me aseguro que $rutaImagen contiene la ruta de la imagen subida
        if ($rutaImagen !== null) {
            $pokemonManager->agregarPokemon($nombre, $tipo_id, "imagenes/" . $numeroTotalDePokemones . "." . $extensionArchivo);
            header("Location: perfilAdmin.php");
            exit();
        } else {
            echo "Error: no se subio ninguna imagen.";
            exit();
        }
    }


    if ($accion === 'modificar') {
        $id = intval($_POST['id']);
        $descripcion = $_POST['descripcion'];

        // Si no se cargó ninguna imagen, mantiene la que ya estaba
        if ($rutaImagen === null) {
            $pokemonExistente = $pokemonManager->obtenerPokemonPorId($id);
            $rutaImagen = $pokemonExistente['imagen'];
        }

        // Si se cargó la imagen, la cambia
        $pokemonManager->modificarPokemon($id, $nombre, $tipo_id, $descripcion, $rutaImagen);
        header("Location: perfilAdmin.php");
        exit();
    }
    // Elimina al pokemon
    if ($accion === 'baja') {
        $id = intval($_POST['id']);
        $pokemonManager->eliminarPokemon($id);
        header("Location: perfilAdmin.php");
        exit();
    }
}
?>
