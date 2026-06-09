<!DOCTYPE html>
<html lang="es">
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
                    <form action="cliente" id="form" class="row p-4 gy-1" method="POST">
                        <div class="col-12">
                            <div class="form-group form-floating">
                                <select class="form-select" name="tipoCliente" id="tipoCliente" required>
                                    <option value="" hidden>Seleccionar...</option>
                                    <option value="natural">Natural</option>
                                    <option value="juridico">Jurídico</option>
                                </select>
                                <label for="tipoCliente" class="form-label">Tipo de Cliente</label>
                            </div>
                        </div>

                        <div id="campos-naturales" class="row d-none p-0 m-0">
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group form-floating">
                                    <input id="nombreCliente" type="text" class="form-control" name="nombreCliente" placeholder="john doe" minlength="3" maxlength="40" autocomplete="off" required>
                                    <label class="form-label" for="nombreCliente">Nombre</label>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group form-floating">
                                    <input id="apellidoCliente" type="text" class="form-control" name="apellidoCliente" placeholder="john doe" minlength="3" maxlength="40" autocomplete="off" required>
                                    <label class="form-label" for="apellidoCliente">Apellido</label>
                                </div>
                            </div>

                            <div class="col-lg-1 col-md-3 col-4">
                                <div class="form-group form-floating">
                                    <select class="form-select" name="nacionalidadCliente" id="nacionalidadCliente" required>
                                        <option value="V" selected>V</option>
                                        <option value="E">E</option>
                                    </select>
                                    <label for="nacionalidadCliente" class="form-label">Nac.</label>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-9 col-8">
                                <div class="form-group form-floating">
                                    <input id="cedulaCliente" type="text" class="form-control" name="cedulaCliente" placeholder="12345678" minlength="6" maxlength="10" autocomplete="off" required>
                                    <label class="form-label" for="cedulaCliente">Cédula de Identidad</label>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="form-group form-floating">
                                    <input id="fechaNacimientoCliente" type="date" class="form-control" name="fechaNacimientoCliente" placeholder="john doe" minlength="3" maxlength="10" autocomplete="off" required>
                                    <label class="form-label" for="fechaNacimientoCliente">Fecha de Nacimiento</label>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6">
                                <div class="form-group form-floating">
                                    <select class="form-select" name="estadoCivilCliente" id="estadoCivilCliente" required>
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

                        <div id="campos-juridicos" class="row d-none p-0 m-0">
                            <div class="col-lg-5 col-md-6">
                                <div class="form-group form-floating">
                                    <input id="razonSocialCliente" type="text" class="form-control" name="razonSocialCliente" placeholder="john doe" minlength="3" maxlength="200" autocomplete="off" required>
                                    <label class="form-label" for="razonSocialCliente">Razón Social</label>
                                </div>
                            </div>
                            <div class="col-lg-1 col-md-2 col-3">
                                <div class="form-group form-floating">
                                    <select class="form-select" name="tipoRifCliente" id="tipoRifCliente" required>
                                        <option value="J" selected>J</option>
                                        <option value="C">C</option>
                                    </select>
                                    <label for="tipoRifCliente" class="form-label">Tipo</label>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-9">
                                <div class="form-group form-floating">
                                    <input id="rifCliente" type="text" class="form-control" name="rifCliente" placeholder="john doe" minlength="3" maxlength="200" autocomplete="off" required>
                                    <label class="form-label" for="rifCliente">RIF</label>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="form-group form-floating">
                                    <input id="fechaConstitucionCliente" type="date" class="form-control" name="fechaConstitucionCliente" placeholder="john doe" minlength="3" maxlength="10" autocomplete="off" required>
                                    <label class="form-label" for="fechaConstitucionCliente">Fecha de Constitución</label>
                                </div>
                            </div>
                            <div class="col-12 mt-3">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span class="page__header-subtitle m-0">Representantes Legales</span>
                                    <button type="button" id="agregarRepresentante" class="btn__primary" <?php echo empty($representantes) ? 'disabled' : ''; ?>>Agregar Representante</button>
                                </div>
                                <?php if (empty($representantes)) { ?>
                                    <div class="alert alert-warning" role="alert">Debe registrar al menos un representante antes de asociarlo a un cliente jurídico.</div>
                                <?php } ?>
                            </div>

                            <div id="representantes-container" class="row p-0 m-0 w-100">
                                <div class="col-12 representante-row row p-0 m-0 gx-2 mb-1">
                                    <div class="col-lg-7 col-md-7">
                                        <div class="form-group form-floating">
                                            <select class="form-select representante-cedula" name="repCedula[]">
                                                <option value="" hidden>Seleccionar...</option>
                                                <?php if (!empty($representantes)) {
                                                    foreach ($representantes as $rep) { ?>
                                                        <option value="<?php echo $rep['cedulaRepresentante']?>"><?php echo $rep['nacionalidadRepresentante'].'-'.$rep['cedulaRepresentante'].' | '.$rep['nombreRepresentante'].' '.$rep['apellidoRepresentante']?></option>
                                                <?php } } ?>
                                            </select>
                                            <label class="form-label">Representante</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4">
                                        <div class="form-group form-floating">
                                            <input type="text" class="form-control representante-rol" name="repRol[]" placeholder="rol" minlength="3" maxlength="100" autocomplete="off">
                                            <label class="form-label">Rol</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-1 col-md-1 d-flex align-items-center justify-content-center">
                                        <button type="button" class="btn__table-delete quitar-representante" title="Quitar Representante">
                                            <svg width="0.9rem" height="0.9rem" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash2-icon lucide-trash-2">
                                                <path d="M10 11v6"/>
                                                <path d="M14 11v6"/>
                                                <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6"/>
                                                <path d="M3 6h18"/>
                                                <path d="M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="campos-comunes" class="row d-none p-0 m-0">
                            <div class="col-md-6">
                                <div class="form-group form-floating">
                                    <input id="telefonoCliente" type="text" class="form-control" name="telefonoCliente" placeholder="john doe" autocomplete="off" required>
                                    <label class="form-label" for="telefonoCliente">Número Teléfonico</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-floating">
                                    <input id="correoCliente" type="email" class="form-control" name="correoCliente" placeholder="john doe" autocomplete="off" required>
                                    <label class="form-label" for="correoCliente">Correo Electrónico</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group form-floating">
                                    <input id="direccionCliente" type="text" class="form-control" name="direccionCliente" placeholder="john doe" minlength="3" maxlength="200" autocomplete="off" required>
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