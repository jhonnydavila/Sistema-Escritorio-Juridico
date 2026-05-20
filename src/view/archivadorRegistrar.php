<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include __DIR__ . '/includes/header.php'; ?>
        <title>Registrar Archivador</title>
    </head>
    <body>
        <?php include __DIR__ . '/includes/sidebar.php'; ?>
        <main class="main-content">
            <?php include __DIR__ . '/includes/topbar.php'; ?>
            <section class="page-container">
                <div class="page-header">
                    <div class="page-header-titles">
                        <h2 class="page-header-title">Registrar Archivador</h2>
                        <span class="page-header-subtitle">Añade un archivador para documentos y expedientes</span>
                    </div>
                </div>
                <div class="page-content">
                    <form action="src/controller/archivadorController.php" class="row p-4" method="POST">
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group form-floating">
                                <input id="codigoArchivador" type="text" class="form-control" name="codigoArchivador" placeholder="ARC-001" autocomplete="off" required>
                                <label class="form-label" for="codigoArchivador">Código de Archivador</label>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group form-floating">
                                <input id="nombreArchivador" type="text" class="form-control" name="nombreArchivador" placeholder="Archivador Central" autocomplete="off" required>
                                <label class="form-label" for="nombreArchivador">Nombre</label>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group form-floating">
                                <textarea id="descripcionArchivador" class="form-control" name="descripcionArchivador" placeholder="Descripción" style="height: 120px"></textarea>
                                <label class="form-label" for="descripcionArchivador">Descripción</label>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center mt-4 gap-2 w-100">
                            <button type="submit" class="btn btn-primary">Guardar Archivador</button>
                        </div>
                    </form>
                </div>
            </section>
        </main>
        <?php include __DIR__ . '/includes/footer.php'; ?>
    </body>
</html>