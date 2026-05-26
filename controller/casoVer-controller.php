<?php
    $page = 'casoVer';
    if(is_file('view/'.$page.'-view.php')){ 
        require_once('view/'.$page.'-view.php');
    }else{
        echo "Error... Pagina en Construcción";
    }