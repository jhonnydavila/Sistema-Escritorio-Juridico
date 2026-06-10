<?php
    require_once('model/evento-model.php');
    require_once('model/caso-model.php');

    $objEvento = new EventoModel();
    $objCaso = new CasoModel();
    
    if(isset($_SESSION['cedulaUsuario']) && isset($_SESSION['rolUsuario']) && $_SESSION['rolUsuario'] == 'secretaria') {
        require_once('view/403.php');

    }else if (isset($_POST['eventoRegistrar']) || isset($_POST['registrarEvento'])){
        $dataCasos = $objCaso->consultar_caso_model();
        require_once('view/eventoRegistrar-view.php');

        if (isset($_POST['registrarEvento'])) {
            $codigoCaso = $_POST['codigoCaso'];
            $titulo = $_POST['tituloEvento'];
            $tipo = $_POST['tipoEvento'];
            $estatus = $_POST['estatusEvento'];
            $dia = $_POST['diaEvento'];

            if (isset($_POST['horaEvento']) && !empty($_POST['horaEvento'])) {
                $hora = $_POST['horaEvento'];
                $objEvento->set_Hora($hora);
            }
            if (isset($_POST['descripcionEvento']) && !empty($_POST['descripcionEvento'])) {
                $descripcion = $_POST['descripcionEvento'];
                $objEvento->set_Descripcion($descripcion);
            }
            
            $objEvento->set_CodigoCaso($codigoCaso);
            $objEvento->set_Titulo($titulo);
            $objEvento->set_Tipo($tipo);
            $objEvento->set_Estatus($estatus);
            $objEvento->set_Dia($dia);

            $response = $objEvento->registrar_evento_model();
            if ($response){
                echo '
                    <script>
                        Swal.fire({
                            title: "Evento Registrado Exitosamente",
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
                        text: "No se pudo registrar el Evento"
                    });
                    </script>
                ';
            }
        }

    }else if (isset($_POST['eventoConsultar'])) {
        $data = $objEvento->consultar_evento_model();
        require_once('view/eventoConsultar-view.php');
        

    }else {
        $data = $objEvento->consultar_evento_model();
        require_once('view/eventoConsultar-view.php');
        

    }