<!DOCTYPE html>
<html lang="en">
<head>
    <?php include __DIR__ . '/includes/header.php'; ?>
    <title>Iniciar Sesión</title>
</head>
<body>
    <main class="auth-page">
        <section class="auth-card page-container">
            <div class="page-header">
                <div class="page-header-titles">
                    <h2 class="page-header-title">Iniciar Sesión</h2>
                    <span class="page-header-subtitle">Utiliza tu correo electrónico o cédula para ingresar</span>
                </div>
            </div>
            <?php
            require_once __DIR__ . '/../lib/Session.php';
            Session::start();
            $flash = Session::flash('flash_message');
            if (!empty($flash)) {
                echo '<div class="alert alert-info">' . htmlspecialchars($flash) . '</div>';
            }

            // Debug panel when ?debug=1
            if (!empty($_GET['debug'])) {
                $cookie = $_COOKIE[session_name()] ?? null;
                $savePath = ini_get('session.save_path');
                $writable = is_writable($savePath) ? 'yes' : 'no';
                echo '<div style="background:#fff3cd;padding:12px;margin:8px 0;border:1px solid #ffeeba;">';
                echo '<strong>DEBUG sesion</strong><br>';
                echo 'Session::id() = ' . htmlspecialchars(Session::id()) . '<br>';
                echo 'Cookie PHPSESSID = ' . htmlspecialchars($cookie ?? 'n/a') . '<br>';
                echo 'session.save_path = ' . htmlspecialchars($savePath) . ' (writable=' . $writable . ')<br>';
                echo '</div>';
            }
            ?>
            <div class="page-content">
                <form action="index.php?pagina=auth" method="POST" class="auth-form row p-4">
                    <div class="col-12 mb-3">
                        <label for="login" class="form-label">Correo o Cédula</label>
                        <input id="login" type="text" class="form-control" name="login" placeholder="ejemplo@correo.com o 12345678" required autocomplete="username">
                    </div>
                    <div class="col-12 mb-3">
                        <label for="password" class="form-label">Contraseña</label>
                        <input id="password" type="password" class="form-control" name="password" placeholder="********" required autocomplete="current-password">
                    </div>
                    <input type="hidden" name="loginAction" value="1">
                    <div class="col-12 d-flex justify-content-between align-items-center">
                        <button type="submit" class="btn btn-primary">Entrar</button>
                        <a href="index.php?pagina=recuperarContrasena" class="btn btn-link auth-link">¿Olvidó su contraseña?</a>
                    </div>
                </form>
            </div>
        </section>
    </main>
</body>
</html>
