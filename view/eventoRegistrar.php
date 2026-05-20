<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include __DIR__ . '/includes/header.php'; ?>
        <title>Registrar Evento</title>
    </head>
    <body>
        <?php include __DIR__ . '/includes/sidebar.php'; ?>
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
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group form-floating">
                                <input id="nombreEvento" type="text" class="form-control" name="nombreEvento" placeholder="Audiencia" autocomplete="off" required>
                                <label class="form-label" for="nombreEvento">Nombre del Evento</label>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group form-floating">
                                <input id="fechaEvento" type="date" class="form-control" name="fechaEvento" autocomplete="off" required>
                                <label class="form-label" for="fechaEvento">Fecha del Evento</label>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group form-floating">
                                <textarea id="descripcionEvento" class="form-control" name="descripcionEvento" placeholder="Descripción del evento" style="height: 120px"></textarea>
                                <label class="form-label" for="descripcionEvento">Descripción</label>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center mt-4 gap-2 w-100">
                            <button type="submit" class="btn btn-primary">Guardar Evento</button>
                        </div>
                    </form>
                </div>
            </section>
        </main>
        <?php include __DIR__ . '/includes/footer.php'; ?>
    </body>
</html>