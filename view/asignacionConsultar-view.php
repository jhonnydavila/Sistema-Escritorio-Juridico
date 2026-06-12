<!DOCTYPE html>
<html lang="es">
    <head>
        <?php include('includes/header.php'); ?>
        <title>Consultar Asignaciones</title>
    </head>
    <body>
        <?php include('includes/sidebar.php'); ?>
        <main class="main-content">
            <?php include('includes/topbar.php'); ?>
            <section class="page__container">
                <div class="page__header">
                    <div class="page__header-titles">
                        <h2 class="page__header-title">Consultar Asignaciones</h2>
                        <span class="page__header-subtitle">Gestión de Asignaciones</span>
                    </div>
                </div>
                <div class="page__content">
                    <div class="table__container">
                        <table id="table" class="table__content" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>Caso</th>
                                    <th>Abogado</th>
                                    <th>Modalidad</th>
                                    <th>Fecha Asignación</th>
                                    <th>Fecha Cierre</th>
                                    <th class="text-center">Estatus</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($data)){
                                    foreach ($data as $asignacion){ ?>
                                        <tr class="text-capitalize">
                                            <td><?php echo $asignacion['codigoCaso']?></td>
                                            <td><?php echo $asignacion['nombreAbogado'].' '.$asignacion['apellidoAbogado']?></td>
                                            <td><?php echo $asignacion['modalidadCaso']?></td>
                                            <td><?php echo $asignacion['fechaAsignacionCasoAbogado']?></td>

                                            <?php if (isset($asignacion['fechaCierreCasoAbogado']) && !empty($asignacion['fechaCierreCasoAbogado'])) { ?>
                                                <td><?php echo $asignacion['fechaCierreCasoAbogado']?></td>
                                            <?php } else { ?>
                                                <td><span class="text-muted">- -</span></td>
                                            <?php } ?>
                                            
                                            <td class="text-center">
                                                <?php if ($asignacion['estatusAsignacionCasoAbogado']=='Activa') { ?>
                                                    <span class="badge rounded-pill text-bg-success"><?php echo $asignacion['estatusAsignacionCasoAbogado']?></span>
                                                <?php } else if ($asignacion['estatusAsignacionCasoAbogado']=='pendiente') { ?>
                                                    <span class="badge rounded-pill text-bg-secondary"><?php echo $asignacion['estatusAsignacionCasoAbogado']?></span>
                                                <?php } else if ($asignacion['estatusAsignacionCasoAbogado']=='finalizada') { ?>
                                                    <span class="badge rounded-pill text-bg-danger"><?php echo $asignacion['estatusAsignacionCasoAbogado']?></span>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                <?php } } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </main>
        <?php include('includes/footer.php'); ?>
    </body>
</html>
