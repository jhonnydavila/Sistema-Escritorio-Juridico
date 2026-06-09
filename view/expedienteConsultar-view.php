<!DOCTYPE html>
<html lang="es">
    <head>
        <?php include('includes/header.php'); ?>
        <title>Consultar Expedientes</title>
    </head>
    <body>
        <?php include('includes/sidebar.php'); ?>
        <main class="main-content">
            <?php include('includes/topbar.php'); ?>
            <section class="page__container">
                <div class="page__header">
                    <div class="page__header-titles">
                        <h2 class="page__header-title">Consultar Expedientes</h2>
                        <span class="page__header-subtitle">Gestión de Expedientes</span>
                    </div>
                </div>
                <div class="page__content">
                    <div class="table__container">
                        <table id="table" class="table__content" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>N° Expediente</th>
                                    <th>Cliente</th>
                                    <th>Origen</th>
                                    <th>Fecha Apertura</th>
                                    <th>Archivador</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($data)){
                                    foreach ($data as $expediente){ ?>
                                        <tr>
                                            <td><?php echo $expediente['codigoExpediente']?></td>
                                            <td><?php echo !empty($expediente['numeroExpediente']) ? $expediente['numeroExpediente'] : 'Sin asignar'?></td>
                                            <td class="text-capitalize"><?php echo $expediente['nombreCliente']?></td>
                                            <td class="text-capitalize"><?php echo $expediente['origenExpediente']?></td>
                                            <td><?php echo $expediente['fechaAperturaExpediente']?></td>
                                            <td><?php echo !empty($expediente['nombreArchivador']) ? $expediente['nombreArchivador'] : 'Sin asignar'?></td>
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
