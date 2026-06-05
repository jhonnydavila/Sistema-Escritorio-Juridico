<!DOCTYPE html>
<html lang="es">
    <head>
        <?php include ('includes/header.php'); ?>
        <title>Registrar Archivador</title>
    </head>
    <body>
        <?php include ('includes/sidebar.php'); ?>
        <main class="main-content">
            <?php include('includes/topbar.php'); ?>
            <section class="page__container">
                <div class="page__header">
                    <div class="page__header-titles">
                        <h2 class="page__header-title">Registrar Archivador</h2>
                        <span class="page__header-subtitle">Añade un archivador para documentos y expedientes</span>
                    </div>
                </div>
                <div class="page__content">
                    <form action="archivador" class="row p-4 gy-1" id="form" method="POST">
                        
                        <div class="col-md-6">
                            <div class="form-group form-floating">
                                <input id="nombreArchivador" type="text" class="form-control" name="nombreArchivador" placeholder="Archivador Central" autocomplete="off" required>
                                <label class="form-label" for="nombreArchivador">Nombre</label>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group form-floating">
                                <input id="descripcionArchivador" type="text" class="form-control" name="descripcionArchivador" placeholder="Descripción" autocomplete="off" required>
                                <label class="form-label" for="descripcionArchivador">Descripción</label>
                            </div>
                        </div>
                        
                        <div class="d-flex justify-content-center mt-4 gap-2 w-100">
                            <button type="submit" class="btn__primary" name="registrarArchivador">Registrar</button>
                        </div>
                    </form>
                </div>
            </section>
        </main>
        <?php include('includes/footer.php'); ?>
    </body>
</html>