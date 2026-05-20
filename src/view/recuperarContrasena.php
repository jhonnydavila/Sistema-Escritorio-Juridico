<!DOCTYPE html>
<html lang="en">
<head>
    <?php include __DIR__ . '/includes/header.php'; ?>
    <title>Recuperar Contraseña</title>
</head>
<body>
    <main class="auth-page">
        <section class="auth-card page-container">
            <div class="page-header">
                <div class="page-header-titles">
                    <h2 class="page-header-title">Recuperar Contraseña</h2>
                    <span class="page-header-subtitle">Ingresa tu correo, cédula y frase secreta</span>
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
                        <label for="fraseSecreta" class="form-label">Frase Secreta</label>
                        <input id="fraseSecreta" type="password" class="form-control" name="fraseSecreta" placeholder="Tu frase secreta" required autocomplete="off">
                    </div>
                    <div class="col-12 mb-3">
                        <label for="newPassword" class="form-label">Nueva Contraseña</label>
                        <input id="newPassword" type="password" class="form-control" name="newPassword" placeholder="Nueva contraseña" required autocomplete="new-password">
                    </div>
                    <div class="col-12 mb-3">
                        <label for="confirmPassword" class="form-label">Confirmar Contraseña</label>
                        <input id="confirmPassword" type="password" class="form-control" name="confirmPassword" placeholder="Repita la contraseña" required autocomplete="new-password">
                    </div>
                    <input type="hidden" name="recoverPassword" value="1">
                    <div class="col-12 d-flex justify-content-between align-items-center">
                        <button type="submit" class="btn btn-primary">Actualizar contraseña</button>
                        <a href="index.php?pagina=login" class="btn btn-link auth-link">Volver al inicio</a>
                    </div>
                </form>
            </div>
        </section>
    </main>
</body>
</html>
