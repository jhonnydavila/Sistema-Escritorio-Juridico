<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start(['name' => 'sesion_usuario']);
    }

    if (!empty($_GET['page'])){ 
        $page = $_GET['page'];
    } else {
        $page = 'login';
    }

    if (!isset($_SESSION['cedulaUsuario']) && $page != 'login') {
        header('Location: login');
        exit();
    }

    if(is_file("controller/".$page."-controller.php")){ 
        require_once("controller/".$page."-controller.php");
    } else {
        require_once("view/404.php");
    }
?>