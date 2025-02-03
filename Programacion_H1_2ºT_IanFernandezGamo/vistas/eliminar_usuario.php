<?php
require_once '../controlador/usuarioController.php';
$controller = new usuarioController();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_usuario = $_POST['id_usuario'];
    $controller->eliminarUsuario($id_usuario);
    echo "Usuario eliminado con éxito.";
    header("Location: lista_usuarios.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1 class="text-center mb-4">Eliminar Usuario</h1>

        <!-- Formulario -->
        <form method="POST" action="" class="card p-4 shadow-sm">
            <div class="mb-3">
                <label for="id_usuario" class="form-label">ID del Usuario</label>
                <input type="number" name="id_usuario" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-outline-danger w-100">Eliminar</button>
        </form>

        <!-- Volver al listado -->
        <div class="text-center mt-3">
            <a href="lista_usuarios.php" class="btn btn-outline-secondary">Volver al listado</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"></script>
</body>
</html>
