<!DOCTYPE html>
<html lang="es">
    <head>
        <?php include('includes/header.php'); ?>
        <title>Registrar Trámite</title>
    </head>
    <body>
        <?php include('includes/sidebar.php'); ?>
        <main class="main-content">
            <?php include('includes/topbar.php'); ?>
            
            <section class="page__container">
                <div class="page__header">
                    <div class="page__header-titles">
                        <h2 class="page__header-title">Registrar Trámite</h2>
                        <span class="page__header-subtitle">Ingrese los datos para registrar un nuevo trámite legal</span>
                    </div>
                </div>
                <div class="page__content">
                    <form action="tramite" id="form" class="row p-4 gy-1" method="POST">
                    
                        <div class="col-md-8">
                            <div class="form-group form-floating">
                                <input id="nombreTramite" type="text" class="form-control" name="nombreTramite" placeholder="Divorcio..." minlength="3" maxlength="100" autocomplete="off" required>
                                <label for="nombreTramite" class="form-label">Nombre del Trámite</label>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group form-floating">
                                <input id="montoBaseTramite" type="number" step="0.01" min="0" class="form-control" name="montoBaseTramite" placeholder="0.00" title="Ingrese el monto base en formato numérico. Puede usar decimales." required>
                                <label for="montoBaseTramite" class="form-label">Monto Base</label>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group form-floating">
                                <input type="text" id="descripcionTramite" class="form-control" name="descripcionTramite" placeholder="Descripción detallada" minlength="5" title="Ingrese una descripción detallada del trámite legal" required>
                                <label for="descripcionTramite" class="form-label">Descripción</label>
                            </div>
                        </div>

                        <!-- Requisitos del trámite 
                        <div class="col-md-10">
                            <div class="form-group form-floating">
                                <select class="form-select" name="agregarRequisito" id="agregarRequisito" required>
                                    <option value="" hidden>Seleccione un requisito</option>
                                    <option value="REQ-001">Copia de Cédula de Identidad</option>
                                    <option value="REQ-002">Formulario de Solicitud</option>
                                </select>
                                <label for="agregarRequisito" class="form-label">Agregar Requisito</label>
                            </div>
                        </div>

                        <div class="col-md-2 d-flex justify-content-between align-items-end gap-2">
                            <button type="button" id="btnAnadirRequisito" class="btn__primary w-100">Añadir</button>
                            <button type="button" id="btnAnadirRequisito" class="btn__outline w-100">Nuevo</button>
                        </div>

                        <div class="col-md-12 mt-3">
                            <div class="row">
                                <?php 
                                    // if (!empty($dataRequisitos)) {
                                    //     foreach($dataRequisitos as $requisito) {
                                ?>
                                
                                <div class="col-lg-4">
                                    <div class="card px-3 py-2 shadow-sm border-0 bg-light">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="requisitos[]" value="REQ-001" id="req_REQ-001">
                                            <label class="form-check-label fw-bolder" for="req_REQ-001">Copia de Cédula de Identidad </label>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" name="obligatorio_REQ-001" id="obl_REQ-001">
                                            <label class="form-check-label small text-muted" for="obl_REQ-001">¿Es obligatorio?</label>
                                        </div>
                                    </div>
                                </div>

                                <?php 
                                    //     }
                                    // } 
                                ?>
                            </div>
                        </div>
                        -->
                        <div class="d-flex justify-content-center mt-4 w-100">
                            <button type="submit" class="btn__primary" name="registrarTramite">Registrar</button>
                        </div>
                    </form>
                </div>
            </section>
        </main>
        <?php include('includes/footer.php'); ?>
    </body>
</html>