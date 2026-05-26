<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include ('includes/header.php'); ?>
        <title>Asignaciones</title>
    </head>
    <body>
        <?php include ('includes/sidebar.php'); ?>
        
        <main class="main-content">
            <?php include ('includes/topbar.php'); ?>

            <section class="page__container">
                <div class="page__header">
                    <div class="page__header-titles">
                        <h2 class="page__header-title">Asignaciones de Casos</h2>
                        <span class="page__header-subtitle">Gestión de Casos</span>
                    </div>
                </div>
                <div class="page__content">
                    
                    <div class="page__tabs">
                        <button class="page__tab active" data-status="z">
                            <svg width="1.2rem" height="1.2rem" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-archive-icon lucide-archive">
                                <rect width="20" height="5" x="2" y="3" rx="1"/>
                                <path d="M4 8v11a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8"/>
                                <path d="M10 12h4"/>
                            </svg>
                            <span>Mis Casos</span>
                        </button>
                        <button class="page__tab" data-status="y">
                            <svg width="1.2rem" height="1.2rem" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-archive-x-icon lucide-archive-x">
                                <rect width="20" height="5" x="2" y="3" rx="1"/>
                                <path d="M4 8v11a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8"/>
                                <path d="m9.5 17 5-5"/><path d="m9.5 12 5 5"/>
                            </svg>
                            <span>Casos sin Asignación</span>
                        </button>
                        <button class="page__tab" data-status="x">
                            <svg width="1.2rem" height="1.2rem" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-archive-x-icon lucide-archive-x">
                                <rect width="20" height="5" x="2" y="3" rx="1"/>
                                <path d="M4 8v11a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8"/>
                                <path d="m9.5 17 5-5"/><path d="m9.5 12 5 5"/>
                            </svg>
                            <span>Otros Casos</span>
                        </button>
                    </div>
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
                                    
                                    <a href="index.php?page=casoVer" class="card__footer">Ver Caso</a>
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
                                    
                                    <a href="index.php?page=casoVer" class="card__footer">Ver Caso</a>
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
                                    
                                    <a href="index.php?page=casoVer" class="card__footer">Ver Caso</a>
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