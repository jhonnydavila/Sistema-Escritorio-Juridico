<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include __DIR__ . '/includes/header.php'; ?>
        <title>Consultar Documentos</title>
    </head>
    <body>
        <?php include __DIR__ . '/includes/sidebar.php'; ?>
        <main class="main-content">
            <?php include __DIR__ . '/includes/topbar.php'; ?>
            <section class="page-container">
                <div class="page-header">
                    <div class="page-header-titles">
                        <h2 class="page-header-title">Documentos</h2>
                        <span class="page-header-subtitle">Documentos registrados en el sistema</span>
                    </div>
                </div>
                <div class="page-content">
                    <div class="page-table-container">
                        <table id="table" class="page-table">
                            <thead>
                                <tr>
                                    <th>Tipo</th>
                                    <th>Nombre</th>
                                    <th>Descripción</th>
                                    <th>Fecha</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Documento</td>
                                    <td>Contrato de arrendamiento</td>
                                    <td>Contrato firmado entre partes</td>
                                    <td>2026-05-12</td>
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