<!DOCTYPE html>
<html lang="es">
    <head>
        <?php include('includes/header.php'); ?>
        <title>Registrar Acuerdo de Honorario</title>
    </head>
    <body>
        <?php include('includes/sidebar.php'); ?>
        <main class="main-content">
            <?php include('includes/topbar.php'); ?>
            <section class="page__container">
                <div class="page__header">
                    <div class="page__header-titles">
                        <h2 class="page__header-title">Registrar Honorario</h2>
                        <span class="page__header-subtitle">Establece el monto total inicial de un caso civil</span>
                    </div>
                </div>
                <div class="page__content">
                    <form action="honorario" id="form" class="row p-4 gy-1" method="POST">
                        <div class="col-md-6">
                            <div class="form-group form-floating">
                                <select class="form-select" id="codigoCaso" name="codigoCaso" required title="Seleccione el caso legal vinculado a este acuerdo de honorarios">
                                    <option value="" hidden>Seleccionar Caso...</option>
                                    <?php if (!empty($dataCasos)) {
                                        foreach ($dataCasos as $caso) {
                                            if ($caso['estatusCaso'] == 'Activo') { ?>
                                                <option value="<?php echo $caso['codigoCaso']?>"><?php echo $caso['codigoCaso'].' - '.$caso['nombreCliente'].' ('.$caso['modalidadCaso'].')'?></option>
                                    <?php } } } ?>
                                </select>
                                <label for="codigoCaso" class="form-label">Caso Vinculado</label>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group form-floating">
                                <select class="form-select" id="estatusHonorario" name="estatusHonorario" required title="Seleccione el estatus inicial del acuerdo de honorarios">
                                    <option value="Pendiente">Pendiente</option>
                                    <option value="Confirmado">Confirmado</option>
                                </select>
                                <label for="estatusHonorario" class="form-label">Estatus Inicial</label>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group form-floating">
                                <input id="montoInicialHonorario" type="number" step="0.01" min="0.01" class="form-control" name="montoInicialHonorario" placeholder="Monto" required title="Ingrese el monto total pactado mayor a 0">
                                <label for="montoInicialHonorario" class="form-label">Monto Inicial Pactado</label>
                            </div>
                        </div>

                        <div class="d-flex justify-content-center mt-4 w-100">
                            <button type="submit" class="btn__primary" name="registrarHonorario">Registrar</button>
                        </div>
                    </form>
                </div>
            </section>
        </main>
        <?php include('includes/footer.php'); ?>
    </body>
</html>