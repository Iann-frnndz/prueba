<?php
require_once '../config/class_conexion.php';

class Usuario {
    private $conexion;

    public function __construct() {
        $this->conexion = new Conexion();
    }

    public function agregarUsuario($nombre, $apellidos, $edad, $correo, $contrasena, $id_plan) {
        // Insertar el usuario en la tabla usuarios sin el id_plan
        $query = "INSERT INTO usuarios (nombre, apellidos, edad, correo, contrasena) VALUES (?, ?, ?, ?, ?)";
        $sentencia = $this->conexion->conexion->prepare($query);
        $sentencia->bind_param("ssiss", $nombre, $apellidos, $edad, $correo, $contrasena);

        if ($sentencia->execute()) {
            echo "Usuario agregado con éxito.";
            // Ahora que el usuario ha sido agregado, obtenemos el id del usuario
            $id_usuario = $this->conexion->conexion->insert_id;  // Obtener el último ID insertado

            // Asociar el usuario con el plan correspondiente
            $this->asociarUsuarioConPlan($id_usuario, $id_plan);  // Llamamos al método para asociar el plan
        } else {
            echo "Error al agregar usuario: " . $sentencia->error;
        }

        $sentencia->close();
    }

    // Método para asociar el usuario con el plan
    public function asociarUsuarioConPlan($id_usuario, $id_plan) {
        $query = "INSERT INTO completo (id_usuario, id_plan) VALUES (?, ?)";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("ii", $id_usuario, $id_plan);

        if ($stmt->execute()) {
            echo "Usuario asociado con el plan exitosamente.";
        } else {
            echo "Error al asociar usuario con el plan: " . $stmt->error;
        }

        $stmt->close();
    }

    public function obtenerUsuario() {
        $query = "SELECT * FROM usuarios";
        $resultado = $this->conexion->conexion->query($query);
        $usuarios = [];
        while ($fila = $resultado->fetch_assoc()) {
            $usuarios[] = $fila;
        }
        return $usuarios;
    }

    public function obtenerUsuarioPorId($id_usuario) {
        $query = "SELECT * FROM usuarios WHERE id_usuario = ?";
        $sentencia = $this->conexion->conexion->prepare($query);
        $sentencia->bind_param("i", $id_usuario);
        $sentencia->execute();
        $resultado = $sentencia->get_result();
        return $resultado->fetch_assoc();
    }

    public function actualizarUsuario($id_usuario, $nombre, $apellidos, $edad, $correo, $contrasena) {
        $query = "UPDATE usuarios SET nombre = ?, apellidos = ?, edad = ?, correo = ?, contrasena = ? WHERE id_usuario = ?";
        $sentencia = $this->conexion->conexion->prepare($query);
        $sentencia->bind_param("ssissi", $nombre, $apellidos, $edad, $correo, $contrasena, $id_usuario);

        if ($sentencia->execute()) {
            echo "Usuario actualizado con éxito.";
        } else {
            echo "Error al actualizar usuario: " . $sentencia->error;
        }

        $sentencia->close();
    }

    public function eliminarUsuario($id_usuario) {
        $query = "DELETE FROM usuarios WHERE id_usuario = ?";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("i", $id_usuario);

        if ($stmt->execute()) {
            echo "Usuario eliminado con éxito.";
        } else {
            echo "Error al eliminar usuario: " . $stmt->error;
        }

        $stmt->close();
    }

    public function obtenerUltimoId() {
        return $this->conexion->conexion->insert_id;
    }

    public function obtenerPlanPorId($id_plan) {
        $query = "SELECT * FROM planes WHERE id_plan = ?";
        $sentencia = $this->conexion->conexion->prepare($query);
        $sentencia->bind_param("i", $id_plan);
        $sentencia->execute();
        $resultado = $sentencia->get_result();
        
        return $resultado->fetch_assoc();
    }
    
    
}
?>


