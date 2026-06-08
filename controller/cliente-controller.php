<?php
    require_once('model/cliente-model.php');
    require_once('model/clienteNatural-model.php');
    require_once('model/clienteJuridico-model.php');    
    require_once('model/representante-model.php');
    
    $objRepresentante = new Representante();
    $objCliente = new ClienteModel();
    $objClienteNatural = new ClienteNaturalModel();
    $objClienteJuridico = new ClienteJuridicoModel();

    if (isset($_POST['clienteRegistrar']) || isset($_POST['registrarCliente'])) {

        $dataRepresentantes = $objRepresentante->consultar_representantes_model();
        require_once('view/clienteRegistrar-view.php');

        if (isset($_POST['registrarCliente'])) {
            
            $tipo = $_POST['tipoCliente'];
            $correo = $_POST['correoCliente'];
            $telefono = $_POST['telefonoCliente'];
            $direccion = $_POST['direccionCliente'];

            $objCliente->set_Tipo($tipo);
            $objCliente->set_Correo($correo);
            $objCliente->set_Telefono($telefono);
            $objCliente->set_Direccion($direccion);
            $objCliente->set_Estatus('Activo'); 
            $objCliente->set_FechaRegistro(date('Y-m-d'));

            $responseGeneral = $objCliente->registrar_cliente_model();

            if ($responseGeneral) {

                $codigoGenerado = $objCliente->get_Codigo();
                $registroEspecificoExitoso = false;

                if ($tipo === 'natural') {
                    $objClienteNatural->set_CodigoCliente($codigoGenerado);
                    $objClienteNatural->set_Nombre($_POST['nombreCliente']);
                    $objClienteNatural->set_Apellido($_POST['apellidoCliente']);
                    $objClienteNatural->set_Nacionalidad($_POST['nacionalidadCliente']);
                    $objClienteNatural->set_Cedula($_POST['cedulaCliente']);
                    $objClienteNatural->set_FechaNacimiento($_POST['fechaNacimientoCliente']);
                    $objClienteNatural->set_EstadoCivil($_POST['estadoCivilCliente']);

                    $registroEspecificoExitoso = $objClienteNatural->registrar_cliente_natural_model();

                } else if ($tipo === 'juridico') {
                    $objClienteJuridico->set_CodigoCliente($codigoGenerado);
                    $objClienteJuridico->set_RazonSocial($_POST['razonSocialCliente']);
                    $objClienteJuridico->set_Rif($_POST['rifCliente']);
                    $objClienteJuridico->set_TipoRif($_POST['tipoRifCliente']);
                    $objClienteJuridico->set_FechaConstitucion($_POST['fechaConstitucionCliente']);
                    
                    $objClienteJuridico->set_CedulaRepresentante($_POST['cedulaRepresentante']);
                    $objClienteJuridico->set_RolRepresentante($_POST['rolRepresentante']); 
                    $registroEspecificoExitoso = $objClienteJuridico->registrar_cliente_juridico_model();
                }

                if ($registroEspecificoExitoso) {
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
                                text: "Hubo un problema registrando los detalles del cliente."
                            });
                        </script>
                    ';
                }
            } else {
                echo '
                    <script>
                        Swal.fire({
                            icon: "error",
                            title: "Error...",
                            text: "No se pudo registrar el Cliente General"
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
?>