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
            
            $objExpediente->set_CodigoCliente($_POST['clienteCaso']);
            $objExpediente->set_OrigenExpediente($_POST['origenExpediente']);
            $objExpediente->set_NumeroExpediente($_POST['numeroExpediente']);
            $objExpediente->set_CodigoArchivador($_POST['codigoArchivador']);
            
            $codigoExpedienteGenerado = $objExpediente->registrar_expediente_model();

            if ($codigoExpedienteGenerado) {
                
                $objCaso->set_CodigoExpediente($codigoExpedienteGenerado);
                $objCaso->set_Modalidad($_POST['modalidadCaso']);
                $objCaso->set_Descripcion($_POST['descripcionCaso']);
                $objCaso->set_Estatus("sin asignación");

                $responseCaso = $objCaso->registrar_caso_model();
                
                if ($responseCaso){
                    echo '
                        <script>
                            Swal.fire({
                                title: "Caso y Expediente Registrados Exitosamente",
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
                                text: "Se registró el expediente, pero no se pudo registrar el Caso"
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
                            text: "No se pudo registrar el Expediente"
                        });
                    </script>
                ';
            }
        }

    } else if (isset($_POST['casoConsultar'])) {
        $data = $objCaso->consultar_caso_model();
        require_once('view/casoConsultar-view.php');

    } else if (isset($_POST['expedienteConsultar'])) {
        $data = $objExpediente->consultar_expedientes_model();
        require_once('view/expedienteConsultar-view.php');

    } else {
        $data = $objCaso->consultar_caso_model();
        require_once('view/casoConsultar-view.php');
    }
?>