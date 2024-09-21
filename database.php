<?php

/*$database = new Database(); ----------------------PRUEBA DE QUE FUNCIONA

$resultado = $database->query("SELECT * FROM pokemon");

foreach ($resultado as $pokemon) {
    echo "id: " . $pokemon["id"] . ", nombre: " . $pokemon["nombre"] .  "<br>";
}*/



class Database{
    public function __construct(){
            $this->conexion = new mysqli("localhost","root","","pokedex");
        }

    public function query($query){
        return $this->conexion->query($query)->fetch_all(MYSQLI_ASSOC); //me devuelve la consulta en un array asociativo
    }

    public function __destruct(){
        $this->conexion->close();
    }

    function buscarImagen($imagen) {
        $dir = "./imagenes/"; // Ruta al directorio de imágenes
        $extensionDeImagen = ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'webp']; // Posibles extensiones de imagen
        $files = scandir($dir); // Escanea el directorio de imágenes
        $ruta = $dir; // Define la ruta base

        foreach ($extensionDeImagen as $ext) {
            foreach ($files as $archivo) {
                $imagenBuscada = $imagen . '.' . $ext; // Construye el nombre de la imagen con extensión
                if ($imagenBuscada == $archivo) {
                    return $ruta . $imagenBuscada; // Retorna la ruta completa de la imagen si existe
                }
            }
        }
        return null; // Retorna null si no encuentra ninguna imagen
    }

    public function prepare(string $query)
    {
        return $this->conexion->prepare($query);

    }
    function traerTodos(){
        $query = "SELECT       pokemon.id as pokemon_id,pokemon.nro_id_unico, pokemon.imagen,
                       pokemon.nombre,
                       pokemon.descripcion AS pokemon_descripcion,
                       tipo.imagen AS tipo_img, 
                       tipo.descripcion AS tipo_descripcion

          FROM         pokemon
              
          JOIN         tipo ON pokemon.tipo_id = tipo.id";
        return  $this->conexion->query($query);
    }
}
