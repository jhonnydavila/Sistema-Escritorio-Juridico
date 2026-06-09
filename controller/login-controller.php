<?php
    require_once('model/usuario-model.php');

    $objUsuario = new UsuarioModel();

    if(isset($_POST['cedulaUsuario']) && isset($_POST['claveUsuario'])) {
        $cedula = $_POST['cedulaUsuario'];
        $clave = $_POST['claveUsuario'];
        
        $usuario = $objUsuario->buscar_usuario_model($cedula);

        if($usuario){
            if(password_verify($clave, $usuario['claveUsuario']) || $usuario['claveUsuario'] === $clave){
                if (session_status() === PHP_SESSION_NONE) {
                    session_start(['name' => 'sesion_usuario']);
                }

                $_SESSION['nombreUsuario'] = $usuario['nombreUsuario'];
                $_SESSION['apellidoUsuario'] = $usuario['apellidoUsuario'];
                $_SESSION['cedulaUsuario'] = $usuario['cedulaUsuario'];
                $_SESSION['rolUsuario'] = $usuario['rolUsuario'];

                header('Location: home');
                exit();
            } else {
                echo '
                    <script>
                        Swal.fire({
                            title: "Ocurrió un error inesperado",
                            text: "La Contraseña ingresada es incorrecta.",
                            icon: "error",
                            confirmButtonText: "Aceptar"
                        });
                    </script>
                ';
            }
        } else {
            echo '
                <script>
                    Swal.fire({
                        title: "Ocurrió un error inesperado",
                        text: "El usuario no existe en el sistema.",
                        icon: "error",
                        confirmButtonText: "Aceptar"
                    });
                </script>
            ';
        }
    }
    require_once('view/login.php');
?>