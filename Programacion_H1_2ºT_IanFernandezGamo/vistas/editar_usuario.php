<?php
require_once '../controlador/usuarioController.php';
$controller = new usuarioController();
$usuario = null;
if (isset($_GET['id'])) {
    $id_usuario = $_GET['id'];
    $usuario = $controller->obtenerUsuarioPorId($id_usuario);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $controller = new usuarioController();
    $controller->actualizarUsuario(
        $id_usuario,
        $_POST['nombre'],
        $_POST['apellidos'],
        $_POST['edad'],
        $_POST['correo'],
        $_POST['contrasena']
    );
    header("Location: lista_usuarios.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <h1 class="text-center mb-4">Editar Usuario</h1>
        
        <!-- Formulario -->
        <form method="POST" action="" class="card p-4 shadow-sm">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" id="nombre" name="nombre" class="form-control" value="<?php echo $usuario ? $usuario['nombre'] : ''; ?>" required>
            </div>
            <div class="mb-3">
                <label for="apellidos" class="form-label">Apellidos</label>
                <input type="text" id="apellidos" name="apellidos" class="form-control" value="<?php echo $usuario ? $usuario['apellidos'] : ''; ?>" required>
            </div>
            <div class="mb-3">
                <label for="edad" class="form-label">Edad</label>
                <input type="number" id="edad" name="edad" class="form-control" value="<?php echo $usuario ? $usuario['edad'] : ''; ?>" required>
            </div>
            <div class="mb-3">
                <label for="correo" class="form-label">Correo</label>
                <input type="email" id="correo" name="correo" class="form-control" value="<?php echo $usuario ? $usuario['correo'] : ''; ?>" required>
            </div>
            <div class="mb-3">
                <label for="contrasena" class="form-label">Contraseña</label>
                <input type="password" id="contrasena" name="contrasena" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-outline-info w-100">Editar Usuario</button>
        </form>


        <div class="text-center mt-3">
            <a href="lista_usuarios.php" class="btn btn-outline-secondary">Volver al listado</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"></script>
</body>
</html>
