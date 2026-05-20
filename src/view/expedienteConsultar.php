<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include __DIR__ . '/includes/header.php'; ?>
        <title>Consultar Expedientes</title>
    </head>
    <body>
        <?php include __DIR__ . '/includes/sidebar.php'; ?>
        <main class="main-content">
            <?php include __DIR__ . '/includes/topbar.php'; ?>
            <section class="page-container">
                <div class="page-header">
                    <div class="page-header-titles">
                        <h2 class="page-header-title">Expedientes</h2>
                        <span class="page-header-subtitle">Listado de expedientes y casos asociados</span>
                    </div>
                </div>
                <div class="page-content">
                    <div class="page-table-container">
                        <table id="table" class="page-table">
                            <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Cliente</th>
                                    <th>Tipo de Caso</th>
                                    <th>Fecha Inicio</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>EXP-001</td>
                                    <td>Juan Pérez</td>
                                    <td>Civil</td>
                                    <td>2026-05-01</td>
                                    <td class="text-center">--</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </main>
        <?php include __DIR__ . '/includes/footer.php'; ?>
    </body>
</html>