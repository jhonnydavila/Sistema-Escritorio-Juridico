<?php
    $publicPages = ['login', 'recuperarContrasena', 'auth'];
    
    if (!empty($_GET['pagina'])){ 
        $pagina = $_GET['pagina'];
    } else {
        $pagina = 'home';
    }

    if(is_file("controller/".$pagina."Controller.php")){ 
        require_once("controller/".$pagina."Controller.php");
    } else if(is_file("view/".$pagina.".php")){ 
        require_once("view/".$pagina.".php");
    } else {
        echo "Error 404: Página no encontrada.";
    }