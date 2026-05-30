<?php
    require_once('model/evento-model.php');
    $objEvento = new EventoModel();
    
    if(isset($_POST['eventoRegistrar']) || isset($_POST['registrar'])){
        require_once('view/eventoRegistrar-view.php');

        if (isset($_POST['registrar'])) {
            $strCaso = $_POST['casoEvento'];
            $strTitulo = $_POST['tituloEvento'];
            $strTipo = $_POST['tipoEvento'];
            $strDescripcion = $_POST['descripcionEvento'];
            $strEstatus = $_POST['estatusEvento'];
            $strFecha = $_POST['fechaEvento'];

            $objEvento->set_Caso($strCaso);
            $objEvento->set_Titulo($strTitulo);
            $objEvento->set_Tipo($strTipo);
            $objEvento->set_Descripcion($strDescripcion);
            $objEvento->set_Estatus($strEstatus);
            $objEvento->set_Fecha($strFecha);

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
        

    }else if(isset($_POST['eventoCalendario'])){
        require_once('view/eventoCalendario-view.php');

    }else{
        echo "Error... Pagina en Construcción";
    }