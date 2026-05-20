<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include('includes/header.php'); ?>
        <title>Casos en Desarrollo</title>
    </head>
    <body>
        <?php include ('includes/sidebar.php'); ?>
        
        <main class="main-content">
            <?php include ('includes/topbar.php'); ?>

            <section class="page__container">
                <div class="page__header">
                    <div class="page__header-titles">
                        <h2 class="page__header-title">Casos en Desarrollo</h2>
                        <span class="page__header-subtitle">Gestión de Casos</span>
                    </div>
                </div>
                <div class="page__content">
                    <div class="row p-4 g-4">
                        <div class="col-lg-4 col-md-6">
                            <div class="card__container card__violet">
                                <div class="card__header">
                                    <span class="badge bg-dark rounded-pill bg-opacity-75">Asesoría</span>
                                    <span class="card__header-badge badge rounded-pill">Pendiente</span>
                                </div>
                                <div class="card__body">
                                    <p class="text-muted" style="font-size: 12px;">Código: CAS-2026-001</p>
                                    <h5 class="fs-6 fw-bold text-dark pb-2 border-bottom w-100">María Alejandra Pérez</h5>
                                    
                                    <div class="card__assigned">
                                        <div class="card__assigned-avatar">
                                            EJ
                                        </div>
                                        <div class="card__assigned-info">
                                            <span>Abogado asignado</span>
                                            <p>Dra. Elena Jiménez</p>
                                        </div>
                                    </div>
                                    
                                    <a href="#" class="card__footer">Ver Caso</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="card__container card__red">
                                <div class="card__header">
                                    <span class="badge bg-dark rounded-pill bg-opacity-75">Asesoría</span>
                                    <span class="card__header-badge badge rounded-pill">Sin Asignación</span>
                                </div>
                                <div class="card__body">
                                    <p class="text-muted" style="font-size: 12px;">Código: CAS-2026-001</p>
                                    <h5 class="fs-6 fw-bold text-dark pb-2 border-bottom w-100">María Alejandra Pérez</h5>
                                    
                                    <div class="card__assigned">
                                        <div class="card__assigned-avatar">
                                            ?
                                        </div>
                                        <div class="card__assigned-info">
                                            <span>Abogado asignado</span>
                                            <p>Sin Asignación</p>
                                        </div>
                                    </div>
                                    
                                    <a href="#" class="card__footer">Ver Caso</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="card__container card__blue">
                                <div class="card__header">
                                    <span class="badge bg-dark rounded-pill bg-opacity-75">Gestión Jurídica</span>
                                    <span class="card__header-badge badge rounded-pill">En Desarrollo</span>
                                </div>
                                <div class="card__body">
                                    <p class="text-muted" style="font-size: 12px;">Código: CAS-2026-001</p>
                                    <h5 class="fs-6 fw-bold text-dark pb-2 border-bottom w-100">María Alejandra Pérez</h5>
                                    
                                    <div class="card__assigned">
                                        <div class="card__assigned-avatar">
                                            EJ
                                        </div>
                                        <div class="card__assigned-info">
                                            <span>Abogado asignado</span>
                                            <p>Dra. Elena Jiménez</p>
                                        </div>
                                    </div>
                                    
                                    <a href="#" class="card__footer">Ver Caso</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>

        <?php (include 'view/includes/footer.php'); ?>
    </body>
</html>