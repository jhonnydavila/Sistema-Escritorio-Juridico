<!DOCTYPE html>
<html lang="en">
<head>
    <?php include __DIR__ . '/includes/header.php'; ?>
    <title>Iniciar Sesión</title>
</head>
<body>
    <main class="auth-page">
        <section class="auth-card page__container">
            <div class="page__header">
                <div class="page__header-titles">
                    <h2 class="page__header-title">Iniciar Sesión</h2>
                    <span class="page__header-subtitle">Utiliza tu correo electrónico o cédula para ingresar</span>
                </div>
            </div>
            <div class="page__content">
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
                    </div>
                </form>
            </div>
        </section>
    </main>
</body>
</html>