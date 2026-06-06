<!DOCTYPE html>
<html lang="es">
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
                        <span class="page__header-subtitle">Ingrese los datos para registrar un nuevo documento</span>
                    </div>
                </div>
                <div class="page__content">
                    <form action="documento" id="form" class="row p-4 gy-1" method="POST" enctype="multipart/form-data">
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group form-floating">
                                <select class="form-select" id="tipoDocumento" name="tipoDocumento" required>
                                    <option value="" hidden>Seleccionar Tipo de Archivo...</option>
                                    <option value="imagen">Imagen</option>
                                    <option value="documento">Documento</option>
                                </select>
                                <label for="tipoDocumento" class="form-label">Tipo de Documento</label>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6">
                            <div class="form-group form-floating">
                                <input id="nombreDocumento" type="text" class="form-control" name="nombreDocumento" placeholder="john doe" minlength="3" maxlength="40" autocomplete="off" required>
                                <label class="form-label" for="nombreDocumento">Nombre</label>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group form-floating">
                                <input id="descripcionDocumento" type="text" class="form-control" name="descripcionDocumento" placeholder="john doe" minlength="3" maxlength="200" autocomplete="off">
                                <label class="form-label" for="descripcionDocumento">Descripción</label>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 mt-4">
                            <input class="form-control" type="file" id="formFile" name="archivoDocumento" required>
                        </div>

                        <div class="d-flex justify-content-center mt-4 gap-2 w-100">
                            <button type="submit" class="btn__primary" name="registrarDocumento">Registrar</button>
                        </div>
                    </form>
                </div>
            </section>
        </main>
        <?php include ('includes/footer.php'); ?>
    </body>
</html>