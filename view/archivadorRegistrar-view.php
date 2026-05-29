<!DOCTYPE html>
<html lang="es">
    <head>
        <?php include ('view/includes/header.php'); ?>
        <?php include __DIR__ . '/includes/header.php'; ?>
        <title>Registrar Archivador</title>
    </head>
    <body>
        <?php include ('view/includes/sidebar.php'); ?>
        
        <?php include __DIR__ . '/includes/sidebar.php'; ?>
        <main class="main-content">
            <?php include ('view/includes/topbar.php'); ?>
            
            <section class="page__container">
                <div class="page__header">
                    <div class="page__header-titles">
                        <h2 class="page__header-title">Registrar Archivador</h2>
                        <span class="page__header-subtitle">Añade un archivador para documentos y expedientes</span>
            <?php include __DIR__ . '/includes/topbar.php'; ?>
            <section class="page__container">
                <div class="page__header">
                    <div class="page__header-titles">
                        <h2 class="page__header-title">Registrar Archivador</h2>
                        <span class="page__header-subtitle">Añade un archivador para documentos y expedientes</span>
                    </div>
                </div>
                <div class="page__content">
                    <form action="index.php?page=archivadorRegistrar" class="row p-4" method="POST">
                <div class="page-content">
                    <form action="src/controller/archivadorController.php" class="row p-4" method="POST">
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group form-floating">
                                <input id="numeroArchivador" type="text" class="form-control" name="numeroArchivador" placeholder="ARC-001" autocomplete="off" required>
                                <label class="form-label" for="numeroArchivador">Número de Archivador</label>
                            </div>
                        </div>
                        <div class="col-lg-6">
                        <div class="form-group form-floating">
                            <select class="form-select" name="estatusArchivador" id="estatusArchivador">
                                <option value="Activo">Activo</option>
                                <option value="Archivado">Archivado</option>
                            </select>
                            <label for="estatusArchivador">Estatus</label>
                        </div>
                    </div>
                        <div class="col-lg-12">
                            <div class="form-group form-floating">
                                <input id="descripcionArchivador" type="text" class="form-control" name="descripcionArchivador" placeholder="Descripción" autocomplete="off" required>
                                <label class="form-label" for="descripcionArchivador">Descripción</label>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center mt-4 gap-2 w-100">
                            <button type="submit" class="btn__primary">Registrar</button>
                        </div>
                    </form>
                </div>
            </section>
        </main>
        
        <?php include ('view/includes/footer.php'); ?>
        <?php include __DIR__ . '/includes/footer.php'; ?>
    </body>
</html>