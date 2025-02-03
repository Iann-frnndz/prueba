<?php
require_once '../modelo/class_usuario.php';
require_once '../modelo/class_paquete.php';

$id_usuario = $_GET['id_usuario']; // Obtener el id del usuario desde el URL
$usuario = new Usuario();
$usuario_info = $usuario->obtenerUsuarioPorId($id_usuario);
$plan_info = $usuario->obtenerPlanPorId($id_plan); // Obtener detalles del plan

$duracion_suscripcion = $id_usuario['duracion_suscripcion'] ?? 'mensual';
$id_plan = $plan_info['id_plan'] ?? null;
var_dump($id_plan);
die;
if ($id_plan === null) {
    die("Error: No se encontró información del plan. Asegúrate de que el usuario tiene un plan asociado.");
}


// Cargar los paquetes disponibles
$paquete = new Paquete();
$paquetes = $paquete->obtenerPaquetesPorDuracion($duracion_suscripcion);

// Verificar restricciones
$paquetes_disponibles = [];

if ($edad_usuario < 18) {
    // Solo se puede seleccionar el paquete Infantil
    $paquetes_disponibles[] = 'Infantil';
} else {
    // Si es mayor de 18, mostrar restricciones según el plan
    if ($plan_info['tipo_de_plan'] == 'Plan Básico') {
        // Solo un paquete puede ser seleccionado
        $paquetes_disponibles[] = 'Deporte'; // Deporte o Cine
    } else {
        // Mostrar todos los paquetes dependiendo de la suscripción (mensual o anual)
        foreach ($paquetes as $paquete) {
            if ($plan_info['duracion_suscripcion'] == 'Anual' || $paquete['nombre'] != 'Deporte') {
                $paquetes_disponibles[] = $paquete['nombre'];
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Seleccionar Paquete</title>
</head>

<body>
    <h2>Seleccione un paquete</h2>
    <form action="procesar_paquete.php" method="POST">
        <input type="hidden" name="id_usuario" value="<?php echo $id_usuario; ?>">

        <label for="paquete">Seleccione su paquete:</label>
        <select name="paquete" id="paquete">
            <?php foreach ($paquetes_disponibles as $paquete): ?>
                <option value="<?php echo $paquete; ?>"><?php echo $paquete; ?></option>
            <?php endforeach; ?>
        </select>

        <button type="submit">Confirmar</button>
    </form>
</body>

</html>