<?php

/*$database = new Database(); ----------------------PRUEBA DE QUE FUNCIONA

$resultado = $database->query("SELECT * FROM pokemon");

foreach ($resultado as $pokemon) {
    echo "id: " . $pokemon["id"] . ", nombre: " . $pokemon["nombre"] .  "<br>";
}*/



class Database{
    private $conexion;
    public function __construct(){
            $this->conexion = new mysqli("localhost","root","","pokedex");
        }

    public function query($query){
        return $this->conexion->query($query)->fetch_all(MYSQLI_ASSOC); //me devuelve la consulta en un array asociativo
    }

    public function __destruct(){
        $this->conexion->close();
    }
    public function devolverListadoCompleto(){
        $query = "SELECT       pokemon.nro_id_unico, 
                       pokemon.nombre,
                       pokemon.descripcion AS pokemon_descripcion,
                       tipo.imagen AS tipo_img, 
                       tipo.descripcion AS tipo_descripcion

              FROM         pokemon
                  
              JOIN         tipo ON pokemon.tipo_id = tipo.id;
    ";
        return $this->query($query);
    }

    public function prepare($query){
        return $this->conexion->prepare($query);

    }
}