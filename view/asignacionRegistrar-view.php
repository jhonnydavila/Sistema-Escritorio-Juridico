<!DOCTYPE html>
<html lang="es">
    <head>
        <?php include('includes/header.php'); ?>
        <title>Registrar Asignación</title>
    </head>
    <body>
        <?php include('includes/sidebar.php'); ?>
        <main class="main-content">
            <?php include('includes/topbar.php'); ?>

            <section class="page__container">
                <div class="page__header">
                    <div class="page__header-titles">
                        <h2 class="page__header-title">Registrar Asignación</h2>
                        <span class="page__header-subtitle">Gestión de Asignaciones</span>
                    </div>
                </div>
                <div class="page__content">
                    <form action="asignacion" id="form" class="row p-4 gy-1" method="POST">
                        <input type="text" name="registrar" hidden required>
                        
                        <div class="col-md-6">
                            <div class="form-group form-floating">
                                <select class="form-select" id="codigoCaso" required>
                                    <option value="" hidden>Seleccionar...</option>
                                    <option value="CLI-001">CLI-001</option>
                                    <option value="CLI-002">CLI-002</option>
                                </select>
                                <label for="codigoCaso" class="form-label">Caso</label>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group form-floating">
                                <select class="form-select" id="casoAbogado" name="casoAbogado" required>
                                    <option value="" hidden>Seleccionar...</option>
                                    <option value="Asesoria">Asesoría</option>
                                    <option value="Gestion Juridica">Gestión Jurídica</option>
                                </select>
                                <label for="casoAbogado" class="form-label">Abogado</label>
                            </div>
                        </div>

                        <div class="d-flex justify-content-center mt-4 gap-2 w-100">
                            <button type="submit" class="btn__primary" name="registrarAsignacion">Registrar</button>
                        </div>
                    </form>
                </div>
            </section>
        </main>

        <?php include ('includes/footer.php'); ?>
    </body>
</html>