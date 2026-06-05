<?php
    if(isset($_SESSION['cedulaUsuario']) && isset($_SESSION['rolUsuario']) && $_SESSION['rolUsuario'] == 'secrertaria') {
        require_once('view/403.php');

    }else if (isset($_POST['documentoRegistrar'])) {
        require_once('view/documentoRegistrar-view.php');

    } else if (isset($_POST['documentoConsultar'])) {
        require_once('view/documentoConsultar-view.php');
        
    }else{
        echo "Error... Pagina en Construcción";
    }