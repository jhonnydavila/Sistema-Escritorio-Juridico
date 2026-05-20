<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include __DIR__ . '/includes/header.php'; ?>
        <title>Registrar Pago</title>
    </head>
    <body>
        <?php include __DIR__ . '/includes/sidebar.php'; ?>
        <main class="main-content">
            <?php include __DIR__ . '/includes/topbar.php'; ?>
            <section class="page-container">
                <div class="page-header">
                    <div class="page-header-titles">
                        <h2 class="page-header-title">Registrar Pago</h2>
                        <span class="page-header-subtitle">Agrega un pago para un caso existente</span>
                    </div>
                </div>
                <div class="page-content">
                    <form action="src/controller/pagoController.php" class="row p-4" method="POST">
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group form-floating">
                                <input id="codigoPago" type="text" class="form-control" name="codigoPago" placeholder="PAG-001" autocomplete="off" required>
                                <label class="form-label" for="codigoPago">Código de Pago</label>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group form-floating">
                                <input id="codigoCasoPago" type="text" class="form-control" name="codigoCaso" placeholder="CAS-001" autocomplete="off" required>
                                <label class="form-label" for="codigoCasoPago">Código de Caso</label>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group form-floating">
                                <input id="conceptoPago" type="text" class="form-control" name="conceptoPago" placeholder="Consulta legal" autocomplete="off" required>
                                <label class="form-label" for="conceptoPago">Concepto</label>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group form-floating">
                                <input id="montoPago" type="number" step="0.01" class="form-control" name="montoPago" placeholder="150.00" autocomplete="off" required>
                                <label class="form-label" for="montoPago">Monto</label>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group form-floating">
                                <input id="metodoPago" type="text" class="form-control" name="metodoPago" placeholder="Transferencia" autocomplete="off" required>
                                <label class="form-label" for="metodoPago">Método de Pago</label>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group form-floating">
                                <input id="fechaPago" type="date" class="form-control" name="fechaPago" autocomplete="off" required>
                                <label class="form-label" for="fechaPago">Fecha de Pago</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group form-floating">
                                <textarea id="observacionesPago" class="form-control" name="observacionesPago" placeholder="Observaciones" style="height: 120px"></textarea>
                                <label class="form-label" for="observacionesPago">Observaciones</label>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center mt-4 gap-2 w-100">
                            <button type="submit" class="btn btn-primary">Guardar Pago</button>
                        </div>
                    </form>
                </div>
            </section>
        </main>
        <?php include __DIR__ . '/includes/footer.php'; ?>
    </body>
</html>