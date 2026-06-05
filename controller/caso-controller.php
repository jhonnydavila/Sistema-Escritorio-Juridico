<?php
    require_once('model/caso-model.php');
    $objCaso = new CasoModel();
    
    if(isset($_POST['casoRegistrar']) || isset($_POST['registrarCaso'])){
        require_once('view/casoRegistrar-view.php');
        
        if (isset($_POST['registrarCaso'])) {
            $strNombre = $_POST['nombreAbogado'];
            $strApellido = $_POST['apellidoAbogado'];
            $strCedula = $_POST['cedulaAbogado'];
            $strDireccion = $_POST['direccionAbogado'];
            $strTelefono = $_POST['telefonoAbogado'];
            $strNacionalidad = $_POST['nacionalidadAbogado'];
            $strCorreo = $_POST['correoAbogado'];
            
            $objCaso->set_Nombre($strNombre);
            $objCaso->set_Apellido($strApellido);
            $objCaso->set_Cedula($strCedula);
            $objCaso->set_Direccion($strDireccion);
            $objCaso->set_Telefono($strTelefono);
            $objCaso->set_Nacionalidad($strNacionalidad);
            $objCaso->set_Correo($strCorreo);
            $objCaso->set_Estatus("Activo");

            $response = $objCaso->registrar_caso_model();
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

    }else if (isset($_POST['casoConsultar'])) {
        $data = $objCaso->consultar_caso_model();
        require_once('view/casoConsultar-view.php');

    }else {
        $data = $objCaso->consultar_caso_model();
        require_once('view/casoConsultar-view.php');
        
    }