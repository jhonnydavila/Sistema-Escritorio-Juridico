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
                        <button class="page__tab active" data-target="panel-mis-casos">
                            <svg width="1.1rem" height="1.1rem" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-layers-icon lucide-layers"><path d="M12.83 2.18a2 2 0 0 0-1.66 0L2.6 6.08a1 1 0 0 0 0 1.83l8.58 3.91a2 2 0 0 0 1.66 0l8.58-3.9a1 1 0 0 0 0-1.83z"/><path d="M2 12a1 1 0 0 0 .58.91l8.6 3.91a2 2 0 0 0 1.65 0l8.58-3.9A1 1 0 0 0 22 12"/><path d="M2 17a1 1 0 0 0 .58.91l8.6 3.91a2 2 0 0 0 1.65 0l8.58-3.9A1 1 0 0 0 22 17"/></svg>
                            <span>Mis Casos</span>
                        </button>
                        <button class="page__tab" data-target="panel-sin-asignacion">
                            <svg width="1.25rem" height="1.25rem" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-shield-alert-icon lucide-shield-alert">
                                <path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"/>
                                <path d="M12 8v4"/>
                                <path d="M12 16h.01"/>
                            </svg>
                            <span>Casos sin Asignación</span>
                        </button>
                        <button class="page__tab" data-target="panel-otros-casos">
                            <svg width="1.2rem" height="1.2rem" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-layout-list-icon lucide-layout-list"><rect width="7" height="7" x="3" y="3" rx="1"/><rect width="7" height="7" x="3" y="14" rx="1"/><path d="M14 4h7"/><path d="M14 9h7"/><path d="M14 15h7"/><path d="M14 20h7"/></svg>
                            <span>Otros Casos</span>
                        </button>
                    </div>
                    <div class="page__panels-container">
                        <div class="row p-4 g-4 page__tab-panel" id="panel-mis-casos" style="display: block;">
                            <div class="col-lg-4 col-md-6">
                                <div class="card__case card__case-green">
                                    <div class="card__case-header">
                                        <span class="badge bg-dark rounded-pill bg-opacity-75 shadow">Gestión Jurídica</span>
                                        <span class="card__case-header-badge badge rounded-pill shadow">En Desarrollo</span>
                                    </div>
                                    <div class="card__case-body">
                                        <p class="text-muted" style="font-size: 12px;">Código: CAS-2026-001</p>
                                        <h5 class="fs-6 fw-bold text-dark pb-2 border-bottom w-100">María Alejandra Pérez</h5>
                                        
                                        <div class="card__case-assigned">
                                            <div class="card__case-assigned-avatar">
                                                EJ
                                            </div>
                                            <div class="card__case-assigned-info">
                                                <span>Abogado asignado</span>
                                                <p>Dra. Elena Jiménez</p>
                                            </div>
                                        </div>
                                        
                                        <a href="index.php?page=casoVer" class="card__case-footer">Ver Caso</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="card__case card__case-blue">
                                    <div class="card__case-header">
                                        <span class="badge bg-dark rounded-pill bg-opacity-75 shadow">Gestión Jurídica</span>
                                        <span class="card__case-header-badge badge rounded-pill shadow">En Desarrollo</span>
                                    </div>
                                    <div class="card__case-body">
                                        <p class="text-muted" style="font-size: 12px;">Código: CAS-2026-001</p>
                                        <h5 class="fs-6 fw-bold text-dark pb-2 border-bottom w-100">María Alejandra Pérez</h5>
                                        
                                        <div class="card__case-assigned">
                                            <div class="card__case-assigned-avatar">
                                                EJ
                                            </div>
                                            <div class="card__case-assigned-info">
                                                <span>Abogado asignado</span>
                                                <p>Dra. Elena Jiménez</p>
                                            </div>
                                        </div>
                                        
                                        <a href="index.php?page=casoVer" class="card__case-footer">Ver Caso</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="card__case card__case-violet">
                                    <div class="card__case-header">
                                        <span class="badge bg-dark rounded-pill bg-opacity-75 shadow">Asesoría</span>
                                        <span class="card__case-header-badge badge rounded-pill shadow">Pendiente</span>
                                    </div>
                                    <div class="card__case-body">
                                        <p class="text-muted" style="font-size: 12px;">Código: CAS-2026-001</p>
                                        <h5 class="fs-6 fw-bold text-dark pb-2 border-bottom w-100">María Alejandra Pérez</h5>
                                        
                                        <div class="card__case-assigned">
                                            <div class="card__case-assigned-avatar">
                                                EJ
                                            </div>
                                            <div class="card__case-assigned-info">
                                                <span>Abogado asignado</span>
                                                <p>Dra. Elena Jiménez</p>
                                            </div>
                                        </div>
                                        
                                        <a href="index.php?page=casoVer" class="card__case-footer">Ver Caso</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row p-4 g-4 page__tab-panel" id="panel-sin-asignacion" style="display: none;">
                            <div class="col-lg-4 col-md-6">
                                <div class="card__case card__case-red">
                                    <div class="card__case-header">
                                        <span class="badge bg-dark rounded-pill bg-opacity-75 shadow">Asesoría</span>
                                        <span class="card__case-header-badge badge rounded-pill shadow">Sin Asignación</span>
                                    </div>
                                    <div class="card__case-body">
                                        <p class="text-muted" style="font-size: 12px;">Código: CAS-2026-001</p>
                                        <h5 class="fs-6 fw-bold text-dark pb-2 border-bottom w-100">María Alejandra Pérez</h5>
                                        
                                        <div class="card__case-assigned">
                                            <div class="card__case-assigned-avatar">
                                                ?
                                            </div>
                                            <div class="card__case-assigned-info">
                                                <span>Abogado asignado</span>
                                                <p>Sin Asignación</p>
                                            </div>
                                        </div>
                                        
                                        <a href="index.php?page=casoVer" class="card__case-footer">Ver Caso</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row p-4 g-4 page__tab-panel" id="panel-otros-casos" style="display: none;">
                            <div class="col-lg-4 col-md-6">
                                <div class="card__case card__case-yellow">
                                    <div class="card__case-header">
                                        <span class="badge bg-dark rounded-pill bg-opacity-75 shadow">Gestión Jurídica</span>
                                        <span class="card__case-header-badge badge rounded-pill shadow">En Desarrollo</span>
                                    </div>
                                    <div class="card__case-body">
                                        <p class="text-muted" style="font-size: 12px;">Código: CAS-2026-001</p>
                                        <h5 class="fs-6 fw-bold text-dark pb-2 border-bottom w-100">María Alejandra Pérez</h5>
                                        
                                        <div class="card__case-assigned">
                                            <div class="card__case-assigned-avatar">
                                                EJ
                                            </div>
                                            <div class="card__case-assigned-info">
                                                <span>Abogado asignado</span>
                                                <p>Dra. Elena Jiménez</p>
                                            </div>
                                        </div>
                                        
                                        <a href="index.php?page=casoVer" class="card__case-footer">Ver Caso</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="card__case card__case-orange">
                                    <div class="card__case-header">
                                        <span class="badge bg-dark rounded-pill bg-opacity-75 shadow">Gestión Jurídica</span>
                                        <span class="card__case-header-badge badge rounded-pill shadow">En Desarrollo</span>
                                    </div>
                                    <div class="card__case-body">
                                        <p class="text-muted" style="font-size: 12px;">Código: CAS-2026-001</p>
                                        <h5 class="fs-6 fw-bold text-dark pb-2 border-bottom w-100">María Alejandra Pérez</h5>
                                        
                                        <div class="card__case-assigned">
                                            <div class="card__case-assigned-avatar">
                                                EJ
                                            </div>
                                            <div class="card__case-assigned-info">
                                                <span>Abogado asignado</span>
                                                <p>Dra. Elena Jiménez</p>
                                            </div>
                                        </div>
                                        
                                        <a href="index.php?page=casoVer" class="card__case-footer">Ver Caso</a>
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