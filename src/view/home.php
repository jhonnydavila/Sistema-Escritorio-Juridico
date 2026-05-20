<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include __DIR__ . '/includes/header.php'; ?>
        <title>Sistema - Abogados</title>
    </head>
    <body>
        <?php include __DIR__ . '/includes/sidebar.php'; ?>
        
        <main class="main-content">
            <?php include __DIR__ . '/includes/topbar.php'; ?>

            <section class="page-container">
                <div class="page-header">
                    <div class="page-header-titles">
                        <h2 class="page-header-title">Panel de Control</h2>
                        <span class="page-header-subtitle">Gestión general del sistema</span>
                    </div>
                </div>

                <div class="dashboard-grid">
                    <article class="dashboard-card">
                        <div class="dashboard-card-header">
                            <h3>Abogados</h3>
                            <span class="badge badge-primary">Activo</span>
                        </div>
                        <p class="dashboard-card-text">Registra y consulta los abogados del sistema.</p>
                        <div class="dashboard-card-actions">
                            <a href="index.php?pagina=abogadoRegistrar">Registrar</a>
                            <a href="index.php?pagina=abogadoConsultar">Listado</a>
                        </div>
                    </article>

                    <article class="dashboard-card">
                        <div class="dashboard-card-header">
                            <h3>Clientes</h3>
                            <span class="badge badge-secondary">Gestión</span>
                        </div>
                        <p class="dashboard-card-text">Administra clientes activos y revisa su información.</p>
                        <div class="dashboard-card-actions">
                            <a href="index.php?pagina=clienteRegistrar">Registrar</a>
                            <a href="index.php?pagina=clienteConsultar">Listado</a>
                        </div>
                    </article>

                    <article class="dashboard-card">
                        <div class="dashboard-card-header">
                            <h3>Casos</h3>
                            <span class="badge badge-warning">Seguimiento</span>
                        </div>
                        <p class="dashboard-card-text">Registra y administra tus casos jurídicos.</p>
                        <div class="dashboard-card-actions">
                            <a href="index.php?pagina=casosRegistrar">Registrar</a>
                            <a href="index.php?pagina=casosConsultar">Listado</a>
                        </div>
                    </article>

                    <article class="dashboard-card">
                        <div class="dashboard-card-header">
                            <h3>Pagos</h3>
                            <span class="badge badge-info">Finanzas</span>
                        </div>
                        <p class="dashboard-card-text">Registra pagos y verifica el historial financiero.</p>
                        <div class="dashboard-card-actions">
                            <a href="index.php?pagina=pagoRegistrar">Registrar</a>
                            <a href="index.php?pagina=pagoConsultar">Listado</a>
                        </div>
                    </article>
                </div>
            </section>
        </main>

        <?php include __DIR__ . '/includes/footer.php'; ?>
    </body>
</html>