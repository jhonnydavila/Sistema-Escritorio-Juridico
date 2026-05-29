<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include ('includes/header.php'); ?>
        <title>Consultar Casos</title>
    </head>
    <body>
        <?php include ('includes/sidebar.php'); ?>
        <main class="main-content">
            <?php include __DIR__ . '/includes/topbar.php'; ?>
            <section class="page__container">
                <div class="page__header">
                    <div class="page__header-titles">
                        <h2 class="page__header-title">Casos</h2>
                        <span class="page__header-subtitle">Listado de casos registrados</span>
                    </div>
                </div>
                <div class="page__content">
                    <div class="page__tabs">
                        <button class="page__tab active" data-status="Activo">
                            <svg width="1.2rem" height="1.2rem" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-archive-icon lucide-archive">
                                <rect width="20" height="5" x="2" y="3" rx="1"/>
                                <path d="M4 8v11a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8"/>
                                <path d="M10 12h4"/>
                            </svg>
                            <span>Casos Activos</span>
                        </button>
                        <button class="page__tab" data-status="Inactivo">
                            <svg width="1.2rem" height="1.2rem" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-archive-x-icon lucide-archive-x">
                                <rect width="20" height="5" x="2" y="3" rx="1"/>
                                <path d="M4 8v11a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8"/>
                                <path d="m9.5 17 5-5"/><path d="m9.5 12 5 5"/>
                            </svg>
                            <span>Casos Inactivos</span>
                        </button>
                    </div>
                    <div class="table__container">
                        <table id="table" class="table__content">
                            <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Cliente</th>
                                    <th>Fecha Inicio</th>
                                    <th>Fecha Fin</th>
                                    <th>Tipo</th>
                                    <th>Estatus</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>CAS-001</td>
                                    <td>Juan Pérez</td>
                                    <td>2026-05-01</td>
                                    <td>2026-08-01</td>
                                    <td>Laboral</td>
                                    <td>En Progreso</td>
                                    <td class="text-center">--</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </main>
        <?php include ('includes/footer.php'); ?>
    </body>
</html>