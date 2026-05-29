<?php
$page = 'archivadorRegistrar';

// 1. Muestra la vista del formulario
if (is_file('view/'.$page.'-view.php')){ 
    require_once('view/'.$page.'-view.php');
} else {
    echo "Error... Pagina en Construcción";
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once(__DIR__.'/../model/archivador-model.php');
    
    $model = new ArchivadorModel();
    
    // Pasamos los datos al modelo
    $model->set_Numero(trim($_POST['numeroArchivador']));
    $model->set_Estatus(trim($_POST['estatusArchivador']));
    $model->set_Descripcion(trim($_POST['descripcionArchivador']));
    
    $resultado = $model->registrar_archivador_model();
    
    if ($resultado) {
        echo "<script>alert('¡Archivador registrado con éxito!');</script>";
    } else {
        echo "<script>alert('Error al registrar el archivador.');</script>";
    }
}