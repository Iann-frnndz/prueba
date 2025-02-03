<?php
require_once '../controlador/usuarioController.php';
$controller = new usuarioController();
$usuarios = $controller->listarUsuario();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Listado de Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <div class="ms-3 mt-3">
        <a class="text-dark text-decoration-none" href="../index.php">
            <i class="bi bi-arrow-left"></i> Volver
        </a>
    </div>

    <div class="container">
        <h1 class="text-center mb-4">Usuarios Registrados</h1>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Edad</th>
                        <th>Correo</th>
                        <th>Contraseña</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($usuarios as $usuario): ?>
                        <tr>
                            <td><?= $usuario['id_usuario'] ?></td>
                            <td><?= $usuario['nombre'] ?></td>
                            <td><?= $usuario['apellidos'] ?></td>
                            <td><?= $usuario['edad'] ?></td>
                            <td><?= $usuario['correo'] ?></td>
                            <td><?= $usuario['contrasena'] ?></td>
                            <td>
                                
                                <a href="editar_usuario.php?id=<?= $usuario['id_usuario'] ?>" class="btn btn-outline-warning btn-sm">Editar</a>
                                
                                
                                <a href="eliminar_usuario.php?id=<?= $usuario['id_usuario'] ?>" class="btn btn-outline-danger btn-sm">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        

        <div>
            <a href="alta_usuarios.php" class="btn btn-info btn-sm">Agregar un nuevo usuario</a>
        </div>
    </div>

</body>

</html>
