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
                        <span class="page__header-subtitle">Gestión del catálogo de trámites legales</span>
                    </div>
                </div>
                <div class="page__content">
                    <form action="?page=tramite" id="form" class="row p-4" method="POST">
                        
                        <input type="text" name="registrarTramite" hidden>

                        <div class="col-md-8">
                            <div class="form-group form-floating">
                                <input id="nombreTramite" type="text" class="form-control" name="nombreTramite" placeholder="Divorcio..." minlength="3" maxlength="100" pattern="^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9\s.,()\-]{3,100}$" title="El nombre debe contener entre 3 y 100 caracteres. Se permiten letras, números, espacios y caracteres como ( . , - )" autocomplete="off" required>
                                <label for="nombreTramite" class="form-label">Nombre del Trámite</label>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group form-floating">
                                <input id="montoBaseTramite" type="number" step="0.01" min="0" class="form-control" name="montoBaseTramite" placeholder="0.00" title="Ingrese el monto base en formato numérico. Puede usar decimales." required>
                                <label for="montoBaseTramite" class="form-label">Monto Base ($)</label>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group form-floating">
                                <input type="text" id="descripcionTramite" class="form-control" name="descripcionTramite" placeholder="Descripción detallada" minlength="5" title="Ingrese una descripción detallada del trámite legal" required>
                                <label for="descripcionTramite" class="form-label">Descripción</label>
                            </div>
                        </div>

                        <div class="col-md-12 mt-4">
                            <h5 class="mb-1">Asignar Requisitos</h5>
                            <p class="text-muted small mb-3">Seleccione los requisitos exigidos para este trámite y marque si su entrega es de carácter obligatorio.</p>
                            
                            <div class="row px-2">
                                <?php 
                                    // if (!empty($dataRequisitos)) {
                                    //     foreach($dataRequisitos as $requisito) {
                                ?>
                                
                                <div class="col-lg-4">
                                    <div class="card p-2 shadow-sm border-0 bg-light">
                                        <div class="form-check mb-1">
                                            <input class="form-check-input" type="checkbox" name="requisitos[]" value="REQ-001" id="req_REQ-001">
                                            <label class="form-check-label fw-bolder" for="req_REQ-001">
                                                Copia de Cédula de Identidad </label>
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

                        <div class="d-flex justify-content-center mt-4 w-100">
                            <button type="submit" class="btn__primary">Registrar</button>
                        </div>
                    </form>
                </div>
            </section>
        </main>
        <?php include('includes/footer.php'); ?>
    </body>
</html>