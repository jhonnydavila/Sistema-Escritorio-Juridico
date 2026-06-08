<!DOCTYPE html>
<html lang="es">
    <head>
        <?php include('includes/header.php'); ?>
        <title>Consultar Pagos</title>
    </head>
    <body>
        <?php include('includes/sidebar.php'); ?>
        <main class="main-content">
            <?php include('includes/topbar.php'); ?>
            <section class="page__container">
                <div class="page__header">
                    <div class="page__header-titles">
                        <h2 class="page__header-title">Consultar Pagos</h2>
                        <span class="page__header-subtitle">Historial de pagos registrados</span>
                    </div>
                </div>
                
                <div class="page__content">
                    <div class="page__tabs">
                        <button class="page__tab active" data-target="panel-confirmados">
                            <svg width="1.2rem" height="1.2rem" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check-circle">
                                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/>
                                <polyline points="22 4 12 14.01 9 11.01"/>
                            </svg>
                            <span>Pagos Confirmados</span>
                        </button>
                        <button class="page__tab" data-target="panel-revision">
                            <svg width="1.2rem" height="1.2rem" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-clock">
                                <circle cx="12" cy="12" r="10"/>
                                <polyline points="12 6 12 12 16 14"/>
                            </svg>
                            <span>Pendientes / Rechazados</span>
                        </button>
                    </div>
                    
                    <div class="page__panels-container w-100">
                        <div class="table__container page__tab-panel w-100" id="panel-confirmados" style="display: block;">
                            <table id="table" class="table__content" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Código Pago</th>
                                        <th>Código Honorario</th>
                                        <th>Concepto</th>
                                        <th>Monto</th>
                                        <th>Método</th>
                                        <th>Fecha y Hora</th>
                                        <th>Estatus</th>
                                        <th>Observaciones</th> <th class="text-center">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($data)){
                                        foreach ($data as $pago){ 
                                            if($pago['estatusPago'] == "Confirmado"){ ?>
                                                <tr>
                                                    <td><?php echo $pago['codigoPago']?></td>
                                                    <td><?php echo $pago['codigoHonorario']?></td>
                                                    <td><?php echo $pago['conceptoPago']?></td>
                                                    <td><?php echo number_format($pago['montoPago'], 2, '.', '')?></td>
                                                    <td>
                                                        <span class="badge rounded-pill <?php echo ($pago['metodoPago'] == "Transferencia") ? "text-bg-dark" : (($pago['metodoPago'] == "Efectivo") ? "text-bg-secondary" : "text-bg-primary"); ?>">
                                                            <?php echo $pago['metodoPago']?>
                                                        </span>
                                                    </td>
                                                    <td><?php echo date('Y-m-d H:i', strtotime($pago['fechaRegistroPago']))?></td>
                                                    <td><span class="badge rounded-pill text-bg-success"><?php echo $pago['estatusPago']?></span></td>
                                                    <td class="text-capitalize"><?php echo $pago['observacionesPago'] ?></td>
                                                    <td>
                                                        <div class="table__buttons">
                                                            <button class="btn__table-update" title="Modificar Pago">
                                                                <svg width="1rem" height="1rem" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-pencil-line"><path d="M13 21h8"/><path d="m15 5 4 4"/><path d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z"/></svg>
                                                            </button>
                                                            <button class="btn__table-delete" title="Eliminar Pago">
                                                                <svg width="0.9rem" height="0.9rem" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash-2"><path d="M10 11v6"/><path d="M14 11v6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6"/><path d="M3 6h18"/><path d="M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/></svg>
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

                        <div class="table__container page__tab-panel w-100" id="panel-revision" style="display: none;">
                            <table id="table" class="table__content" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Código Pago</th>
                                        <th>Código Honorario</th>
                                        <th>Concepto</th>
                                        <th>Monto</th>
                                        <th>Método</th>
                                        <th>Fecha y Hora</th>
                                        <th>Estatus</th>
                                        <th>Observaciones</th> <th class="text-center">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($data)){
                                        foreach ($data as $pago){ 
                                            if($pago['estatusPago'] != "Confirmado"){ ?>
                                                <tr>
                                                    <td><?php echo $pago['codigoPago']?></td>
                                                    <td><?php echo $pago['codigoHonorario']?></td>
                                                    <td><?php echo $pago['conceptoPago']?></td>
                                                    <td><?php echo number_format($pago['montoPago'], 2, '.', '')?></td>
                                                    <td>
                                                        <span class="badge rounded-pill <?php echo ($pago['metodoPago'] == "Transferencia") ? "text-bg-dark" : (($pago['metodoPago'] == "Efectivo") ? "text-bg-secondary" : "text-bg-primary"); ?>">
                                                            <?php echo $pago['metodoPago']?>
                                                        </span>
                                                    </td>
                                                    <td><?php echo date('Y-m-d H:i', strtotime($pago['fechaRegistroPago']))?></td>
                                                    <td><span class="badge rounded-pill <?php echo ($pago['estatusPago'] == "Pendiente") ? "text-bg-secondary" : "text-bg-danger"; ?>"><?php echo $pago['estatusPago']?></span></td>
                                                    <td class="text-capitalize"><?php echo $pago['observacionesPago']?></td>
                                                    <td>
                                                        <div class="table__buttons">
                                                            <button class="btn__table-update" title="Modificar Pago">
                                                                <svg width="1rem" height="1rem" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-pencil-line">
                                                                    <path d="M13 21h8"/>
                                                                    <path d="m15 5 4 4"/>
                                                                    <path d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z"/>
                                                                </svg>
                                                            </button>
                                                            <button class="btn__table-delete" title="Eliminar Pago">
                                                                <svg width="0.9rem" height="0.9rem" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash-2">
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
                    </div>
                </div>
            </section>
        </main>
        
        <?php include('includes/footer.php'); ?>
    </body>
</html>