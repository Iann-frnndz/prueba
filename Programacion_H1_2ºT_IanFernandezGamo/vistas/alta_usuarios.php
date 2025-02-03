<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <title>Registro</title>
</head>

<body>
    <div class="container text-center mt-5">
        <h1>Registrar un Usuario</h1>
    </div>

    <div class="ms-3 mt-3">
        <a class="icon-link icon-link-hover text-dark text-decoration-none" href="../index.php">
            <i class="bi bi-arrow-left"></i> 
        </a>
    </div>

    <div class="container">
        <form method="POST" action="../controlador/usuarioController.php" style="padding-top: 20px;">
            <input type="hidden" name="action" value="agregarUsuario">

            <div class="input-group mb-3">
                <span class="input-group-text">Nombre</span>
                <input type="text" class="form-control" name="nombre" placeholder="Nombre" required>
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text">Apellidos</span>
                <input type="text" class="form-control" name="apellidos" placeholder="Apellidos" required>
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text">Edad</span>
                <input type="number" class="form-control" name="edad" placeholder="Edad" required>
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text">Correo</span>
                <input type="email" class="form-control" name="correo" placeholder="correo" required>
            </div>

            <label for="inputPassword5" class="form-label">Contraseña</label>
            <input type="password" id="inputPassword5" class="form-control" name="contrasena" placeholder="Contraseña" required>
            <div id="passwordHelpBlock" class="form-text">
                La contraseña debe contener de 8 a 20 caracteres, incluyendo letras y números.
            </div>

            <!-- Nuevo campo para seleccionar el tipo de plan -->
            <div class="input-group mb-3">
                <span class="input-group-text">Tipo de Plan</span>
                <select class="form-select" name="id_plan" required>
                    <option value="">Selecciona un plan</option>
                    <option value="1">Plan Básico Mensual</option>
                    <option value="2">Plan Estándar Mensual</option>
                    <option value="3">Plan Premium Mensual</option>
                    <option value="4">Plan Básico Anual</option>
                    <option value="5">Plan Estándar Anual</option>
                    <option value="6">Plan Premium Anual</option>
                </select>
            </div>

            <div class="d-grid gap-2 mt-3">
                <button type="submit" class="btn btn-info">Registrar Usuario</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>

</html>

