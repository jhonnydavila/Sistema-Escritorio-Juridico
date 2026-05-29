<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include('includes/header.php'); ?>
        <title>Registrar Caso</title>
    </head>
    <body>
        <?php include('includes/sidebar.php'); ?>
        
        <main class="main-content">
            <?php include('includes/topbar.php'); ?>

            <section class="page__container">
                <div class="page__header">
                    <div class="page__header-titles">
                        <h2 class="page__header-title">Registrar Caso</h2>
                        <span class="page__header-subtitle">Gestión de Casos</span>
                    </div>
                </div>
                <div class="page__content">
                    <form action="src/controller/casoController.php" id="form" class="row p-4" method="POST">
                        <input type="text" name="registrar" hidden required>
                        
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group form-floating">
                                <select class="form-select" id="clienteCaso" required>
                                    <option value="" hidden>Seleccionar...</option>
                                    <option value="CLI-001">CLI-001</option>
                                    <option value="CLI-002">CLI-002</option>
                                </select>
                                <label for="clienteCaso" class="form-label">Cliente</label>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <div class="form-group form-floating">
                                <select class="form-select" id="tipoCaso" required>
                                    <option value="" hidden>Seleccionar...</option>
                                    <option value="Asesoria">Asesoría</option>
                                    <option value="Gestion Juridica">Gestión Jurídica</option>
                                </select>
                                <label for="tipoCaso" class="form-label">Tipo de Caso</label>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4">
                            <div class="form-group form-floating">
                                <input id="cotizacionInicialCaso" type="text" class="form-control" name="cotizacionInicialCaso" placeholder="john doe" autocomplete="off">
                                <label class="form-label" for="cotizacionInicialCaso">Cotización Inicial (Opcional)</label>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group form-floating">
                                <input id="descripcionCaso" type="text" class="form-control" name="descripcionCaso" placeholder="john doe" autocomplete="off" required>
                                <label class="form-label" for="descripcionCaso">Descripción del Caso</label>
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