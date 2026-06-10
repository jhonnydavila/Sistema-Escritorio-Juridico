<?php
    require_once('model/documento-model.php');
    require_once('model/caso-model.php');
    $objDocumento = new DocumentoModel();
    $objCaso = new CasoModel();
    
    if(isset($_SESSION['cedulaUsuario']) && isset($_SESSION['rolUsuario']) && $_SESSION['rolUsuario'] == 'secretaria') {
        require_once('view/403.php');

    } else if (isset($_POST['documentoRegistrar']) || isset($_POST['registrarDocumento'])) {
        $dataCasos = $objCaso->consultar_caso_model();
        require_once('view/documentoRegistrar-view.php');

        if (isset($_POST['registrarDocumento'])) {
            $tipo = $_POST['tipoDocumento'];
            $nombre = $_POST['nombreDocumento'];
            $descripcion = $_POST['descripcionDocumento'];

            // Manejo del archivo subido
            if (isset($_FILES['archivoDocumento']) && $_FILES['archivoDocumento']['error'] === UPLOAD_ERR_OK) {
                
                $fileTmpPath = $_FILES['archivoDocumento']['tmp_name'];
                $fileName = $_FILES['archivoDocumento']['name'];
                $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

                $nombreArchivo = preg_replace('/[^A-Za-z0-9\-]/', '_', $nombre) . '_' . time() . '.' . $fileExtension;

                $directorioBase = 'assets/uploads/';
                if ($tipo === 'imagen') {
                    $rutaDestino = $directorioBase . 'images/' . $nombreArchivo;
                } else {
                    $rutaDestino = $directorioBase . 'documents/' . $nombreArchivo;
                }
                
                if (move_uploaded_file($fileTmpPath, $rutaDestino)) {
                    
                    $objDocumento->set_Nombre($nombreArchivo); 
                    $objDocumento->set_Tipo($tipo);
                    $objDocumento->set_Estatus("Activo");
                    $objDocumento->set_Descripcion($descripcion);
                    $objDocumento->set_CodigoCaso(empty($_POST['codigoCaso']) ? null : $_POST['codigoCaso']);

                    $response = $objDocumento->registrar_documento_model();

                    if ($response){
                        echo '
                            <script>
                                Swal.fire({
                                    title: "Documento Registrado Exitosamente",
                                    icon: "success",
                                    draggable: true
                                });
                            </script>
                        ';
                    } else {
                        unlink($rutaDestino);
                        echo '
                            <script>
                                Swal.fire({
                                    icon: "error",
                                    title: "Error de Base de Datos",
                                    text: "No se pudo guardar la información del documento."
                                });
                            </script>
                        ';
                    }
                } else {
                    echo '
                        <script>
                            Swal.fire({
                                icon: "error",
                                title: "Error de Subida",
                                text: "No se pudo mover el archivo a la carpeta de destino."
                            });
                        </script>
                    ';
                }
            } else {
                echo '
                    <script>
                        Swal.fire({
                            icon: "warning",
                            title: "Archivo faltante o dañado",
                            text: "Por favor adjunte un archivo válido."
                        });
                    </script>
                ';
            }
        }

    } else if (isset($_POST['documentoConsultar'])) {
        $data = $objDocumento->consultar_documento_model();
        require_once('view/documentoConsultar-view.php');

    } else {
        $data = $objDocumento->consultar_documento_model();
        require_once('view/documentoConsultar-view.php');
    }
?>