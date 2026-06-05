<!DOCTYPE html>
<html lang="es">
    <head>
        <?php include('includes/header.php'); ?>
        <title>Gestión de Clientes</title>
    </head>
    <body>
        <?php include ('includes/sidebar.php'); ?>
        
        <main class="main-content">
            <?php include ('includes/topbar.php'); ?>

            <section class="page__container">
                <div class="page__header">
                    <div class="page__header-titles">
                        <h2 class="page__header-title">Gestión de Clientes</h2>
                        <span class="page__header-subtitle">Gestión de Clientes</span>
                    </div>
                    <div class="page__header-actions">
                        <button class="btn__primary" data-bs-toggle="modal" data-bs-target="#registrarCliente">
                            <svg width="1.2rem" height="1.2rem" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-plus-icon lucide-plus">
                                <path d="M12 5v14"/>
                                <path d="M5 12h14"/>
                            </svg>
                            Registrar Cliente
                        </button>
                    </div>
                </div>
                <div class="page__content">
                    <div class="page__tabs">
                        <button class="page__tab active" data-status="Activo">
                            <svg width="1.2rem" height="1.2rem" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-archive-icon lucide-archive">
                                <rect width="20" height="5" x="2" y="3" rx="1"/>
                                <path d="M4 8v11a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8"/>
                                <path d="M10 12h4"/>
                            </svg>
                            <span>Clientes Activos</span>
                        </button>
                        <button class="page__tab" data-status="Inactivo">
                            <svg width="1.2rem" height="1.2rem" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-archive-x-icon lucide-archive-x">
                                <rect width="20" height="5" x="2" y="3" rx="1"/>
                                <path d="M4 8v11a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8"/>
                                <path d="m9.5 17 5-5"/><path d="m9.5 12 5 5"/>
                            </svg>
                            <span>Clientes Inactivos</span>
                        </button>
                    </div>
                    <div class="table__container">
                        <table id="table" class="table__content" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Nombre</th>
                                    <th>Teléfono</th>
                                    <th>Correo Electrónico</th>
                                    <th>Dirección</th>
                                    <th>Tipo de Cliente</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>CLNA-01</td>
                                    <td>Javier Paredes Gómez</td>
                                    <td>+58 412-5551234</td>
                                    <td>javierparedes@gmail.com</td>
                                    <td>Quibor</td>
                                    <td><span class="badge rounded-pill text-bg-secondary">Natural</span></td>
                                    <td>
                                        <div class="table__buttons">
                                            <button class="btn__table-view">
                                                <svg width="1rem" height="1rem" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-eye-icon lucide-eye">
                                                    <path d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0"/>
                                                    <circle cx="12" cy="12" r="3"/>
                                                </svg>
                                            </button>
                                            <button class="btn__table-update">
                                                <svg width="1rem" height="1rem" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-pencil-line-icon lucide-pencil-line"><path d="M13 21h8"/>
                                                    <path d="m15 5 4 4"/>
                                                    <path d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z"/>
                                                </svg>
                                            </button>
                                            <button class="btn__table-delete">
                                                <svg width="0.9rem" height="0.9rem" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash2-icon lucide-trash-2">
                                                    <path d="M10 11v6"/>
                                                    <path d="M14 11v6"/>
                                                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6"/>
                                                    <path d="M3 6h18"/>
                                                    <path d="M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>CLJU-02</td>
                                    <td>Cafe El Pepe</td>
                                    <td>+58 412-1233463</td>
                                    <td>pepes@gmail.com</td>
                                    <td>Av 20 Calle 10</td>
                                    <td><span class="badge rounded-pill text-bg-dark">Juridico</span></td>
                                    <td>
                                        <div class="table__buttons">
                                            <button class="btn__table-view">
                                                <svg width="1rem" height="1rem" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-eye-icon lucide-eye">
                                                    <path d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0"/>
                                                    <circle cx="12" cy="12" r="3"/>
                                                </svg>
                                            </button>
                                            <button class="btn__table-update">
                                                <svg width="1rem" height="1rem" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-pencil-line-icon lucide-pencil-line"><path d="M13 21h8"/>
                                                    <path d="m15 5 4 4"/>
                                                    <path d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z"/>
                                                </svg>
                                            </button>
                                            <button class="btn__table-delete">
                                                <svg width="0.9rem" height="0.9rem" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash2-icon lucide-trash-2">
                                                    <path d="M10 11v6"/>
                                                    <path d="M14 11v6"/>
                                                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6"/>
                                                    <path d="M3 6h18"/>
                                                    <path d="M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </main>

        <?php (include 'view/includes/footer.php'); ?>
    </body>
</html>

<div class="modal fade" id="registrarCliente" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="max-width: 560px;">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title fs-5">Registrar Cliente</h2>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="controller/clienteController.php" id="form" class="row py-2 px-4" method="POST">
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
                        <button type="submit" class="btn__primary">Registrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>