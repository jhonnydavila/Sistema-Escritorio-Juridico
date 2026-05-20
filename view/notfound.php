<!DOCTYPE html>
<html lang="en">
<head>
    <?php include __DIR__ . '/includes/header.php'; ?>
    <title>Página no encontrada</title>
</head>
<body>
    <?php
        require_once __DIR__ . '/../lib/Session.php';
        Session::start();
    ?>
    <?php include __DIR__ . '/includes/topbar.php'; ?>
    <main class="main-content" style="min-height:100vh; display:flex; align-items:center; justify-content:center; background:#f5f6fb; padding:2rem;">
        <section class="page__container" style="max-width:600px; width:100%; text-align:center;">
            <div class="page__header">
                <div class="page__header-titles">
                    <h2 class="page__header-title">404 - Página no encontrada</h2>
                    <span class="page__header-subtitle">La ruta solicitada no existe o no está disponible.</span>
                </div>
            </div>
            <div class="page__content">
                <p>Por favor regresa al panel o inicia sesión nuevamente.</p>
                <a href="index.php?pagina=home" class="btn btn-primary">Ir al inicio</a>
            </div>
        </section>
    </main>
</body>
</html>
