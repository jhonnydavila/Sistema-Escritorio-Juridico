<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include ('includes/header.php'); ?>
        <title>Registrar Pago</title>
    </head>
    <body>
        <?php include ('includes/sidebar.php'); ?>
        <main class="main-content">
            <?php include __DIR__ . '/includes/topbar.php'; ?>
            <section class="page__container">
                <div class="page__header">
                    <div class="page__header-titles">
                        <h2 class="page__header-title">Registrar Pago</h2>
                        <span class="page__header-subtitle">Agrega un pago para un caso existente</span>
                    </div>
                </div>
                <div class="page__content">
                    <form action="src/controller/pagoController.php" class="row p-4" method="POST">
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group form-floating">
                                <select class="form-select" id="casoPago" required>
                                    <option value="" hidden>Seleccionar...</option>
                                    <option value="CAS-001">Caso 1</option>
                                    <option value="CAS-002">Caso 2</option>
                                </select>
                                <label for="casoPago" class="form-label">Caso</label>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group form-floating">
                                <select class="form-select" id="metodoPago" required>
                                    <option value="" hidden>Seleccionar...</option>
                                    <option value="transferencia">Transferencia</option>
                                    <option value="efectivo">Efectivo</option>
                                </select>
                                <label for="metodoPago" class="form-label">Método de Pago</label>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group form-floating">
                                <select class="form-select" id="estatusPago" required>
                                    <option value="" hidden>Seleccionar...</option>
                                    <option value="confirmado">Confirmado</option>
                                    <option value="rechazado">Rechazado</option>
                                    <option value="pendiente">Pendiente</option>
                                </select>
                                <label for="estatusPago" class="form-label">Estatus del Pago</label>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group form-floating">
                                <input id="montoPago" type="number" step="0.01" class="form-control" name="montoPago" placeholder="150.00" autocomplete="off" required>
                                <label class="form-label" for="montoPago">Monto</label>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12">
                            <div class="form-group form-floating">
                                <input id="conceptoPago" type="text" class="form-control" name="conceptoPago" placeholder="Consulta legal" autocomplete="off" required>
                                <label class="form-label" for="conceptoPago">Concepto</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group form-floating">
                                <input id="observacionesPago" type="text" class="form-control" name="observacionesPago" placeholder="Observaciones" autocomplete="off">
                                <label class="form-label" for="observacionesPago">Observaciones</label>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center mt-4 gap-2 w-100">
                            <button type="submit" class="btn__primary">Registrar</button>
                        </div>
                    </form>
                </div>
            </section>
        </main>
        <?php include ('includes/footer.php'); ?>
    </body>
</html>