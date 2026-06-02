<?php
    require_once('model/honorario-model.php');
    require_once('model/caso-model.php');
    require_once('model/pago-model.php');

    $objHonorario = new HonorarioModel();
    $objCaso = new CasoModel();
    $objPago = new PagoModel();

    if (isset($_POST['honorarioRegistrar']) || isset($_POST['registrarHonorario'])) {
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
    } else if (isset($_POST['honorarioPagoRegistrar']) || isset($_POST['registrarPago'])) {
        $dataHonorarios = $objHonorario->consultar_honorarios_model();
        require_once('view/honorarioPagoRegistrar-view.php');
        
        if (isset($_POST['registrarPago'])) {
            $codigoHonorario = $_POST['honorarioPago'];
            $metodo = $_POST['metodoPago'];
            $estatus = $_POST['estatusPago'];
            $monto = $_POST['montoPago'];
            $concepto = $_POST['conceptoPago'];
            $observaciones = isset($_POST['observacionesPago']) ? $_POST['observacionesPago'] : '';

            $objPago->set_CodigoHonorario($codigoHonorario);
            $objPago->set_Metodo($metodo);
            $objPago->set_Estatus($estatus);
            $objPago->set_Monto($monto);
            $objPago->set_Concepto($concepto);
            $objPago->set_Observaciones($observaciones);

            $response = $objPago->registrar_pago_model();
            if ($response) {
                echo '
                    <script>
                        Swal.fire({
                            title: "Pago Registrado Exitosamente", 
                            icon: "success"
                        });
                    </script>
                ';
            } else {
                echo '
                    <script>
                        Swal.fire({
                            icon: "error", 
                            title: "Error al registrar el Pago"
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