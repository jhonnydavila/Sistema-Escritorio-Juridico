<!DOCTYPE html>
<html lang="es">
    <head>
        <?php include('includes/header.php'); ?>
        <title>Registrar Representante</title>
    </head>
    <body>
        <?php include('includes/sidebar.php'); ?>
        <main class="main-content">
            <?php include('includes/topbar.php'); ?>
            <section class="page__container">
                <div class="page__header">
                    <div class="page__header-titles">
                        <h2 class="page__header-title">Registrar Representante</h2>
                        <span class="page__header-subtitle">Gestión de Representantes</span>
                    </div>
                </div>
                <div class="page__content">
                    <form action="representante" id="form" class="row p-4 gy-1" method="POST">
                        <div class="col-md-6">
                            <div class="form-group form-floating">
                                <input id="nombreRepresentante" type="text" class="form-control" name="nombreRepresentante" placeholder="john doe" minlength="3" maxlength="40" autocomplete="off" required>
                                <label class="form-label" for="nombreRepresentante">Nombre</label>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group form-floating">
                                <input id="apellidoRepresentante" type="text" class="form-control" name="apellidoRepresentante" placeholder="john doe" minlength="3" maxlength="40" autocomplete="off" required>
                                <label class="form-label" for="apellidoRepresentante">Apellido</label>
                            </div>
                        </div>

                        <div class="col-md-1 col-4">
                            <div class="form-group form-floating">
                                <select class="form-select" name="nacionalidadRepresentante" id="nacionalidadRepresentante" required>
                                    <option value="V" selected>V</option>
                                    <option value="E">E</option>
                                </select>
                                <label for="nacionalidadRepresentante" class="form-label">Nac.</label>
                            </div>
                        </div>

                        <div class="col-md-5 col-8">
                            <div class="form-group form-floating">
                                <input id="cedulaRepresentante" type="text" class="form-control" name="cedulaRepresentante" placeholder="john doe" minlength="3" maxlength="9" autocomplete="off" required>
                                <label class="form-label" for="cedulaRepresentante">Cédula de Identidad</label>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group form-floating">
                                <input id="telefonoRepresentante" type="text" class="form-control" name="telefonoRepresentante" placeholder="john doe" maxlength="12" autocomplete="off" required>
                                <label class="form-label" for="telefonoRepresentante">Número Teléfonico</label>
                            </div>
                        </div>

                        <div class="d-flex justify-content-center mt-4 gap-2 w-100">
                            <button type="submit" class="btn__primary" name="registrarRepresentante">Registrar</button>
                        </div>
                    </form>
                </div>
            </section>
        </main>

        <?php include('includes/footer.php'); ?>
    </body>
</html>
