<?php
    require_once('model/honorario-model.php');
    require_once('model/pago-model.php');

    $objHonorario = new HonorarioModel();
    $objPago = new PagoModel();

    if(isset($_SESSION['cedulaUsuario']) && isset($_SESSION['rolUsuario']) && $_SESSION['rolUsuario'] == 'secrertaria') {
        require_once('view/403.php');

    }else if (isset($_POST['pagoRegistrar']) || isset($_POST['registrarPago'])) {
        $dataHonorarios = $objHonorario->consultar_honorarios_model();
        require_once('view/pagoRegistrar-view.php');
        
        if (isset($_POST['registrarPago'])) {
            $codigoHonorario = $_POST['honorarioPago'];
            $metodo = $_POST['metodoPago'];
            $estatus = $_POST['estatusPago'];
            $monto = $_POST['montoPago'];
            $concepto = $_POST['conceptoPago'];
            
            if (isset($_POST['observacionesPago']) && !empty($_POST['observacionesPago'])) {
                $observaciones = $_POST['observacionesPago'];
                $objPago->set_Observaciones($observaciones);
            }

            $objPago->set_CodigoHonorario($codigoHonorario);
            $objPago->set_Metodo($metodo);
            $objPago->set_Estatus($estatus);
            $objPago->set_Monto($monto);
            $objPago->set_Concepto($concepto);

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
    } else if (isset($_POST['pagoConsultar'])) {
        $data = $objPago->consultar_pago_model();
        require_once('view/pagoConsultar-view.php');

    } else {
        $data = $objPago->consultar_pago_model();
        require_once('view/pagoConsultar-view.php');

    }
?>