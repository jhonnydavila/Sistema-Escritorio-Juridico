<?php
require_once __DIR__ . '/../model/usuarioModel.php';
require_once __DIR__ . '/../lib/Session.php';
Session::start();

class AuthController {
    private $usuarioModel;

    public function __construct() {
        $this->usuarioModel = new Usuario();
    }

    private function redirect($pagina, $mensaje = '') {
        if (!empty($mensaje)) {
                Session::flash('flash_message', $mensaje);
        }
        // Ensure session data is written before redirecting
            Session::writeClose();
        require_once __DIR__ . '/../lib/App.php';
        App::redirect($pagina);
    }

    public function login() {
        $login = trim($_POST['login'] ?? '');
        $password = $_POST['password'] ?? '';

        error_log('AuthController: login attempt for ' . $login);

        if (empty($login) || empty($password)) {
            $this->redirect('login', 'Ingrese correo, cédula o contraseña válidos.');
        }

        $user = $this->usuarioModel->obtener_por_login($login);
        error_log('AuthController: user lookup result: ' . json_encode($user));
        if (empty($user) || !password_verify($password, $user['passwordHash'])) {
            error_log('AuthController: credential check failed for ' . $login);
            $this->redirect('login', 'Credenciales incorrectas.');
        }

        if ($user['estatusUsuario'] !== 'Activo') {
            $this->redirect('login', 'Usuario inactivo o suspendido.');
        }

            Session::regenerate();
            $userData = [
                'id' => $user['idUsuario'],
                'nombre' => $user['nombreUsuario'],
                'apellido' => $user['apellidoUsuario'],
                'correo' => $user['correoUsuario'],
                'cedula' => $user['cedulaUsuario'],
                'role' => $user['nombreRol'],
                'roleId' => $user['idRol'],
                'permissions' => json_decode($user['permisosRol'] ?? '[]', true),
            ];
            Session::set('user', $userData);
+        // persist a copy in session storage to help restoration across requests
+        require_once __DIR__ . '/../lib/SessionStorage.php';
+        SessionStorage::write(Session::id(), ['user' => $userData]);

        error_log('AuthController: user logged in, id=' . $user['idUsuario']);
            error_log('AuthController: session_id before redirect=' . Session::id());
            error_log('AuthController: session_cookie_params=' . json_encode(Session::cookieParams()));

        $this->redirect('home');
    }

    public function recoverPassword() {
        $login = trim($_POST['login'] ?? '');
        $fraseSecreta = trim($_POST['fraseSecreta'] ?? '');
        $newPassword = $_POST['newPassword'] ?? '';
        $confirmPassword = $_POST['confirmPassword'] ?? '';

        if (empty($login) || empty($fraseSecreta) || empty($newPassword) || empty($confirmPassword)) {
            $this->redirect('recuperarContrasena', 'Complete todos los campos para recuperar la contraseña.');
        }

        if ($newPassword !== $confirmPassword) {
            $this->redirect('recuperarContrasena', 'Las contraseñas no coinciden.');
        }

        $user = $this->usuarioModel->obtener_por_login_y_frase($login, $fraseSecreta);
        if (empty($user)) {
            $this->redirect('recuperarContrasena', 'Usuario o frase secreta incorrectos.');
        }

        $passwordHash = password_hash($newPassword, PASSWORD_DEFAULT);
        $result = $this->usuarioModel->actualizar_password($user['idUsuario'], $passwordHash);
        if ($result === 1) {
            $this->redirect('login', 'Contraseña actualizada. Inicie sesión con su nueva contraseña.');
        }

        $this->redirect('recuperarContrasena', 'No fue posible actualizar la contraseña. Intente de nuevo.');
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $authController = new AuthController();
    if (isset($_POST['loginAction'])) {
        $authController->login();
    } elseif (isset($_POST['recoverPassword'])) {
        $authController->recoverPassword();
    }
}
