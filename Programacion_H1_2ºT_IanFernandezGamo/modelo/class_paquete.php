<?php
require_once '../config/class_conexion.php';

class Paquete {
    private $conexion;

    public function __construct() {
        $this->conexion = new Conexion();
    }

    public function obtenerPaquetes() {
        $query = "SELECT * FROM paquetes_adicionales";
        $resultado = $this->conexion->conexion->query($query);
        $paquetes = [];
        
        while ($fila = $resultado->fetch_assoc()) {
            $paquetes[] = $fila;
        }
        return $paquetes;
    }

    public function obtenerPaquetesPorDuracion($duracion) {
        // Definir la consulta SQL según la duración de la suscripción
        if ($duracion === 'anual') {
            $query = "SELECT * FROM paquetes_adicionales WHERE precio > 40";  // Suponiendo que los anuales cuestan más de 50
        } else {
            $query = "SELECT * FROM paquetes_adicionales WHERE precio <= 10"; // Los mensuales cuestan menos de 50
        }
    
        $resultado = $this->conexion->conexion->query($query);
        $paquetes = [];
    
        while ($fila = $resultado->fetch_assoc()) {
            $paquetes[] = $fila;
        }
        return $paquetes;
    }
    
}
?>
