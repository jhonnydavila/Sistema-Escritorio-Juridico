<?php
require_once __DIR__ . '/../model/usuarioModel.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

class UsuarioController extends Usuario {
    public function __construct() {
        parent::__construct();
    }

    public function create_usuario_controller() {
        $this->set_Nombre(trim($_POST['nombreUsuario'] ?? ''));
        $this->set_Apellido(trim($_POST['apellidoUsuario'] ?? ''));
        $this->set_Cedula(trim($_POST['cedulaUsuario'] ?? ''));
        $this->set_Correo(trim($_POST['correoUsuario'] ?? ''));
        $this->set_PasswordHash(password_hash($_POST['contrasenaUsuario'] ?? '', PASSWORD_DEFAULT));
        $this->set_FechaNacimiento(trim($_POST['fechaNacimientoUsuario'] ?? null));
        $this->set_Direccion(trim($_POST['direccionUsuario'] ?? ''));
        $this->set_RolId(intval($_POST['rolUsuario'] ?? 0));
        $this->set_FrasesSecretaHash(password_hash(trim($_POST['fraseSecretaUsuario'] ?? ''), PASSWORD_DEFAULT));
        $this->set_Estatus('Activo');

        if (empty($this->get_Nombre()) || empty($this->get_Correo()) || empty($_POST['contrasenaUsuario']) || empty($_POST['fraseSecretaUsuario']) || $this->get_RolId() <= 0) {
            echo "<script>alert('Complete todos los campos obligatorios.'); history.back();</script>";
            return;
        }

        $result = $this->create_usuario();
        if ($result === 1) {
            echo "<script>alert('Usuario creado con éxito.'); window.location='../../index.php?pagina=usuarioConsultar';</script>";
        } else {
            echo "<script>alert('Error creando usuario. Verifique los datos e intente de nuevo.'); history.back();</script>";
        }
    }

    public function listar_usuarios_controller() {
        return $this->listar_usuarios();
    }

    public function listar_roles_controller() {
        return $this->listar_roles();
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['registrarUsuario'])) {
    $controller = new UsuarioController();
    $controller->create_usuario_controller();
}
