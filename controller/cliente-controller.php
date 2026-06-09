<?php
    require_once('model/cliente-model.php');
    require_once('model/representante-model.php');
    $objCliente = new ClienteModel();
    $objRepresentante = new RepresentanteModel();

    if (isset($_POST['clienteRegistrar']) || isset($_POST['registrarCliente'])){
        $representantes = $objRepresentante->consultar_representante_model();
        require_once('view/clienteRegistrar-view.php');

        if (isset($_POST['registrarCliente'])) {
            $strTipo = $_POST['tipoCliente'];

            $objCliente->set_Tipo($strTipo);
            $objCliente->set_Correo($_POST['correoCliente']);
            $objCliente->set_Direccion($_POST['direccionCliente']);
            $objCliente->set_Telefono($_POST['telefonoCliente']);
            $objCliente->set_Estatus("Activo");

            if ($strTipo === 'natural') {
                $objCliente->set_Nombre($_POST['nombreCliente']);
                $objCliente->set_Apellido($_POST['apellidoCliente']);
                $objCliente->set_Nacionalidad($_POST['nacionalidadCliente']);
                $objCliente->set_Cedula($_POST['cedulaCliente']);
                $objCliente->set_FechaNacimiento($_POST['fechaNacimientoCliente']);
                $objCliente->set_EstadoCivil($_POST['estadoCivilCliente']);
            } else {
                $objCliente->set_RazonSocial($_POST['razonSocialCliente']);
                $objCliente->set_TipoRif($_POST['tipoRifCliente']);
                $objCliente->set_Rif($_POST['rifCliente']);
                $objCliente->set_FechaConstitucion($_POST['fechaConstitucionCliente']);

                $listaRepresentantes = [];
                if (isset($_POST['repCedula']) && is_array($_POST['repCedula'])) {
                    foreach ($_POST['repCedula'] as $indice => $cedula) {
                        $rol = isset($_POST['repRol'][$indice]) ? $_POST['repRol'][$indice] : '';
                        $listaRepresentantes[] = ['cedula' => $cedula, 'rol' => $rol];
                    }
                }
                $objCliente->set_Representantes($listaRepresentantes);
            }

            $response = $objCliente->registrar_cliente_model();
            if ($response){
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
        $data = $objCliente->consultar_cliente_model();
        require_once('view/clienteConsultar-view.php');

    }
