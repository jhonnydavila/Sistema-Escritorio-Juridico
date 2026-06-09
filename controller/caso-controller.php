<?php
    require_once('model/caso-model.php');
    require_once('model/cliente-model.php');
    require_once('model/archivador-model.php');
    require_once('model/expediente-model.php');
    $objCaso = new CasoModel();
    $objCliente = new ClienteModel();
    $objArchivador = new ArchivadorModel();
    $objExpediente = new ExpedienteModel();

    if(isset($_POST['casoRegistrar']) || isset($_POST['registrarCaso'])){
        $clientes = $objCliente->consultar_cliente_model();
        $archivadores = $objArchivador->consultar_archivador_model();
        require_once('view/casoRegistrar-view.php');

        if (isset($_POST['registrarCaso'])) {
            $objCaso->set_CodigoCliente($_POST['clienteCaso']);
            $objCaso->set_Modalidad($_POST['modalidadCaso']);
            $objCaso->set_Descripcion($_POST['descripcionCaso']);
            $objCaso->set_OrigenExpediente($_POST['origenExpediente']);
            $objCaso->set_NumeroExpediente($_POST['numeroExpediente']);
            $objCaso->set_CodigoArchivador($_POST['codigoArchivador']);
            $objCaso->set_Estatus("Activo");

            $response = $objCaso->registrar_caso_model();
            if ($response){
                echo '
                    <script>
                        Swal.fire({
                            title: "Caso Registrado Exitosamente",
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
                            text: "No se pudo registrar el Caso"
                        });
                    </script>
                ';
            }
        }

    } else if (isset($_POST['casoConsultar'])) {
        $data = $objCaso->consultar_caso_model();
        require_once('view/casoConsultar-view.php');

    } else if (isset($_POST['expedienteConsultar'])) {
        $data = $objExpediente->consultar_expediente_model();
        require_once('view/expedienteConsultar-view.php');

    } else {
        $data = $objCaso->consultar_caso_model();
        require_once('view/casoConsultar-view.php');

    }
