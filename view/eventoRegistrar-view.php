<!DOCTYPE html>
<html lang="es">
    <head>
        <?php include('includes/header.php'); ?>
        <title>Registrar Evento</title>
    </head>
    <body>
        <?php include('includes/sidebar.php'); ?>
        <main class="main-content">
            <?php include('includes/topbar.php'); ?>
            <section class="page__container">
                <div class="page__header">
                    <div class="page__header-titles">
                        <h2 class="page__header-title">Registrar Evento</h2>
                        <span class="page__header-subtitle">Crea un nuevo evento para seguimiento</span>
                    </div>
                </div>
                <div class="page__content">
                    <form action="evento" id="form" class="row p-4 gy-1" method="POST">
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
                                <input id="tituloEvento" type="text" class="form-control" name="tituloEvento" placeholder="Audiencia" autocomplete="off" required>
                                <label class="form-label" for="tituloEvento">Título/Nombre del Evento</label>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6">
                            <div class="form-group form-floating">
                                <select class="form-select" id="tipoEvento" name="tipoEvento" required>
                                    <option value="" hidden>Seleccionar...</option>
                                    <option value="Cita">Cita</option>
                                    <option value="Reunión">Reunión</option>
                                    <option value="Audiencia">Audiencia</option>
                                </select>
                                <label for="tipoEvento" class="form-label">Tipo de Evento</label>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6">
                            <div class="form-group form-floating">
                                <select class="form-select" id="estatusEvento" name="estatusEvento" required>
                                    <option value="" hidden>Seleccionar...</option>
                                    <option value="Confirmado">Confirmado</option>
                                    <option value="En Espera">En Espera</option>
                                </select>
                                <label for="estatusEvento" class="form-label">Estatus del Evento</label>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6">
                            <div class="form-group form-floating">
                                <input id="diaEvento" type="date" class="form-control" name="diaEvento" autocomplete="off" required>
                                <label class="form-label" for="diaEvento">Día del Evento</label>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6">
                            <div class="form-group form-floating">
                                <input id="horaEvento" type="time" class="form-control" name="horaEvento" autocomplete="off" required>
                                <label class="form-label" for="horaEvento">Hora del Evento</label>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group form-floating">
                                <input id="descripcionEvento" type="text" class="form-control" name="descripcionEvento" placeholder="Descripción del evento">
                                <label class="form-label" for="descripcionEvento">Descripción (Opcional)</label>
                            </div>
                        </div>

                        <div class="d-flex justify-content-center mt-4 gap-2 w-100">
                            <button type="submit" class="btn__primary" name="registrarEvento">Registrar</button>
                        </div>
                    </form>
                </div>
            </section>
        </main>
        <?php include ('includes/footer.php'); ?>
    </body>
</html>