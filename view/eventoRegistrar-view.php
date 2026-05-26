<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include ('includes/header.php'); ?>
        <title>Registrar Evento</title>
    </head>
    <body>
        <?php include ('includes/sidebar.php'); ?>
        <main class="main-content">
            <?php include __DIR__ . '/includes/topbar.php'; ?>
            <section class="page__container">
                <div class="page__header">
                    <div class="page__header-titles">
                        <h2 class="page__header-title">Registrar Evento</h2>
                        <span class="page__header-subtitle">Crea un nuevo evento para seguimiento</span>
                    </div>
                </div>
                <div class="page__content">
                    <form action="controller/eventoController.php" class="row p-4" method="POST">
                        <div class="col-md-6">
                            <div class="form-group form-floating">
                                <select class="form-select" id="casoEvento" required>
                                    <option value="" hidden>Seleccionar...</option>
                                    <option value="CAS-001">Caso 1</option>
                                    <option value="CAS-002">Caso 2</option>
                                </select>
                                <label for="casoEvento" class="form-label">Caso</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-floating">
                                <input id="tituloEvento" type="text" class="form-control" name="tituloEvento" placeholder="Audiencia" autocomplete="off" required>
                                <label class="form-label" for="tituloEvento">Título/Nombre del Evento</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group form-floating">
                                <select class="form-select" id="tipoEvento" required>
                                    <option value="" hidden>Seleccionar...</option>
                                    <option value="">Cita</option>
                                    <option value="">Reunión</option>
                                    <option value="">Audiencia</option>
                                </select>
                                <label for="tipoEvento" class="form-label">Tipo de Evento</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group form-floating">
                                <input id="fechaEvento" type="date" class="form-control" name="fechaEvento" autocomplete="off" required>
                                <label class="form-label" for="fechaEvento">Fecha del Evento</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group form-floating">
                                <select class="form-select" id="estatusEvento" required>
                                    <option value="" hidden>Seleccionar...</option>
                                    <option value="">Confirmado</option>
                                    <option value="">En Espera</option>
                                </select>
                                <label for="estatusEvento" class="form-label">Estatus del Evento</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group form-floating">
                                <input id="descripcionEvento" type="text" class="form-control" name="descripcionEvento" placeholder="Descripción del evento">
                                <label class="form-label" for="descripcionEvento">Descripción</label>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center mt-4 gap-2 w-100">
                            <button type="submit" class="btn__primary">Registrar</button>
                        </div>
                    </form>
                </div>
            </section>
        </main>
        <?php include ('includes/footer.php'); ?>
    </body>
</html>