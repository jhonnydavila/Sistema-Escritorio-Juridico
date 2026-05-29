<?php
    if (isset($_POST['clienteRegistrar'])) {
        $page = 'clienteRegistrar';
        if (is_file('view/'.$page.'-view.php')){ 
            require_once('view/'.$page.'-view.php');
        }
    } else if (isset($_POST['clienteConsultar'])) {
        $page = 'clienteConsultar';
        if (is_file('view/'.$page.'-view.php')){ 
            require_once('view/'.$page.'-view.php');
        }
    }else{
        echo "Error... Pagina en Construcción";
    }
    if (isset($_POST['registrar'])) {
        require_once('controller/abogado-controller.php');
        $objAbogado = new AbogadoController();
        $response = $objAbogado->registrar_abogado_controller();
        echo $response;
    }