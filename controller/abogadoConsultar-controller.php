<?php
    $page = 'abogadoConsultar';
    if(is_file('view/'.$page.'-view.php')){ 
        require_once('controller/abogado-controller.php');

        $objAbogado = new AbogadoController();
        $registros = $objAbogado->consultar_abogado_controller();

        require_once('view/'.$page.'-view.php');
    }else{
        echo "Error... Pagina en Construcción";
    }