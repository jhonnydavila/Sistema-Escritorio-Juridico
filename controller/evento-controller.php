<?php
    require_once('model/evento-model.php');
    $objEvento = new EventoModel();
    
    if(isset($_POST['eventoRegistrar']) || isset($_POST['registrar'])){
        require_once('view/eventoRegistrar-view.php');
        if (isset($_POST['registrar'])) {
            $strNombre = $_POST['nombreAbogado'];
            $strApellido = $_POST['apellidoAbogado'];
            $strCedula = $_POST['cedulaAbogado'];
            $strDireccion = $_POST['direccionAbogado'];
            $strTelefono = $_POST['telefonoAbogado'];
            $strNacionalidad = $_POST['nacionalidadAbogado'];
            $strCorreo = $_POST['correoAbogado'];
            
            $objEvento->set_Nombre($strNombre);
            $objEvento->set_Apellido($strApellido);
            $objEvento->set_Cedula($strCedula);
            $objEvento->set_Direccion($strDireccion);
            $objEvento->set_Telefono($strTelefono);
            $objEvento->set_Nacionalidad($strNacionalidad);
            $objEvento->set_Correo($strCorreo);
            $objEvento->set_Estatus("Activo");

            $response = $objEvento->registrar_evento_model();
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

    }else if (isset($_POST['eventoConsultar'])) {
        $data = $objEvento->consultar_evento_model();
        require_once('view/eventoConsultar-view.php');

    }else if(isset($_POST['eventoCalendario'])){
        require_once('view/eventoCalendario-view.php');

    }else{
        echo "Error... Pagina en Construcción";
    }