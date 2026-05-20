<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include('includes/header.php'); ?>
        <title>Registrar Documento</title>
    </head>
    <body>
        <?php include ('includes/sidebar.php'); ?>
        
        <main class="main-content">
            <?php include ('includes/topbar.php'); ?>

            <section class="page__container">
                <div class="page__header">
                    <div class="page__header-titles">
                        <h2 class="page__header-title">Registrar Documento</h2>
                        <span class="page__header-subtitle">Gestión de Documentos</span>
                    </div>
                </div>
                <div class="page__content">
                    <form action="controller/documentoController.php" id="form" class="row p-4" method="POST">
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group form-floating">
                                <select class="form-select" id="TipoDocumento" required>
                                    <option value="">Seleccionar...</option>
                                    <option value="imagen">Imagen</option>
                                    <option value="documento">Documento</option>
                                </select>
                                <label for="TipoDocumento" class="form-label">Tipo de Documento</label>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6">
                            <div class="form-group form-floating">
                                <input id="NombreDocumento" type="text" class="form-control" name="NombreDocumento" placeholder="john doe" minlength="3" maxlength="40" autocomplete="off" required>
                                <label class="form-label" for="NombreDocumento">Nombre</label>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group form-floating">
                                <input id="DescripcionDocumento" type="text" class="form-control" name="DescripcionDocumento" placeholder="john doe" minlength="3" maxlength="200" autocomplete="off">
                                <label class="form-label" for="DescripcionDocumento">Descripción del Documento</label>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6">
                            <input class="form-control" type="file" id="formFile">
                        </div>

                        <div class="col">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="checkDefault">
                                <label class="form-check-label" for="checkDefault">
                                    Anexar a un Expediente Existente
                                </label>
                            </div>
                        </div>
                        
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group form-floating">
                                <select class="form-select" id="ExpedienteDocumento" required>
                                    <option value="">Seleccionar...</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                </select>
                                <label for="ExpedienteDocumento" class="form-label">Expediente</label>
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

        <?php include ('includes/footer.php'); ?>
    </body>
</html>