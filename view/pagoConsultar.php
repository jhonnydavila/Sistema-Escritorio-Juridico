<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include __DIR__ . '/includes/header.php'; ?>
        <title>Consultar Pagos</title>
    </head>
    <body>
        <?php include __DIR__ . '/includes/sidebar.php'; ?>
        <main class="main-content">
            <?php include __DIR__ . '/includes/topbar.php'; ?>
            <section class="page-container">
                <div class="page-header">
                    <div class="page-header-titles">
                        <h2 class="page-header-title">Pagos</h2>
                        <span class="page-header-subtitle">Historial de pagos registrados</span>
                    </div>
                </div>
                <div class="page-content">
                    <div class="page-table-container">
                        <table id="table" class="page-table">
                            <thead>
                                <tr>
                                    <th>Código Pago</th>
                                    <th>Código Caso</th>
                                    <th>Concepto</th>
                                    <th>Monto</th>
                                    <th>Método</th>
                                    <th>Fecha</th>
                                    <th>Estatus</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>PAG-001</td>
                                    <td>CAS-001</td>
                                    <td>Honorarios</td>
                                    <td>1200.00</td>
                                    <td>Transferencia</td>
                                    <td>2026-05-18</td>
                                    <td>Pagado</td>
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