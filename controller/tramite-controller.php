<?php
    require_once('model/tramite-model.php');
    $objTramite = new TramiteModel();

    if (isset($_POST['tramiteRegistrar']) || isset($_POST['registrarTramite'])) {
        require_once('view/tramiteRegistrar-view.php');
        
        if (isset($_POST['registrarTramite'])) {

            $nombre = $_POST['nombreTramite'];
            $montoBase = $_POST['montoBaseTramite'];
            $descripcion = $_POST['descripcionTramite'];

            $objTramite->set_Nombre($nombre);
            $objTramite->set_MontoBase($montoBase);
            $objTramite->set_Descripcion($descripcion);
            $objTramite->set_Estatus('Activo');

            $response = $objTramite->registrar_tramite_model();
            if ($response) {
                echo '
                    <script>
                        Swal.fire({
                            title: "Trámite Registrado Exitoxamente", 
                            icon: "success"
                        });
                    </script>
                ';
            } else {
                echo '
                    <script>
                        Swal.fire({
                            icon: "error", 
                            title: "Error al registrar el trámite"
                        });
                    </script>
                ';
            }
        }

    } else if (isset($_POST['tramiteConsultar'])) {
        $data = $objTramite->consultar_tramites_model();
        require_once('view/tramiteConsultar-view.php');

    } else {
        $data = $objTramite->consultar_tramites_model();
        require_once('view/tramiteConsultar-view.php');

    }
?>