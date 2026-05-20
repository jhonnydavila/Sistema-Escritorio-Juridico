<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include __DIR__ . '/includes/header.php'; ?>
        <title>Registrar Caso</title>
    </head>
    <body>
        <?php include __DIR__ . '/includes/sidebar.php'; ?>
        
        <main class="main-content">
            <?php include __DIR__ . '/includes/topbar.php'; ?>

            <section class="page-container">
                <div class="page-header">
                    <div class="page-header-titles">
                        <h2 class="page-header-title">Registrar Caso</h2>
                        <span class="page-header-subtitle">Gestión de Casos</span>
                    </div>
                </div>
                <div class="page-content">
                    <form action="src/controller/casoController.php" id="form" class="row p-4" method="POST">
                        
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group form-floating">
                                <input id="codigoCaso" type="text" class="form-control" name="codigoCaso" placeholder="john doe" autocomplete="off" required>
                                <label class="form-label" for="codigoCaso">Código del Caso</label>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group form-floating">
                                <input id="codigoCliente" type="text" class="form-control" name="codigoCliente" placeholder="john doe" autocomplete="off" required>
                                <label class="form-label" for="codigoCliente">Código del Cliente</label>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4">
                            <div class="form-group form-floating">
                                <input id="fechaInicioCaso" type="date" class="form-control" name="fechaInicioCaso" autocomplete="off" required>
                                <label class="form-label" for="fechaInicioCaso">Fecha de Inicio</label>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group form-floating">
                                <input id="fechaFinCaso" type="date" class="form-control" name="fechaFinCaso" autocomplete="off">
                                <label class="form-label" for="fechaFinCaso">Fecha de Fin</label>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group form-floating">
                                <input id="cotizacionInicialCaso" type="text" class="form-control" name="cotizacionInicialCaso" placeholder="john doe" autocomplete="off" required>
                                <label class="form-label" for="cotizacionInicialCaso">Cotización Inicial</label>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6">
                            <div class="form-group form-floating">
                                <input id="tipoCaso" type="text" class="form-control" name="tipoCaso" placeholder="john doe" autocomplete="off" required>
                                <label class="form-label" for="tipoCaso">Tipo de Caso</label>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group form-floating">
                                <input id="estatusCaso" type="text" class="form-control" name="estatusCaso" placeholder="john doe" autocomplete="off" required>
                                <label class="form-label" for="estatusCaso">Estatus del Caso</label>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group form-floating">
                                <input id="descripcionCaso" type="text" class="form-control" name="descripcionCaso" placeholder="john doe" autocomplete="off" required>
                                <label class="form-label" for="descripcionCaso">Descripción del Caso</label>
                            </div>
                        </div>

                        <div class="d-flex justify-content-center mt-4 gap-2 w-100">
                            <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal" aria-label="Close">Cerrar</button>
                            <button type="submit" class="btn btn-sm btn-primary">Registrar</button>
                        </div>
                    </form>
                </div>
            </section>
        </main>

        <?php include __DIR__ . '/includes/footer.php'; ?>
    </body>
</html>