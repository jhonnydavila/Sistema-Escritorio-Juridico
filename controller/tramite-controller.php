<?php
    if (isset($_POST['tramiteRegistrar'])) {
        require_once('view/tramiteRegistrar-view.php');
        
        if (isset($_POST['registrarTramite'])) {

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

    } else{
        echo "Error... Pagina en Construcción";
    }
?>