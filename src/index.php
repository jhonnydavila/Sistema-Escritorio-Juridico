<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$publicPages = ['login', 'recuperarContrasena'];
$pagina = !empty($_GET['pagina']) ? basename($_GET['pagina']) : 'home';

if (empty($_SESSION['user']) && !in_array($pagina, $publicPages, true)) {
    header('Location: index.php?pagina=login');
    exit;
}

$controllerFile = __DIR__ . "/controller/{$pagina}Controller.php";
$viewFile = __DIR__ . "/view/{$pagina}.php";

if (is_file($controllerFile)) {
    require_once $controllerFile;
} elseif (is_file($viewFile)) {
    require_once $viewFile;
} else {
    http_response_code(404);
    error_log('404 - Página no encontrada: ' . $pagina);
    require_once __DIR__ . '/view/notfound.php';
}
