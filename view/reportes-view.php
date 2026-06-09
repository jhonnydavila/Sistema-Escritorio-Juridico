<!DOCTYPE html>
<html lang="es">
    <head>
        <?php include('includes/header.php'); ?>
        <title>Reportes</title>
        <style media="print">
            .sidebar__container, .topbar, .page__tabs, .no-print { display: none !important; }
            .main-content { margin: 0 !important; width: 100% !important; }
            .page__container { padding: 0 !important; }
            .report__meta { display: block !important; }
        </style>
    </head>
    <body>
        <?php include('includes/sidebar.php'); ?>
        <main class="main-content">
            <?php include('includes/topbar.php'); ?>
            <section class="page__container">
                <div class="page__header">
                    <div class="page__header-titles">
                        <h2 class="page__header-title">Reportes</h2>
                        <span class="page__header-subtitle">Listados del Sistema</span>
                    </div>
                    <button type="button" class="btn__primary no-print" onclick="window.print()">Imprimir / Guardar PDF</button>
                </div>
                <div class="page__content">
                    <div class="page__tabs">
                        <button class="page__tab active" data-target="panel-casos"><span>Casos</span></button>
                        <button class="page__tab" data-target="panel-abogados"><span>Abogados</span></button>
                        <button class="page__tab" data-target="panel-tramites"><span>Trámites</span></button>
                        <button class="page__tab" data-target="panel-clientes"><span>Clientes</span></button>
                    </div>

                    <div class="page__panels-container w-100">
                        <div class="table__container page__tab-panel w-100" id="panel-casos" style="display: block;">
                            <h3 class="page__header-title">Reporte de Casos</h3>
                            <span class="page__header-subtitle report__meta">Generado el <?php echo date('d/m/Y H:i'); ?></span>
                            <div class="row g-3 my-2">
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="card__home">
                                        <div class="card__home-header">
                                            <div class="card__home-icon">
                                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 20V4a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/><rect width="20" height="14" x="2" y="6" rx="2"/></svg>
                                            </div>
                                            <h3>Casos</h3>
                                        </div>
                                        <div class="card__home-body">
                                            <p class="stats"><?php echo $totalCasos; ?></p>
                                            <span class="stats-label">Casos registrados</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <table class="table__content" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Código</th>
                                        <th>Cliente</th>
                                        <th>Modalidad</th>
                                        <th>N° Expediente</th>
                                        <th>Descripción</th>
                                        <th>Fecha Registro</th>
                                        <th>Estatus</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($dataCasos)){
                                        foreach ($dataCasos as $caso){ ?>
                                            <tr>
                                                <td><?php echo $caso['codigoCaso']?></td>
                                                <td class="text-capitalize"><?php echo $caso['nombreCliente']?></td>
                                                <td><?php echo $caso['modalidadCaso']?></td>
                                                <td><?php echo !empty($caso['numeroExpediente']) ? $caso['numeroExpediente'] : $caso['codigoExpediente']?></td>
                                                <td class="text-capitalize"><?php echo $caso['descripcionCaso']?></td>
                                                <td><?php echo $caso['fechaRegistroCaso']?></td>
                                                <td><?php echo $caso['estatusCaso']?></td>
                                            </tr>
                                    <?php } } ?>
                                </tbody>
                            </table>
                        </div>

                        <div class="table__container page__tab-panel w-100" id="panel-abogados" style="display: none;">
                            <h3 class="page__header-title">Reporte de Abogados</h3>
                            <span class="page__header-subtitle report__meta">Generado el <?php echo date('d/m/Y H:i'); ?></span>
                            <div class="row g-3 my-2">
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="card__home">
                                        <div class="card__home-header">
                                            <div class="card__home-icon">
                                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                                            </div>
                                            <h3>Abogados</h3>
                                        </div>
                                        <div class="card__home-body">
                                            <p class="stats"><?php echo $totalAbogados; ?></p>
                                            <span class="stats-label">Abogados registrados</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <table class="table__content" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Cédula</th>
                                        <th>Nombre</th>
                                        <th>Teléfono</th>
                                        <th>Correo Electrónico</th>
                                        <th>Casos Atendidos</th>
                                        <th>Estatus</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($dataAbogados)){
                                        foreach ($dataAbogados as $abogado){ ?>
                                            <tr>
                                                <td><?php echo $abogado['nacionalidadAbogado'].'-'.$abogado['cedulaAbogado']?></td>
                                                <td class="text-capitalize"><?php echo $abogado['nombreAbogado'].' '.$abogado['apellidoAbogado']?></td>
                                                <td><?php echo $abogado['telefonoAbogado']?></td>
                                                <td><?php echo $abogado['correoAbogado']?></td>
                                                <td><?php echo $abogado['totalCasos']?></td>
                                                <td><?php echo $abogado['estatusAbogado']?></td>
                                            </tr>
                                    <?php } } ?>
                                </tbody>
                            </table>
                        </div>

                        <div class="table__container page__tab-panel w-100" id="panel-tramites" style="display: none;">
                            <h3 class="page__header-title">Reporte de Trámites</h3>
                            <span class="page__header-subtitle report__meta">Generado el <?php echo date('d/m/Y H:i'); ?></span>
                            <div class="row g-3 my-2">
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="card__home">
                                        <div class="card__home-header">
                                            <div class="card__home-icon">
                                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><path d="M14 2v6h6"/><path d="M16 13H8"/><path d="M16 17H8"/></svg>
                                            </div>
                                            <h3>Trámites</h3>
                                        </div>
                                        <div class="card__home-body">
                                            <p class="stats"><?php echo $totalTramites; ?></p>
                                            <span class="stats-label">Trámites registrados</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <table class="table__content" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Código</th>
                                        <th>Nombre</th>
                                        <th>Descripción</th>
                                        <th>Monto Base</th>
                                        <th>Estatus</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($dataTramites)){
                                        foreach ($dataTramites as $tramite){ ?>
                                            <tr>
                                                <td><?php echo $tramite['codigoTramite']?></td>
                                                <td class="text-capitalize"><?php echo $tramite['nombreTramite']?></td>
                                                <td class="text-capitalize"><?php echo $tramite['descripcionTramite']?></td>
                                                <td><?php echo number_format((float)$tramite['montoBaseTramite'], 2, ',', '.')?></td>
                                                <td><?php echo $tramite['estatusTramite']?></td>
                                            </tr>
                                    <?php } } ?>
                                </tbody>
                            </table>
                        </div>

                        <div class="table__container page__tab-panel w-100" id="panel-clientes" style="display: none;">
                            <h3 class="page__header-title">Reporte de Clientes</h3>
                            <span class="page__header-subtitle report__meta">Generado el <?php echo date('d/m/Y H:i'); ?></span>
                            <div class="row g-3 my-2">
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="card__home">
                                        <div class="card__home-header">
                                            <div class="card__home-icon">
                                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                                            </div>
                                            <h3>Clientes</h3>
                                        </div>
                                        <div class="card__home-body">
                                            <p class="stats"><?php echo $totalClientes; ?></p>
                                            <span class="stats-label">Clientes registrados</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="card__home">
                                        <div class="card__home-header">
                                            <div class="card__home-icon">
                                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                                            </div>
                                            <h3>Naturales</h3>
                                        </div>
                                        <div class="card__home-body">
                                            <p class="stats"><?php echo $clientesNaturales; ?></p>
                                            <span class="stats-label">Clientes naturales</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="card__home">
                                        <div class="card__home-header">
                                            <div class="card__home-icon">
                                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 21h18"/><path d="M5 21V7l8-4v18"/><path d="M19 21V11l-6-4"/></svg>
                                            </div>
                                            <h3>Jurídicos</h3>
                                        </div>
                                        <div class="card__home-body">
                                            <p class="stats"><?php echo $clientesJuridicos; ?></p>
                                            <span class="stats-label">Clientes jurídicos</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <table class="table__content" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Código</th>
                                        <th>Nombre</th>
                                        <th>Documento</th>
                                        <th>Teléfono</th>
                                        <th>Correo Electrónico</th>
                                        <th>Tipo</th>
                                        <th>Estatus</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($dataClientes)){
                                        foreach ($dataClientes as $cliente){ ?>
                                            <tr>
                                                <td><?php echo $cliente['codigoCliente']?></td>
                                                <td class="text-capitalize"><?php echo $cliente['nombreCliente']?></td>
                                                <td><?php echo $cliente['documentoCliente']?></td>
                                                <td><?php echo $cliente['numeroClienteTelefono']?></td>
                                                <td><?php echo $cliente['correoCliente']?></td>
                                                <td><?php echo $cliente['tipoCliente']?></td>
                                                <td><?php echo $cliente['estatusCliente']?></td>
                                            </tr>
                                    <?php } } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <?php include('includes/footer.php'); ?>
    </body>
</html>
