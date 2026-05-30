<?php
    require_once('model/cliente-model.php');
    $objCliente = new ClienteModel();

    if (isset($_POST['clienteRegistrar']) || isset($_POST['registrar'])) {
        // Cargar la vista de registro de cliente
        require_once('view/clienteRegistrar-view.php');

        // Si se envió el formulario de registro
        if (isset($_POST['registrar'])) {
            // Soporte para mayúsculas/minúsculas de name attributes en el formulario
            $tipoCliente = isset($_POST['tipoCliente']) ? $_POST['tipoCliente'] : (isset($_POST['TipoCliente']) ? $_POST['TipoCliente'] : '');
            $correoCliente = isset($_POST['correoCliente']) ? $_POST['correoCliente'] : (isset($_POST['CorreoCliente']) ? $_POST['CorreoCliente'] : '');
            $telefonoCliente = isset($_POST['telefonoCliente']) ? $_POST['telefonoCliente'] : (isset($_POST['TelefonoCliente']) ? $_POST['TelefonoCliente'] : '');
            $direccionCliente = isset($_POST['direccionCliente']) ? $_POST['direccionCliente'] : (isset($_POST['DireccionCliente']) ? $_POST['DireccionCliente'] : '');

            $objCliente->set_TipoCliente($tipoCliente);
            $objCliente->set_CorreoCliente($correoCliente);
            $objCliente->set_TelefonoCliente($telefonoCliente);
            $objCliente->set_DireccionCliente($direccionCliente);

            $tipoLower = strtolower(trim($tipoCliente));

            if ($tipoLower === 'natural') {
                $nombre = isset($_POST['nombreCliente']) ? $_POST['nombreCliente'] : (isset($_POST['NombreCliente']) ? $_POST['NombreCliente'] : '');
                $apellido = isset($_POST['apellidoCliente']) ? $_POST['apellidoCliente'] : (isset($_POST['ApellidoCliente']) ? $_POST['ApellidoCliente'] : '');
                $nacionalidad = isset($_POST['nacionalidadCliente']) ? $_POST['nacionalidadCliente'] : (isset($_POST['NacionalidadCliente']) ? $_POST['NacionalidadCliente'] : 'V');
                $cedula = isset($_POST['cedulaCliente']) ? $_POST['cedulaCliente'] : (isset($_POST['CedulaCliente']) ? $_POST['CedulaCliente'] : 0);
                $fechaNac = isset($_POST['fechaNacimientoCliente']) ? $_POST['fechaNacimientoCliente'] : (isset($_POST['FechaNacimientoCliente']) ? $_POST['FechaNacimientoCliente'] : '');
                $estadoCivil = isset($_POST['estadoCivilCliente']) ? $_POST['estadoCivilCliente'] : (isset($_POST['EstadoCivilCliente']) ? $_POST['EstadoCivilCliente'] : '');

                $objCliente->set_NombreClienteNatural($nombre);
                $objCliente->set_ApellidoClienteNatural($apellido);
                $objCliente->set_NacionalidadClienteNatural($nacionalidad);
                $objCliente->set_CedulaClienteNatural(intval($cedula));
                $objCliente->set_FechaNacimientoClienteNatural($fechaNac);
                $objCliente->set_EstadoCivilClienteNatural($estadoCivil);

            } else if ($tipoLower === 'juridico') {
                $razonSocial = isset($_POST['razonSocialCliente']) ? $_POST['razonSocialCliente'] : (isset($_POST['RazonSocialCliente']) ? $_POST['RazonSocialCliente'] : '');
                $rif = isset($_POST['rifCliente']) ? $_POST['rifCliente'] : (isset($_POST['RifCliente']) ? $_POST['RifCliente'] : 0);
                $fechaConst = isset($_POST['fechaConstitucionCliente']) ? $_POST['fechaConstitucionCliente'] : (isset($_POST['FechaConstitucionCliente']) ? $_POST['FechaConstitucionCliente'] : '');
                $cedulaRep = isset($_POST['cedulaRepresentanteCliente']) ? $_POST['cedulaRepresentanteCliente'] : (isset($_POST['CedulaRepresentanteCliente']) ? $_POST['CedulaRepresentanteCliente'] : 0);
                $nombreRep = isset($_POST['nombreRepresentanteCliente']) ? $_POST['nombreRepresentanteCliente'] : (isset($_POST['NombreRepresentanteCliente']) ? $_POST['NombreRepresentanteCliente'] : '');
                $apellidoRep = isset($_POST['apellidoRepresentanteCliente']) ? $_POST['apellidoRepresentanteCliente'] : (isset($_POST['ApellidoRepresentanteCliente']) ? $_POST['ApellidoRepresentanteCliente'] : '');

                $objCliente->set_RazonSocialClienteJuridico($razonSocial);
                $objCliente->set_RifClienteJuridico(intval($rif));
                $objCliente->set_FechaConstitucionClienteJuridico($fechaConst);
                $objCliente->set_CedulaRepresentante(intval($cedulaRep));
                $objCliente->set_NombreRepresentante($nombreRep);
                $objCliente->set_ApellidoRepresentante($apellidoRep);
            }

            $response = $objCliente->registrar_cliente_model();

            if ($response) {
                echo '
                    <script>
                        Swal.fire({
                            title: "Cliente Registrado Exitosamente",
                            icon: "success",
                            draggable: true
                        });
                    </script>
                ';
            } else {
                echo '
                    <script>
                        Swal.fire({
                            icon: "error",
                            title: "Error...",
                            text: "No se pudo registrar el Cliente"
                        });
                    </script>
                ';
            }
        }

    } else if (isset($_POST['clienteConsultar'])) {
        $data = $objCliente->consultar_cliente_model();
        require_once('view/clienteConsultar-view.php');
        
    } else {
        echo "Error... Pagina en Construcción";
    }
?>