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
            <section class="page__container">
                <div class="page__header">
                    <div class="page__header-titles">
                        <h2 class="page__header-title">Pagos</h2>
                        <span class="page__header-subtitle">Historial de pagos registrados</span>
                    </div>
                </div>
                <div class="page__content">
                    <div class="page__table-container">
                        <table id="table" class="page__table">
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