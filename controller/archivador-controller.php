<?php
    require_once('model/archivador-model.php');
    $objArchivador = new ArchivadorModel();

    if(isset($_SESSION['cedulaUsuario']) && isset($_SESSION['rolUsuario']) && $_SESSION['rolUsuario'] == 'secrertaria') {
        require_once('view/403.php');

    }else if (isset($_POST['archivadorRegistrar']) || isset($_POST['registrarArchivador'])){
        require_once('view/archivadorRegistrar-view.php');
        
        if (isset($_POST['registrarArchivador'])) {
            
            $nombre = $_POST['nombreArchivador'];

            if (isset($_POST['descripcionArchivador']) && !empty($_POST['descripcionArchivador'])) {
                $descripcion = $_POST['descripcionArchivador'];
                $objArchivador->set_Descripcion($descripcion);
            }

            $objArchivador->set_Nombre($nombre);
            $objArchivador->set_Estatus("Activo");

            $response = $objArchivador->registrar_archivador_model();
            if ($response){
                echo '<script>
                Swal.fire({
                    title: "Archivador Registrado Exitosamente",
                    icon: "success",
                    draggable: true
                });
                </script>';
            } else {
                echo '<script>
                Swal.fire({
                    icon: "error",
                    title: "Error...",
                    text: "No se pudo registrar el Archivador"
                });
                </script>';
            }
        }
        
    } else if (isset($_POST['archivadorConsultar'])) {
        $data = $objArchivador->consultar_archivador_model();
        require_once('view/archivadorConsultar-view.php');

    } else {
        $data = $objArchivador->consultar_archivador_model();
        require_once('view/archivadorConsultar-view.php');

    }