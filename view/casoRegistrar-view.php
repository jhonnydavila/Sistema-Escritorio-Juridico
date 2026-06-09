<!DOCTYPE html>
<html lang="es">
    <head>
        <?php include('includes/header.php'); ?>
        <title>Registrar Caso</title>
    </head>
    <body>
        <?php include('includes/sidebar.php'); ?>
        <main class="main-content">
            <?php include('includes/topbar.php'); ?>

            <section class="page__container">
                <div class="page__header">
                    <div class="page__header-titles">
                        <h2 class="page__header-title">Registrar Caso</h2>
                        <span class="page__header-subtitle">Gestión de Casos</span>
                    </div>
                </div>
                <div class="page__content">
                    <form action="caso" id="form" class="row p-4 gy-1" method="POST">
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group form-floating">
                                <select class="form-select" name="clienteCaso" id="clienteCaso" required>
                                    <option value="" hidden>Seleccionar...</option>
                                    <?php if (!empty($clientes)) {
                                        foreach ($clientes as $cli) {
                                            if ($cli['estatusCliente'] == 'Activo') { ?>
                                                <option value="<?php echo $cli['codigoCliente']?>"><?php echo $cli['nombreCliente'].' - '.$cli['documentoCliente'].' ('.$cli['codigoCliente'].')'?></option>
                                    <?php } } } ?>
                                </select>
                                <label for="clienteCaso" class="form-label">Cliente</label>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6">
                            <div class="form-group form-floating">
                                <select class="form-select" name="modalidadCaso" id="modalidadCaso" required>
                                    <option value="" hidden>Seleccionar...</option>
                                    <option value="Asesoria">Asesoría</option>
                                    <option value="Gestion Juridica">Gestión Jurídica</option>
                                </select>
                                <label for="modalidadCaso" class="form-label">Modalidad del Caso</label>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <div class="form-group form-floating">
                                <select class="form-select" name="origenExpediente" id="origenExpediente" required>
                                    <option value="" hidden>Seleccionar...</option>
                                    <option value="Judicial">Judicial</option>
                                    <option value="Extrajudicial">Extrajudicial</option>
                                </select>
                                <label for="origenExpediente" class="form-label">Origen del Expediente</label>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <div class="form-group form-floating">
                                <input id="numeroExpediente" type="text" class="form-control" name="numeroExpediente" placeholder="numero" maxlength="100" autocomplete="off">
                                <label class="form-label" for="numeroExpediente">Número de Expediente (opcional)</label>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group form-floating">
                                <select class="form-select" name="codigoArchivador" id="codigoArchivador">
                                    <option value="">Sin asignar</option>
                                    <?php if (!empty($archivadores)) {
                                        foreach ($archivadores as $arc) {
                                            if ($arc['estatusArchivador'] == 'Activo') { ?>
                                                <option value="<?php echo $arc['codigoArchivador']?>"><?php echo $arc['codigoArchivador'].' - '.$arc['nombreArchivador']?></option>
                                    <?php } } } ?>
                                </select>
                                <label for="codigoArchivador" class="form-label">Archivador (opcional)</label>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group form-floating">
                                <input id="descripcionCaso" type="text" class="form-control" name="descripcionCaso" placeholder="descripcion" minlength="3" maxlength="200" autocomplete="off" required>
                                <label class="form-label" for="descripcionCaso">Descripción del Caso</label>
                            </div>
                        </div>

                        <div class="d-flex justify-content-center mt-4 gap-2 w-100">
                            <button type="submit" class="btn__primary" name="registrarCaso">Registrar</button>
                        </div>
                    </form>
                </div>
            </section>
        </main>
        <?php include ('includes/footer.php'); ?>
    </body>
</html>