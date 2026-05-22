<?php
    
    if (!empty($_GET['page'])){ 
        $page = $_GET['page'];
    } else {
        $page = 'home';
    }
    if(is_file("controller/".$page."Controller.php")){ 
        require_once("controller/".$page."Controller.php");
    } else if(is_file("view/".$page.".php")){ 
        require_once("view/".$page.".php");
    } else {
        require_once("view/404.php");
    }