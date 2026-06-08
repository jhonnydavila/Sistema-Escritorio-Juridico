<?php
    require_once('model/caso-model.php');
    require_once('model/archivador-model.php');
    require_once('model/cliente-model.php');
    require_once('model/expediente-model.php');

    $objCaso = new CasoModel();
    $objArchivador = new ArchivadorModel();
    $objCliente = new ClienteModel();
    $objExpediente = new ExpedienteModel();
    
    if(isset($_POST['casoRegistrar']) || isset($_POST['registrarCaso'])){
        require_once('view/casoRegistrar-view.php');
        
        if (isset($_POST['registrarCaso'])) {

            $codigoCliente = $_POST['codigoCliente'];
            $codigoArchivador = $_POST['codigoArchivador'];
            
            $objExpediente->set_CodigoCliente($codigoCliente);
            $objExpediente->set_CodigoArchivador($codigoArchivador);

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