<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include('includes/header.php'); ?>
        <title>Registrar Cliente</title>
    </head>
    <body>
        <?php include ('includes/sidebar.php'); ?>
        
        <main class="main-content">
            <?php include ('includes/topbar.php'); ?>

            <section class="page__container">
                <div class="page__header">
                    <div class="page__header-titles">
                        <h2 class="page__header-title">Registrar Cliente</h2>
                        <span class="page__header-subtitle">Gestión de Clientes</span>
                    </div>
                </div>
                <div class="page__content">
                    <form action="controller/clienteController.php" id="form" class="row p-4" method="POST">
                        <div class="col-12">
                            <div class="form-group form-floating">
                                <select class="form-select" id="TipoCliente" required>
                                    <option value="">Seleccionar...</option>
                                    <option value="natural">Natural</option>
                                    <option value="juridico">Jurídico</option>
                                </select>
                                <label for="TipoCliente" class="form-label">Tipo de Cliente</label>
                            </div>
                        </div>

                        <div id="campos-naturales" class="row d-none p-0 m-0">
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group form-floating">
                                    <input id="NombreCliente" type="text" class="form-control" name="NombreCliente" placeholder="john doe" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]" minlength="3" maxlength="40" autocomplete="off" required>
                                    <label class="form-label" for="NombreCliente">Nombre</label>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group form-floating">
                                    <input id="ApellidoCliente" type="text" class="form-control" name="ApellidoCliente" placeholder="john doe" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]" minlength="3" maxlength="40" autocomplete="off" required>
                                    <label class="form-label" for="ApellidoCliente">Apellido</label>
                                </div>
                            </div>

                            <div class="col-lg-1 col-md-3 col-4">
                                <div class="form-group form-floating">
                                    <select class="form-select" name="NacionalidadCliente" id="NacionalidadCliente" required>
                                        <option value="V" selected>V</option>
                                        <option value="E">E</option>
                                    </select>
                                    <label for="NacionalidadCliente" class="form-label">Nac.</label>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-9 col-8">
                                <div class="form-group form-floating">
                                    <input id="CedulaCliente" type="text" class="form-control" name="CedulaCliente" placeholder="12345678" pattern="[0-9]+" minlength="6" maxlength="10" autocomplete="off" required>
                                    <label class="form-label" for="CedulaCliente">Cédula de Identidad</label>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="form-group form-floating">
                                    <input id="FechaNacimientoCliente" type="date" class="form-control" name="FechaNacimientoCliente" placeholder="john doe" minlength="3" maxlength="10" autocomplete="off" required>
                                    <label class="form-label" for="FechaNacimientoCliente">Fecha de Nacimiento</label>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6">
                                <div class="form-group form-floating">
                                    <select class="form-select" name="EstadoCivilCliente" id="EstadoCivilCliente" required>
                                        <option value="" hidden>Seleccionar...</option>
                                        <option value="casado">Casad@</option>
                                        <option value="divorciado">Divorciad@</option>
                                        <option value="soltero">Solter@</option>
                                        <option value="viudo">Viud@</option>
                                    </select>
                                    <label for="EstadoCivilCliente" class="form-label">Estado Civil</label>
                                </div>
                            </div>
                        </div>

                        <div id="campos-juridicos" class="row d-none p-0 m-0">
                            <div class="col-12">
                                <div class="form-group form-floating">
                                    <input id="RazonSocialCliente" type="text" class="form-control" name="RazonSocialCliente" placeholder="john doe" minlength="3" maxlength="200" autocomplete="off" required>
                                    <label class="form-label" for="RazonSocialCliente">Razón Social</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-floating">
                                    <input id="RifCliente" type="text" class="form-control" name="RifCliente" placeholder="john doe" minlength="3" maxlength="200" autocomplete="off" required>
                                    <label class="form-label" for="RifCliente">RIF</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-floating">
                                    <input id="CedulaRepresentanteCliente" type="text" class="form-control" name="CedulaRepresentanteCliente" placeholder="john doe" minlength="3" maxlength="10" autocomplete="off" required>
                                    <label class="form-label" for="CedulaRepresentanteCliente">Cédula del Representante Legal</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group form-floating">
                                    <input id="NombreRepresentanteCliente" type="text" class="form-control" name="NombreRepresentanteCliente" placeholder="john doe" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]" minlength="3" maxlength="40" autocomplete="off" required>
                                    <label class="form-label" for="NombreRepresentanteCliente">Nombre del Representante Legal</label>
                                </div>
                            </div>
                        </div>

                        <div id="campos-comunes" class="row d-none p-0 m-0">
                            <div class="col-md-6">
                                <div class="form-group form-floating">
                                    <input id="TelefonoCliente" type="text" class="form-control" name="TelefonoCliente" placeholder="john doe" autocomplete="off" required>
                                    <label class="form-label" for="TelefonoCliente">Número Teléfonico</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-floating">
                                    <input id="CorreoCliente" type="email" class="form-control" name="CorreoCliente" placeholder="john doe" autocomplete="off" required>
                                    <label class="form-label" for="CorreoCliente">Correo Electrónico</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group form-floating">
                                    <input id="DireccionCliente" type="text" class="form-control" name="DireccionCliente" placeholder="john doe" minlength="3" maxlength="200" autocomplete="off" required>
                                    <label class="form-label" for="DireccionCliente">Dirección de Residencia</label>
                                </div>
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