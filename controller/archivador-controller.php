<?php
require_once('model/archivador-model.php');
$objArchivador = new ArchivadorModel();

// 🟢 FLUJO DE REGISTRO
if(isset($_POST['archivadorRegistrar']) || isset($_POST['registrar'])){
    require_once('view/archivadorRegistrar-view.php');
    
    if (isset($_POST['registrar'])) {
       
        $strNumero = $_POST['numeroArchivador'] ?? '';
        $strNombre = $_POST['nombreArchivador'] ?? '';
        $strDescripcion = $_POST['descripcionArchivador'] ?? '';

        $objArchivador->set_Numero($strNumero);
        $objArchivador->set_Nombre($strNombre);
        $objArchivador->set_Descripcion($strDescripcion);
        $objArchivador->set_Estatus("Activo"); // Valor por defecto

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
// 🔵 FLUJO DE CONSULTA
} else if (isset($_POST['archivadorConsultar'])) {
    $data = $objArchivador->consultar_archivador_model();
    require_once('view/archivadorConsultar-view.php');
} else {
    echo "Error... Página en Construcción";
}