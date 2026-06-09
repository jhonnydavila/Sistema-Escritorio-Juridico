<!DOCTYPE html>
<html lang="es">
    <head>
        <?php include('includes/header.php'); ?>
        <title>Registrar Asignación</title>
    </head>
    <body>
        <?php include('includes/sidebar.php'); ?>
        <main class="main-content">
            <?php include('includes/topbar.php'); ?>
            <section class="page__container">
                <div class="page__header">
                    <div class="page__header-titles">
                        <h2 class="page__header-title">Registrar Asignación</h2>
                        <span class="page__header-subtitle">Gestión de Asignaciones</span>
                    </div>
                </div>
                <div class="page__content">
                    <form action="asignacion" id="form" class="row p-4 gy-1" method="POST">
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group form-floating">
                                <select class="form-select" name="cedulaAbogado" id="cedulaAbogado" required>
                                    <option value="" hidden>Seleccionar...</option>
                                    <?php if (!empty($dataAbogados)) {
                                        foreach ($dataAbogados as $abogado) {
                                            if ($abogado['estatusAbogado'] == 'Activo') { ?>
                                                <option value="<?php echo $abogado['cedulaAbogado']?>"><?php echo $abogado['nombreAbogado'].' '.$abogado['apellidoAbogado'].' ('.$abogado['nacionalidadAbogado'].'-'.$abogado['cedulaAbogado'].')'?></option>
                                    <?php } } } ?>
                                </select>
                                <label for="cedulaAbogado" class="form-label">Abogado</label>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6">
                            <div class="form-group form-floating">
                                <select class="form-select" name="codigoCaso" id="codigoCaso" required>
                                    <option value="" hidden>Seleccionar...</option>
                                    <?php if (!empty($dataCasos)) {
                                        foreach ($dataCasos as $caso) {
                                            if ($caso['estatusCaso'] == 'Activo') { ?>
                                                <option value="<?php echo $caso['codigoCaso']?>"><?php echo $caso['codigoCaso'].' - '.$caso['nombreCliente'].' ('.$caso['modalidadCaso'].')'?></option>
                                    <?php } } } ?>
                                </select>
                                <label for="codigoCaso" class="form-label">Caso</label>
                            </div>
                        </div>

                        <div class="d-flex justify-content-center mt-4 gap-2 w-100">
                            <button type="submit" class="btn__primary" name="registrarAsignacion">Registrar</button>
                        </div>
                    </form>
                </div>
            </section>
        </main>
        <?php include('includes/footer.php'); ?>
    </body>
</html>
