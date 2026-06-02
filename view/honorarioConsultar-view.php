<!DOCTYPE html>
<html lang="es">
    <head>
        <?php include('includes/header.php'); ?>
        <title>Consultar Honorarios</title>
    </head>
    <body>
        <?php include('includes/sidebar.php'); ?>
        <main class="main-content">
            <?php include('includes/topbar.php'); ?>
            <section class="page__container">
                <div class="page__header">
                    <div class="page__header-titles">
                        <h2 class="page__header-title">Consultar Honorarios</h2>
                        <span class="page__header-subtitle">Historial de honorarios y pagos registrados</span>
                    </div>
                </div>
                <div class="page__content">
                    <div class="table__container">
                        <table id="table" class="table__content">
                            <thead>
                                <tr>
                                    <th>Código Honorario</th>
                                    <th>Código Caso</th>
                                    <th>Fecha de Acuerdo</th>
                                    <th>Monto Total Pactado</th>
                                    <th>Monto Restante</th>
                                    <th>Monto Pagado</th>
                                    <th>Estatus</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($data)) {
                                    foreach ($data as $honorario) { ?>
                                        <tr>
                                            <td><?php echo $honorario['codigoHonorario']; ?></td>
                                            <td><?php echo $honorario['codigoCaso']; ?></td>
                                            <td><?php echo $honorario['fechaAcuerdoHonorario']; ?></td>
                                            <td><?php echo number_format($honorario['montoTotalPactado'], 2); ?></td>
                                                <?php if ($honorario['montoRestante'] < 0 ) { ?>
                                            <td>0</td>
                                                <?php } else { ?>
                                                    <?php echo number_format($honorario['montoRestante'], 2); ?></span>
                                                <?php } ?>
                                            <td><?php echo number_format($honorario['montoPagado'], 2); ?></td>
                                            <td>
                                                <?php if ($honorario['estatusHonorario'] == 'Confirmado') { ?>
                                                    <span class="badge rounded-pill text-bg-success"><?php echo $honorario['estatusHonorario']; ?></span>
                                                <?php } else { ?>
                                                    <span class="badge rounded-pill text-bg-secondary"><?php echo $honorario['estatusHonorario']; ?></span>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <div class="table__buttons">
                                                    <button class="btn__table-view" title="Ver Pagos Recibidos">
                                                        <svg width="1rem" height="1rem" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-eye-icon lucide-eye">
                                                            <path d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0"/>
                                                            <circle cx="12" cy="12" r="3"/>
                                                        </svg>
                                                    </button>
                                                    <button class="btn__table-update" title="Modificar Honorario">
                                                        <svg width="1rem" height="1rem" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-pencil-line-icon lucide-pencil-line">
                                                            <path d="M13 21h8"/>
                                                            <path d="m15 5 4 4"/>
                                                            <path d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z"/>
                                                        </svg>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php } 
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </main>
        <?php include('includes/footer.php'); ?>
    </body>
</html>