<?php
require_once __DIR__ . '/lib/Session.php';
require_once __DIR__ . '/lib/App.php';
require_once __DIR__ . '/lib/Auth.php';
// Start session centrally
Session::start();

// Debug: log session state, id and user for tracing login persistence
error_log('Index: session_status=' . session_status());
error_log('Index: session_id=' . Session::id());
error_log('Index: session_cookie_params=' . json_encode(Session::cookieParams()));
error_log('Index: session_user=' . json_encode(Session::get('user')));

$publicPages = ['login', 'recuperarContrasena', 'auth'];
$pagina = !empty($_GET['pagina']) ? basename($_GET['pagina']) : 'home';

// Use Auth middleware to require authentication for protected pages
Auth::requireAuth($publicPages);


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
