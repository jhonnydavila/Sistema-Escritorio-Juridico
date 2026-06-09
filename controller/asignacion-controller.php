<?php
    require_once('model/asignacion-model.php');
    require_once('model/abogado-model.php');
    require_once('model/caso-model.php');
    $objAsignacion = new AsignacionModel();
    $objAbogado = new AbogadoModel();
    $objCaso = new CasoModel();

    if (isset($_POST['asignacionRegistrar']) || isset($_POST['registrarAsignacion'])) {
        $dataAbogados = $objAbogado->consultar_abogado_model();
        $dataCasos = $objCaso->consultar_caso_model();
        require_once('view/asignacionRegistrar-view.php');

        if (isset($_POST['registrarAsignacion'])) {
            $objAsignacion->set_CedulaAbogado($_POST['cedulaAbogado']);
            $objAsignacion->set_CodigoCaso($_POST['codigoCaso']);
            $objAsignacion->set_Estatus("Activa");

            $response = $objAsignacion->registrar_asignacion_model();
            if ($response){
                echo '
                    <script>
                        Swal.fire({
                            title: "Asignación Registrada Exitosamente",
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
                            text: "No se pudo registrar la Asignación. Es posible que el abogado ya esté asignado a ese caso."
                        });
                    </script>
                ';
            }
        }

    } else if (isset($_POST['asignacionConsultar'])) {
        $data = $objAsignacion->consultar_asignacion_model();
        require_once('view/asignacionConsultar-view.php');

    } else if (isset($_POST['asignacionVer'])) {
        require_once('view/asignacionVer-view.php');

    } else if (isset($_POST['asignacionTablero'])) {
        require_once('view/asignacionTablero-view.php');

    } else {
        $data = $objAsignacion->consultar_asignacion_model();
        require_once('view/asignacionConsultar-view.php');

    }
