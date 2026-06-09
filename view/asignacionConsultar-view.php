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
                                    <th class="text-center">Estatus</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($data)){
                                    foreach ($data as $asignacion){ ?>
                                        <tr>
                                            <td><?php echo $asignacion['codigoCaso']?></td>
                                            <td class="text-capitalize"><?php echo $asignacion['nombreAbogado']?></td>
                                            <td><?php echo $asignacion['modalidadCaso']?></td>
                                            <td><?php echo $asignacion['fechaAsignacionCasoAbogado']?></td>
                                            <td class="text-center">
                                                <span class="badge rounded-pill text-bg-secondary"><?php echo $asignacion['estatusAsignacionCasoAbogado']?></span>
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
