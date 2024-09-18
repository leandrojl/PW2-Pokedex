<?php

class PokemonManager {
    private $db;  // Variable donde almaceno la conexion a la BDD

    public function __construct($db) {
        $this->db = $db;
    }




    public function obtenerPokemonPorId($id) {
        $sqlQuery = "SELECT p.id, p.nro_id_unico, p.nombre, p.imagen, p.descripcion, p.tipo_id, t.descripcion AS tipo 
                     FROM pokemon p 
                     JOIN tipo t ON p.tipo_id = t.id 
                     WHERE p.id = ?";

        // Preparo la consulta
        $stmt = $this->db->conexion->prepare($sqlQuery);
        // Lo protejo de inyecciones SQL, el bind_param vincula variables a los parametros de la consulta
        $stmt->bind_param('i', $id);
        // Ejecuto la consulta
        $stmt->execute();
        // Obtengo el resultado como un array asociativo (cada elemento está asociado a una clave)
        $resultado = $stmt->get_result()->fetch_assoc();
        // Cierro el statment para liberar recursos
        $stmt->close();
        // Retorno el resultado
        return $resultado;
    }


    public function agregarPokemon($nombre, $tipo_id, $imagen) {

        $sqlQuery = "INSERT INTO pokemon (nombre, tipo_id, imagen) VALUES (?, ?, ?)";

        $stmt = $this->db->conexion->prepare($sqlQuery);
        // En este caso sis es string, int, string
        $stmt->bind_param('sis', $nombre, $tipo_id, $imagen);
        $stmt->execute();
        $stmt->close();
    }


    public function obtenerTipos() {
        $sqlQuery = "SELECT id, descripcion FROM tipo";
        $resultadoObtenido = $this->db->conexion->query($sqlQuery);
        // Recupero todas las filas de datos, y MYSQLI_ASSOC me devuelve los datos como un array asociativo
        return $resultadoObtenido ->fetch_all(MYSQLI_ASSOC);
    }


    public function modificarPokemon($id, $nombre, $tipo_id, $descripcion, $imagen) {

        $sqlTipoCheck = "SELECT COUNT(*) FROM tipo WHERE id = ?";
        $stmtTipoCheck = $this->db->conexion->prepare($sqlTipoCheck);
        $stmtTipoCheck->bind_param('i', $tipo_id);
        $stmtTipoCheck->execute();
        $resultado = $stmtTipoCheck->get_result()->fetch_row()[0];
        $stmtTipoCheck->close();

        // Si el tipo no existe, tira error
        if ($resultado == 0) {
            echo "Tipo de Pokémon no válido";
        }

        // Query para actualizar datos
        $sqlQuery = "UPDATE pokemon SET nombre = ?, tipo_id = ?, descripcion = ?, imagen = ? WHERE id = ?";


        $stmt = $this->db->conexion->prepare($sqlQuery);
        $stmt->bind_param('sissi', $nombre, $tipo_id, $descripcion, $imagen, $id);

        // Ejecutar la consulta y tira error si no lo hace
        if (!$stmt->execute()) {
            echo "Error al actualizar el Pokémon: " . $stmt->error;
        }

        $stmt->close();
    }


    public function eliminarPokemon($id) {
        $sqlQuery = "DELETE FROM pokemon WHERE id = ?";
        $stmt = $this->db->conexion->prepare($sqlQuery);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $stmt->close();
    }
}
?>
