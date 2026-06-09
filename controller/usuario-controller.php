<?php
    require_once('model/usuario-model.php');
    $objUsuario = new UsuarioModel();
    if(isset($_SESSION['cedulaUsuario']) && isset($_SESSION['rolUsuario']) && $_SESSION['rolUsuario'] !== 'administrador'){
        require_once('view/403.php');

    }else if(isset($_POST['usuarioRegistrar']) || isset($_POST['registrarUsuario'])){
        require_once('view/usuarioRegistrar-view.php');
        if (isset($_POST['registrarUsuario'])) {
            $strNombre = $_POST['nombreUsuario'];
            $strApellido = $_POST['apellidoUsuario'];
            $strCedula = $_POST['cedulaUsuario'];
            $strRol = $_POST['rolUsuario'];
            $strClave1 = $_POST['clave1Usuario'];
            $strClave2 = $_POST['clave2Usuario'];
            $strFechaRegistro = date('Y-m-d');

            if ($strClave1 !== $strClave2) {
                echo '
                    <script>
                        Swal.fire({
                        icon: "error",
                        title: "Error...",
                        text: "Las Contraseñas Ingresadas no Coinciden"
                    });
                    </script>
                ';
                exit();
            }else{
                $strClave = $strClave1;
            }

            $objUsuario->set_Nombre($strNombre);
            $objUsuario->set_Apellido($strApellido);
            $objUsuario->set_Cedula($strCedula);
            $objUsuario->set_Rol($strRol);
            $objUsuario->set_Clave(password_hash($strClave, PASSWORD_DEFAULT));
            $objUsuario->set_Estatus('Activo');
            $objUsuario->set_FechaRegistro($strFechaRegistro);
            
            $response = $objUsuario->registrar_usuario_model();
            if ($response){
                echo '
                    <script>
                        Swal.fire({
                            title: "Usuario Registrado Exitosamente",
                            icon: "success",
                            draggable: true
                        });
                    </script>
                ';
            }else {
                echo '
                    <script>
                        Swal.fire({
                        icon: "error",
                        title: "Error...",
                        text: "No se pudo registrar el Usuario"
                    });
                    </script>
                ';
            }
        }

    }else if (isset($_POST['usuarioConsultar'])) {
        $data = $objUsuario->consultar_usuario_model();
        require_once('view/usuarioConsultar-view.php');

    }else{
        $data = $objUsuario->consultar_usuario_model();
        require_once('view/usuarioConsultar-view.php');
    }