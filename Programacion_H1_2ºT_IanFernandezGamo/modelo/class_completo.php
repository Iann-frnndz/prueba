<?php
require_once '../config/class_conexion.php';


class Completo {


    private $conexion;

    public function __construct() {
        $this->conexion = new Conexion();
    }

    
    // Obtener el ID del paquete basado en el nombre
    public function obtenerIdPaquetePorNombre($nombre_paquete) {
        $query = "SELECT id_paquete FROM paquetes_adicionales WHERE nombre_paquete = ?";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("s", $nombre_paquete);
        $stmt->execute();
        $resultado = $stmt->get_result();
        $fila = $resultado->fetch_assoc();
        return $fila['id_paquete'];
    }

    // Asociar un usuario con un paquete
    public function asociarUsuarioConPaquete($id_usuario, $id_paquete) {
        $query = "INSERT INTO completo (id_usuario, id_paquete) VALUES (?, ?)";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("ii", $id_usuario, $id_paquete);
        if ($stmt->execute()) {
            echo "Paquete asociado con éxito.";
        } else {
            echo "Error al asociar el paquete: " . $stmt->error;
        }
        $stmt->close();
    }
}

?>
