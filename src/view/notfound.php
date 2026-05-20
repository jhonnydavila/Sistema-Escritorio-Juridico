<!DOCTYPE html>
<html lang="en">
<head>
    <?php include __DIR__ . '/includes/header.php'; ?>
    <title>Página no encontrada</title>
</head>
<body>
    <?php if (session_status() === PHP_SESSION_NONE) { session_start(); } ?>
    <?php include __DIR__ . '/includes/topbar.php'; ?>
    <main class="main-content" style="min-height:100vh; display:flex; align-items:center; justify-content:center; background:#f5f6fb; padding:2rem;">
        <section class="page-container" style="max-width:600px; width:100%; text-align:center;">
            <div class="page-header">
                <div class="page-header-titles">
                    <h2 class="page-header-title">404 - Página no encontrada</h2>
                    <span class="page-header-subtitle">La ruta solicitada no existe o no está disponible.</span>
                </div>
            </div>
            <div class="page-content">
                <p>Por favor regresa al panel o inicia sesión nuevamente.</p>
                <a href="index.php?pagina=home" class="btn btn-primary">Ir al inicio</a>
            </div>
        </section>
    </main>
</body>
</html>
