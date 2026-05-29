<?php

$page = 'archivadorConsultar';

require_once('model/archivador-model.php');
$model = new ArchivadorModel();

$listaArchivadores = $model->consultar_archivador_model();


if (is_file('view/'.$page.'-view.php')){ 
    require_once('view/'.$page.'-view.php');
} else {
    echo "Error... Pagina en Construcción";
}