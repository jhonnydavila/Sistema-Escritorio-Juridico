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
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
            if (!empty($_SESSION['flash_message'])) {
                echo '<div class="alert alert-info">' . htmlspecialchars($_SESSION['flash_message']) . '</div>';
                unset($_SESSION['flash_message']);
            }
            ?>
            <div class="page-content">
                <form action="src/controller/authController.php" method="POST" class="auth-form row p-4">
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
