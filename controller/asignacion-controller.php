<?php
    if (isset($_POST['asignacionRegistrar'])) {
        require_once('view/asignacionRegistrar-view.php');

    } else if (isset($_POST['asignacionConsultar'])) {
        require_once('view/asignacionConsultar-view.php');
        
    } else if (isset($_POST['asignacionVer'])) {
        require_once('view/asignacionVer-view.php');
        
    } else if (isset($_POST['asignacionTablero'])) {
        require_once('view/asignacionTablero-view.php');
        
    }else{
        echo "Error... Pagina en Construcción";
    }