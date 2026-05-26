<?php
    $page = 'abogadoRegistrar';
    if (is_file('view/'.$page.'-view.php')){ 
        require_once('view/'.$page.'-view.php');
    }else{
        echo "Error... Pagina en Construcción";
    }
    if (isset($_POST['registrar'])) {
        require_once('controller/abogado-controller.php');
        $ins = new AbogadoController();
        $response = $ins->registrar_abogado_controller();
        echo $response;
    }