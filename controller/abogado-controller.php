<?php
    require_once('model/abogado-model.php');
    $objAbogado = new AbogadoModel();
    
    if (isset($_POST['abogadoRegistrar']) || isset($_POST['registrarAbogado'])){
        require_once('view/abogadoRegistrar-view.php');

        if (isset($_POST['registrarAbogado'])) {
            $strNombre = $_POST['nombreAbogado'];
            $strApellido = $_POST['apellidoAbogado'];
            $strCedula = $_POST['cedulaAbogado'];
            $strDireccion = $_POST['direccionAbogado'];
            $strTelefono = $_POST['telefonoAbogado'];
            $strNacionalidad = $_POST['nacionalidadAbogado'];
            $strCorreo = $_POST['correoAbogado'];
            
            $objAbogado->set_Nombre($strNombre);
            $objAbogado->set_Apellido($strApellido);
            $objAbogado->set_Cedula($strCedula);
            $objAbogado->set_Direccion($strDireccion);
            $objAbogado->set_Telefono($strTelefono);
            $objAbogado->set_Nacionalidad($strNacionalidad);
            $objAbogado->set_Correo($strCorreo);
            $objAbogado->set_Estatus("Activo");

            $response = $objAbogado->registrar_abogado_model();
            if ($response){
                echo '
                    <script>
                        Swal.fire({
                            title: "Abogado Registrado Exitosamente",
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
                        text: "No se pudo registrar el Abogado"
                    });
                    </script>
                ';
            }
        }

    }else if (isset($_POST['abogadoConsultar'])) {
        $data = $objAbogado->consultar_abogado_model();
        require_once('view/abogadoConsultar-view.php');

    }else {
        $data = $objAbogado->consultar_abogado_model();
        require_once('view/abogadoConsultar-view.php');

    }