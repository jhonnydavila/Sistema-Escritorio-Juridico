<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start(['name' => 'sesion_usuario']);
    }
    session_unset();
    session_destroy();
    header('Location: login');
    exit();