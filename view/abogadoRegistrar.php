<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include('includes/header.php'); ?>
        <title>Registrar Abogado</title>
    </head>
    <body>
        <?php include ('includes/sidebar.php'); ?>
        
        <main class="main-content">
            <?php include ('includes/topbar.php'); ?>

            <section class="page__container">
                <div class="page__header">
                    <div class="page__header-titles">
                        <h2 class="page__header-title">Registrar Abogado</h2>
                        <span class="page__header-subtitle">Gestión de Abogados</span>
                    </div>
                </div>
                <div class="page__content">
                    <form action="controller/abogadoController.php" id="form" class="row p-4" method="POST">

                        <input type="text" name="registrarAbogado" hidden>

                        <div class="col-md-6">
                            <div class="form-group form-floating">
                                <input id="NombreAbogado" type="text" class="form-control" name="NombreAbogado" placeholder="john doe" minlength="3" maxlength="40" autocomplete="off">
                                <label class="form-label" for="NombreAbogado">Nombre</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-floating">
                                <input id="ApellidoAbogado" type="text" class="form-control" name="ApellidoAbogado" placeholder="john doe" minlength="3" maxlength="40" autocomplete="off">
                                <label class="form-label" for="ApellidoAbogado">Apellido</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-floating">
                                <input id="CedulaAbogado" type="text" class="form-control" name="CedulaAbogado" placeholder="john doe" minlength="3" maxlength="10" autocomplete="off">
                                <label class="form-label" for="CedulaAbogado">Cédula de Identidad</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-floating">
                                <input id="TelefonoAbogado" type="text" class="form-control" name="TelefonoAbogado" placeholder="john doe" autocomplete="off">
                                <label class="form-label" for="TelefonoAbogado">Número Teléfonico</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-floating">
                                <input id="CorreoAbogado" type="email" class="form-control" name="CorreoAbogado" placeholder="john doe" autocomplete="off">
                                <label class="form-label" for="CorreoAbogado">Correo Electrónico</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-floating">
                                <input id="DireccionAbogado" type="text" class="form-control" name="DireccionAbogado" placeholder="john doe" minlength="3" maxlength="200" autocomplete="off">
                                <label class="form-label" for="DireccionAbogado">Dirección de Residencia</label>
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