<?php
require_once '../modelo/class_usuario.php';

class usuarioController {
    private $usuario;

    public function __construct() {
        $this->usuario = new Usuario();
    }

    public function agregarUsuario($nombre, $apellidos, $edad, $correo, $contrasena, $id_plan) {
        // Agregar el usuario
        $this->usuario->agregarUsuario($nombre, $apellidos, $edad, $correo, $contrasena, $id_plan);

        // Obtener el id_usuario del último registro insertado
        $id_usuario = $this->usuario->obtenerUltimoId(); // Asegúrate de tener este método en tu clase Usuario

        // Redirigir a la página de selección de paquete, pasando el id_usuario como parámetro
        header("Location: ../vistas/seleccionar_paquete.php?id_usuario=" . $id_usuario);
        exit();
    }

    public function listarUsuario() {
        return $this->usuario->obtenerUsuario();
    }

    public function obtenerUsuarioPorId($id_usuario) {
        return $this->usuario->obtenerUsuarioPorId($id_usuario);
    }

    public function actualizarUsuario($id_usuario, $nombre, $apellidos, $edad, $correo, $contrasena) {
        $this->usuario->actualizarUsuario($id_usuario, $nombre, $apellidos, $edad, $correo, $contrasena);
    }

    public function eliminarUsuario($id_usuario) {
        $this->usuario->eliminarUsuario($id_usuario);
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? null; 

    $controller = new usuarioController();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $action = $_POST['action'] ?? null;
    
        $controller = new usuarioController();
    
        switch ($action) {
            case 'agregarUsuario':
                // Recoge los datos en tipo post
                $nombre = $_POST['nombre'];
                $apellidos = $_POST['apellidos'];
                $edad = $_POST['edad'];
                $correo = $_POST['correo'];
                $contrasena = $_POST['contrasena'];
                $id_plan = $_POST['id_plan'];  // Capturamos el id_plan desde el formulario
    
                // Llama al controlador
                $controller->agregarUsuario($nombre, $apellidos, $edad, $correo, $contrasena, $id_plan);  // Ahora pasamos 6 parámetros
    
                // Después de agregar, ya no es necesario redirigir aquí
                // header("Location: ../vistas/lista_usuarios.php");
                // exit();
                break;
        }
    }
}
?>

