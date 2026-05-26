<?php
    if (!empty($_GET['page'])){ 
        $page = $_GET['page'];
    } else {
        $page = 'home';
    }
    if(is_file("controller/".$page."-controller.php")){ 
        require_once("controller/".$page."-controller.php");
    } else {
        require_once("view/404.php");
    }