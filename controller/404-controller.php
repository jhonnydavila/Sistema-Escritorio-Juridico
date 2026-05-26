<?php
    $page = '404';
    if(is_file('view/'.$page.'.php')){ 
        require_once('view/'.$page.'.php');
    }else{
        echo "Error... Pagina en Construcción";
    }