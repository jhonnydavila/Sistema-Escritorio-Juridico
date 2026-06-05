<?php
    require_once('model/honorario-model.php');
    require_once('model/caso-model.php');

    $objHonorario = new HonorarioModel();
    $objCaso = new CasoModel();

    if(isset($_SESSION['cedulaUsuario']) && isset($_SESSION['rolUsuario']) && $_SESSION['rolUsuario'] == 'secrertaria') {
        require_once('view/403.php');

    }else if (isset($_POST['honorarioRegistrar']) || isset($_POST['registrarHonorario'])) {
        $dataCaso = $objCaso->consultar_caso_model();
        require_once('view/honorarioRegistrar-view.php');
        
        if (isset($_POST['registrarHonorario'])) {

            $caso = $_POST['codigoCaso'];
            $montoInicial = $_POST['montoInicialHonorario'];
            $estatus = $_POST['estatusHonorario'];

            $objHonorario->set_CodigoCaso($caso);
            $objHonorario->set_Monto($montoInicial);
            $objHonorario->set_Estatus($estatus);

            $response = $objHonorario->registrar_honorario_model();
            if ($response) {
                echo '
                    <script>
                        Swal.fire({
                            title: "Acuerdo de Honorarios Registrado", 
                            icon: "success"
                        });
                    </script>
                ';
            } else {
                echo '
                    <script>
                        Swal.fire({
                            icon: "error", 
                            title: "Error al registrar el acuerdo de Honorarios"
                        });
                    </script>
                ';
            }
        }
    } else if (isset($_POST['honorarioConsultar'])) {
        $data = $objHonorario->consultar_honorarios_model();
        require_once('view/honorarioConsultar-view.php');
        
    } else {
        $data = $objHonorario->consultar_honorarios_model();
        require_once('view/honorarioConsultar-view.php');

    }
?>