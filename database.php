<?php

/*$database = new Database(); ----------------------PRUEBA DE QUE FUNCIONA

$resultado = $database->query("SELECT * FROM pokemon");

foreach ($resultado as $pokemon) {
    echo "id: " . $pokemon["id"] . ", nombre: " . $pokemon["nombre"] .  "<br>";
}*/



class Database{
    public $conexion;
    public function __construct(){
            $this->conexion = new mysqli("localhost","root","","pokedex");
        }



    public function query($query){
        return $this->conexion->query($query)->fetch_all(MYSQLI_ASSOC);

    }

    public function __destruct(){
        $this->conexion->close();
    }
}