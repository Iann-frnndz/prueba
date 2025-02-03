<?php
require_once '../modelo/class_completo.php';

$id_usuario = $_POST['id_usuario'];
$paquete_seleccionado = $_POST['paquete'];

// Obtener id del paquete basado en el nombre
$completo = new Completo();
$id_paquete = $completo->obtenerIdPaquetePorNombre($paquete_seleccionado);

// Asociar el paquete al usuario
$completo->asociarUsuarioConPaquete($id_usuario, $id_paquete);

header("Location: ../vistas/confirmacion.php"); // Redirigir a una página de confirmación
exit();
?>
