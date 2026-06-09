<!DOCTYPE html>
<html lang="es">
    <head>
        <?php include('includes/header.php'); ?>
        <title>Registrar Cliente</title>
    </head>
    <body>
        <?php include('includes/sidebar.php'); ?>
        
        <main class="main-content">
            <?php include('includes/topbar.php'); ?>

            <section class="page__container">
                <div class="page__header">
                    <div class="page__header-titles">
                        <h2 class="page__header-title">Registrar Cliente</h2>
                        <span class="page__header-subtitle">Gestión de Clientes</span>
                    </div>
                </div>
                <div class="page__content">
                    <form action="cliente" id="form" class="row p-4 gy-1" method="POST">
                        <div class="col-12">
                            <div class="form-group form-floating">
                                <select class="form-select" name="tipoCliente" id="tipoCliente">
                                    <option value="" hidden>Seleccionar...</option>
                                    <option value="natural">Natural</option>
                                    <option value="juridico">Jurídico</option>
                                </select>
                                <label for="tipoCliente" class="form-label">Tipo de Cliente</label>
                            </div>
                        </div>

                        <div id="campos-naturales" class="row d-none p-0 m-0 gy-1">
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group form-floating">
                                    <input id="nombreCliente" type="text" class="form-control" name="nombreCliente" placeholder="john doe" pattern="^[A-Za-zÁéíóúáéíóúÑñ ]+$" title="Solo se permiten letras y espacios." minlength="3" maxlength="40" autocomplete="off">
                                    <label class="form-label" for="nombreCliente">Nombre</label>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group form-floating">
                                    <input id="apellidoCliente" type="text" class="form-control" name="apellidoCliente" placeholder="john doe" pattern="^[A-Za-zÁéíóúáéíóúÑñ ]+$" title="Solo se permiten letras y espacios." minlength="3" maxlength="40" autocomplete="off">
                                    <label class="form-label" for="apellidoCliente">Apellido</label>
                                </div>
                            </div>

                            <div class="col-lg-1 col-md-3 col-4">
                                <div class="form-group form-floating">
                                    <select class="form-select" name="nacionalidadCliente" id="nacionalidadCliente">
                                        <option value="V" selected>V</option>
                                        <option value="E">E</option>
                                    </select>
                                    <label for="nacionalidadCliente" class="form-label">Nac.</label>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-9 col-8">
                                <div class="form-group form-floating">
                                    <input id="cedulaCliente" type="text" class="form-control" name="cedulaCliente" placeholder="12345678" pattern="^[0-9]{6,10}$" title="La cédula debe contener únicamente entre 6 y 10 dígitos numéricos, sin puntos." minlength="6" maxlength="10" autocomplete="off">
                                    <label class="form-label" for="cedulaCliente">Cédula de Identidad</label>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="form-group form-floating">
                                    <input id="fechaNacimientoCliente" type="date" class="form-control" name="fechaNacimientoCliente" placeholder="john doe" minlength="3" maxlength="10" autocomplete="off">
                                    <label class="form-label" for="fechaNacimientoCliente">Fecha de Nacimiento</label>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6">
                                <div class="form-group form-floating">
                                    <select class="form-select" name="estadoCivilCliente" id="estadoCivilCliente">
                                        <option value="" hidden>Seleccionar...</option>
                                        <option value="casado">Casad@</option>
                                        <option value="divorciado">Divorciad@</option>
                                        <option value="soltero">Solter@</option>
                                        <option value="viudo">Viud@</option>
                                    </select>
                                    <label for="estadoCivilCliente" class="form-label">Estado Civil</label>
                                </div>
                            </div>
                        </div>

                        <div id="campos-juridicos" class="row d-none p-0 m-0 gy-1">
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group form-floating">
                                    <input id="razonSocialCliente" type="text" class="form-control" name="razonSocialCliente" placeholder="john doe" pattern="^[A-Za-z0-9ÁéíóúáéíóúÑñ .,&\-]+$" title="La razón social admite letras, números y caracteres comerciales estándar (.,&-)." minlength="3" maxlength="200" autocomplete="off">
                                    <label class="form-label" for="razonSocialCliente">Razón Social</label>
                                </div>
                            </div>
                            <div class="col-lg-2 col-3">
                                <div class="form-group form-floating">
                                    <select class="form-select" name="tipoRifCliente" id="tipoRifCliente">
                                        <option value="J" selected>J</option>
                                        <option value="C">C</option>
                                    </select>
                                    <label for="tipoRifCliente" class="form-label">Tipo</label>
                                </div>
                            </div>
                            <div class="col-md-4 col-9">
                                <div class="form-group form-floating">
                                    <input id="rifCliente" type="text" class="form-control" name="rifCliente" placeholder="john doe" pattern="^[0-9]{9}$" title="El RIF debe constar exactamente de 9 dígitos numéricos, omitiendo el guion inicial." minlength="3" maxlength="200" autocomplete="off">
                                    <label class="form-label" for="rifCliente">RIF</label>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="form-group form-floating">
                                    <input id="fechaConstitucionCliente" type="date" class="form-control" name="fechaConstitucionCliente" placeholder="john doe" minlength="3" maxlength="10" autocomplete="off">
                                    <label class="form-label" for="fechaConstitucionCliente">Fecha de Constitución</label>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="form-group form-floating">
                                    <select class="form-select" name="cedulaRepresentante" id="cedulaRepresentante">
                                        <option value="" hidden>Seleccione una opción...</option>
                                        <?php
                                            if (!empty($dataRepresentantes)) {
                                                foreach ($dataRepresentantes as $representante) {
                                                    echo '<option value="' . htmlspecialchars($representante['cedulaRepresentante']) . '">' . htmlspecialchars($representante['cedulaRepresentante'] . ' - ' . $representante['nombreRepresentante'] . ' ' . $representante['apellidoRepresentante']) . '</option>';
                                                }
                                            }
                                        ?>
                                    </select>
                                    <label class="form-label" for="cedulaRepresentante">Representante Legal</label>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="form-group form-floating">
                                    <input id="rolRepresentante" type="text" class="form-control" name="rolRepresentante" placeholder="john doe" pattern="^[A-Za-zÁéíóúáéíóúÑñ ]+$" title="Solo letras y espacios." minlength="3" maxlength="40" autocomplete="off">
                                    <label class="form-label" for="rolRepresentante">Rol del Representante Legal</label>
                                </div>
                            </div>
                        </div>

                        <div id="campos-comunes" class="row d-none p-0 m-0 gy-1">
                            <div class="col-md-6">
                                <div class="form-group form-floating">
                                    <input id="telefonoCliente" type="text" class="form-control" name="telefonoCliente" placeholder="john doe" pattern="^0[24][0-9]{9}$" title="El número telefónico debe comenzar con 0 y tener exactamente 11 dígitos numéricos (Ej: 04141234567)." autocomplete="off">
                                    <label class="form-label" for="telefonoCliente">Número Teléfonico</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-floating">
                                    <input id="correoCliente" type="email" class="form-control" name="correoCliente" placeholder="john doe" pattern="^[a-zA-Z0-9._%+\-]+@[a-zA-Z0-9.\-]+\.[a-zA-Z]{2,}$" title="Introduce un correo electrónico válido." autocomplete="off">
                                    <label class="form-label" for="correoCliente">Correo Electrónico</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group form-floating">
                                    <input id="direccionCliente" type="text" class="form-control" name="direccionCliente" placeholder="john doe" pattern="^[A-Za-z0-9ÁéíóúáéíóúÑñ #,.\-]+$" title="La dirección permite letras, números y caracteres básicos (# , . -)." minlength="3" maxlength="200" autocomplete="off">
                                    <label class="form-label" for="direccionCliente">Dirección</label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="d-flex justify-content-center mt-4 gap-2 w-100">
                            <button type="submit" class="btn__primary" name="registrarCliente">Registrar</button>
                        </div>
                    </form>
                </div>
            </section>
        </main>

        <?php include ('includes/footer.php'); ?>
    </body>
</html>