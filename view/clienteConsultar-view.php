<!DOCTYPE html>
<html lang="es">
    <head>
        <?php include('includes/header.php'); ?>
        <title>Consultar Clientes</title>
    </head>
    <body>
        <?php include('includes/sidebar.php'); ?>
        <main class="main-content">
            <?php include('includes/topbar.php'); ?>
            <section class="page__container">
                <div class="page__header">
                    <div class="page__header-titles">
                        <h2 class="page__header-title">Consultar Clientes</h2>
                        <span class="page__header-subtitle">Gestión de Clientes</span>
                    </div>
                </div>
                <div class="page__content">
                    <div class="page__tabs">
                        <button class="page__tab active" data-target="panel-activos">
                            <svg width="1.2rem" height="1.2rem" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-archive-icon lucide-archive">
                                <rect width="20" height="5" x="2" y="3" rx="1"/>
                                <path d="M4 8v11a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8"/>
                                <path d="M10 12h4"/>
                            </svg>
                            <span>Clientes Activos</span>
                        </button>
                        <button class="page__tab" data-target="panel-inactivos">
                            <svg width="1.2rem" height="1.2rem" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-archive-x-icon lucide-archive-x">
                                <rect width="20" height="5" x="2" y="3" rx="1"/>
                                <path d="M4 8v11a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8"/>
                                <path d="m9.5 17 5-5"/><path d="m9.5 12 5 5"/>
                            </svg>
                            <span>Clientes Inactivos</span>
                        </button>
                    </div>

                    <div class="page__panels-container w-100">
                        
                        <div class="table__container page__tab-panel w-100" id="panel-activos" style="display: block;">
                            <table id="table" class="table__content" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Código</th>
                                        <th>Nombre / Razón Social</th>
                                        <th>Teléfono</th>
                                        <th>Correo Electrónico</th>
                                        <th>Dirección</th>
                                        <th>Tipo</th>
                                        <th class="text-center">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($data)){
                                        foreach ($data as $cliente){ 
                                            if($cliente['estatusCliente'] == "Activo"){ 
                                                $nombreMostrar = ($cliente['tipoCliente'] == 'natural') 
                                                    ? $cliente['nombreClienteNatural'] . " " . $cliente['apellidoClienteNatural'] 
                                                    : $cliente['razonSocialClienteJuridico'];
                                                ?>
                                                <tr class="text-capitalize">
                                                    <td><?php echo $cliente['codigoCliente']; ?></td>
                                                    <td><?php echo $nombreMostrar; ?></td>
                                                    <td><?php echo $cliente['numeroClienteTelefono']?></td>
                                                    <td class="text-lowercase"><?php echo $cliente['correoCliente']; ?></td>
                                                    <td><?php echo $cliente['direccionCliente']; ?></td>
                                                    <td>
                                                        <?php if ($cliente['tipoCliente'] == "natural") { ?>
                                                            <span class="badge rounded-pill text-bg-secondary">Natural</span>
                                                        <?php } else if ($cliente['tipoCliente'] == "juridico") { ?>
                                                            <span class="badge rounded-pill text-bg-dark">Jurídico</span>
                                                        <?php } ?>
                                                    </td>
                                                    <td>
                                                        <div class="table__buttons">
                                                            <button class="btn__table-view" title="Ver Cliente">
                                                                <svg width="1rem" height="1rem" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-eye-icon lucide-eye">
                                                                    <path d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0"/>
                                                                    <circle cx="12" cy="12" r="3"/>
                                                                </svg>
                                                            </button>
                                                            <button class="btn__table-update" title="Modificar Cliente">
                                                                <svg width="1rem" height="1rem" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-pencil-line-icon lucide-pencil-line">
                                                                    <path d="M13 21h8"/>
                                                                    <path d="m15 5 4 4"/>
                                                                    <path d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z"/>
                                                                </svg>
                                                            </button>
                                                            <button class="btn__table-delete" title="Desactivar Cliente">
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
                                            <?php } ?>
                                        <?php } ?>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>

                        <div class="table__container page__tab-panel w-100" id="panel-inactivos" style="display: none;">
                            <table id="table" class="table__content" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Código</th>
                                        <th>Nombre / Razón Social</th>
                                        <th>Teléfono</th>
                                        <th>Correo Electrónico</th>
                                        <th>Dirección</th>
                                        <th>Tipo</th>
                                        <th class="text-center">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($data)){
                                        foreach ($data as $cliente){ 
                                            if($cliente['estatusCliente'] == "Inactivo"){ 
                                                $nombreMostrar = ($cliente['tipoCliente'] == 'natural') 
                                                    ? $cliente['nombreClienteNatural'] . " " . $cliente['apellidoClienteNatural'] 
                                                    : $cliente['razonSocialClienteJuridico'];
                                                ?>
                                                <tr class="text-capitalize">
                                                    <td><?php echo $cliente['codigoCliente']; ?></td>
                                                    <td><?php echo $nombreMostrar; ?></td>
                                                    <td><?php echo $cliente['numeroClienteTelefono']?></td>
                                                    <td class="text-lowercase"><?php echo $cliente['correoCliente']; ?></td>
                                                    <td><?php echo $cliente['direccionCliente']; ?></td>
                                                    <td>
                                                        <?php if ($cliente['tipoCliente'] == "natural") { ?>
                                                            <span class="badge rounded-pill text-bg-secondary">Natural</span>
                                                        <?php } else if ($cliente['tipoCliente'] == "juridico") { ?>
                                                            <span class="badge rounded-pill text-bg-dark">Jurídico</span>
                                                        <?php } ?>
                                                    </td>
                                                    <td>
                                                        <div class="table__buttons">
                                                            <button class="btn__table-view" title="Ver Cliente">
                                                                <svg width="1rem" height="1rem" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-eye-icon lucide-eye">
                                                                    <path d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0"/>
                                                                    <circle cx="12" cy="12" r="3"/>
                                                                </svg>
                                                            </button>
                                                            <button class="btn__table-update" title="Modificar Cliente">
                                                                <svg width="1rem" height="1rem" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-pencil-line-icon lucide-pencil-line">
                                                                    <path d="M13 21h8"/>
                                                                    <path d="m15 5 4 4"/>
                                                                    <path d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z"/>
                                                                </svg>
                                                            </button>
                                                            <button class="btn__table-delete" title="Activar Cliente">
                                                                <svg width="0.9rem" height="0.9rem" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-rotate-ccw">
                                                                    <path d="M3 12a9 9 0 1 0 9-9 9.75 9.75 0 0 0-6.74 2.74L3 8"/>
                                                                    <path d="M3 3v5h5"/>
                                                                </svg>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        <?php } ?>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </section>
        </main>

        <?php include ('includes/footer.php'); ?>
    </body>
</html>