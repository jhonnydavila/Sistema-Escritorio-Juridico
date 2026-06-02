<?php
    require_once('model/evento-model.php');
    
    $objEvento = new EventoModel();
    
    if(isset($_POST['eventoRegistrar']) || isset($_POST['registrar'])){
        require_once('view/eventoRegistrar-view.php');

        if (isset($_POST['registrar'])) {
            $codigoCaso = $_POST['casoEvento'];
            $Titulo = $_POST['tituloEvento'];
            $Tipo = $_POST['tipoEvento'];
            $Descripcion = $_POST['descripcionEvento'];
            $Estatus = $_POST['estatusEvento'];
            $Fecha = $_POST['fechaEvento'];

            $objEvento->set_CodigoCaso($codigoCaso);
            $objEvento->set_Titulo($Titulo);
            $objEvento->set_Tipo($Tipo);
            $objEvento->set_Descripcion($Descripcion);
            $objEvento->set_Estatus($Estatus);
            $objEvento->set_Fecha($Fecha);

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
        

    }else{
        echo "Error... Pagina en Construcción";
    }