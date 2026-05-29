<?php
    if (isset($_POST['clienteRegistrar'])) {
        require_once('view/clienteRegistrar-view.php');

    } else if (isset($_POST['clienteConsultar'])) {
        require_once('view/clienteConsultar-view.php');
        
    }else{
        echo "Error... Pagina en Construcción";
    }