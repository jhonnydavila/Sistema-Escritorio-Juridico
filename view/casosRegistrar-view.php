<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include ('includes/header.php'); ?>
        <title>Registrar Caso</title>
    </head>
    <body>
        <?php include ('includes/sidebar.php'); ?>
        
        <main class="main-content">
            <?php include __DIR__ . '/includes/topbar.php'; ?>

            <section class="page__container">
                <div class="page__header">
                    <div class="page__header-titles">
                        <h2 class="page__header-title">Registrar Caso</h2>
                        <span class="page__header-subtitle">Gestión de Casos</span>
                    </div>
                </div>
                <div class="page__content">
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
                                <input id="cotizacionInicialCaso" type="text" class="form-control" name="cotizacionInicialCaso" placeholder="john doe" autocomplete="off">
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
                            <button type="submit" class="btn__primary">Registrar</button>
                        </div>
                    </form>
                </div>
            </section>
        </main>

        <?php include ('includes/footer.php'); ?>
    </body>
</html>