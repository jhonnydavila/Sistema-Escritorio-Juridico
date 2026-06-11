<!DOCTYPE html>
<html lang="es">
    <head>
        <?php include('includes/header.php'); ?>
        <title>Reportes | Familia Jiménez</title>
    </head>
    <body>
        <?php include('includes/sidebar.php'); ?>
        <main class="main-content">
            <?php include('includes/topbar.php'); ?>
            <section class="page__container">
                <div class="d-flex align-items-center justify-content-between pb-3 border-bottom mb-3">
                    <div class="d-flex flex-column">
                        <h2 class="reports__header-title">Módulo de Reportes</h2>
                        <span class="reports__header-subtitle">Visualización y análisis del estado de casos y registros</span>
                    </div>
                    <div class="reports__header-nav-tabs">
                        <button class="page__tab active reports__header-tab-btn" data-target="panel-estadisticas">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chart-pie-icon lucide-chart-pie"><path d="M21 12c.552 0 1.005-.449.95-.998a10 10 0 0 0-8.953-8.951c-.55-.055-.998.398-.998.95v8a1 1 0 0 0 1 1z"/><path d="M21.21 15.89A10 10 0 1 1 8 2.83"/></svg>
                            Estadísticas
                        </button>
                        <button class="page__tab reports__header-tab-btn" data-target="panel-casos">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-scale-icon lucide-scale"><path d="M12 3v18"/><path d="m19 8 3 8a5 5 0 0 1-6 0zV7"/><path d="M3 7h1a17 17 0 0 0 8-2 17 17 0 0 0 8 2h1"/><path d="m5 8 3 8a5 5 0 0 1-6 0zV7"/><path d="M7 21h10"/></svg>
                            Casos
                        </button>
                        <button class="page__tab reports__header-tab-btn" data-target="panel-tramites">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-clipboard-list-icon lucide-clipboard-list"><rect width="8" height="4" x="8" y="2" rx="1" ry="1"/><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"/><path d="M12 11h4"/><path d="M12 16h4"/><path d="M8 11h.01"/><path d="M8 16h.01"/></svg>
                            Trámites
                        </button>
                        <button class="page__tab reports__header-tab-btn" data-target="panel-abogados">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-gavel-icon lucide-gavel"><path d="m14 13-8.381 8.38a1 1 0 0 1-3.001-3l8.384-8.381"/><path d="m16 16 6-6"/><path d="m21.5 10.5-8-8"/><path d="m8 8 6-6"/><path d="m8.5 7.5 8 8"/></svg>
                            Abogados
                        </button>
                        <button class="page__tab reports__header-tab-btn" data-target="panel-clientes">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user-icon lucide-user"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                            Clientes
                        </button>
                    </div>
                </div>
                
                <div class="page__tab-panel w-100" id="panel-estadisticas" style="display: block;">
                    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4 g-3 mb-3">
                        <div class="col">
                            <div class="card__reports-simple">
                                <div class="card__reports-simple-icon">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chart-no-axes-combined-icon lucide-chart-no-axes-combined"><path d="M12 16v5"/><path d="M16 14.639V21"/><path d="M20 10.656V21"/><path d="m22 3-8.646 8.646a.5.5 0 0 1-.708 0L9.354 8.354a.5.5 0 0 0-.707 0L2 15"/><path d="M4 18.463V21"/><path d="M8 14.656V21"/></svg>
                                </div>
                                <div class="card__reports-simple-details">
                                    <h4>Casos Ingresados (Mes)</h4>
                                    <span>45</span>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card__reports-simple">
                                <div class="card__reports-simple-icon" style="color: #0d8b61; background-color: #e6f5ef;">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-check-big-icon lucide-circle-check-big"><path d="M21.801 10A10 10 0 1 1 17 3.335"/><path d="m9 11 3 3L22 4"/></svg>
                                </div>
                                <div class="card__reports-simple-details">
                                    <h4>Casos Activos</h4>
                                    <span>32</span>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card__reports-simple">
                                <div class="card__reports-simple-icon" style="color: #f17108; background-color: #fdf1e6;">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-clock4-icon lucide-clock-4"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>
                                </div>
                                <div class="card__reports-simple-details">
                                    <h4>Trámites en Proceso</h4>
                                    <span>12</span>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card__reports-simple">
                                <div class="card__reports-simple-icon" style="color: #2288cc; background-color: #e8f3fa;">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user-icon lucide-user"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                                </div>
                                <div class="card__reports-simple-details">
                                    <h4>Nuevos Clientes</h4>
                                    <span>18</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row g-3">
                        <div class="col-12 col-lg-8">
                            <div class="section__reports">
                                <div class="section__reports-header">
                                    <div class="section__reports-icon" style="color: #182232; background-color: var(--neutral-container);">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                                    </div>
                                    <div class="section__reports-details">
                                        <h4>Tendencia de Carga Laboral por Abogado</h4>
                                        <span>Evolución mensual de casos activos asignados por especialista.</span>
                                    </div>
                                </div>
                                <div class="section__reports-body">
                                    <canvas id="tendenciaAbogadosChart"></canvas>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-4">
                            <div class="section__reports">
                                <div class="section__reports-header">
                                    <div class="section__reports-icon" style="color: #182232; background-color: var(--neutral-container);">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text"><path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"/><path d="M14 2v4a2 2 0 0 0 2 2h4"/><path d="M10 9H8"/><path d="M16 13H8"/><path d="M16 17H8"/></svg>
                                    </div>
                                    <div class="section__reports-details">
                                        <h4>Reportes Recientes</h4>
                                        <span>Últimos informes y documentos generados.</span>
                                    </div>
                                </div>
                                <div class="data__list">
                                    <div class="d-flex py-1">
                                        <div class="d-flex w-100 gap-2">
                                            <img class="" src="assets/img/pdf.svg" style="width: 2.5rem;">
                                            <div class="d-flex flex-column justify-content-center">
                                                <span class="data__list-title">Informe Anual de Casos</span>
                                                <span class="data__list-subtitle">Formato PDF • General</span>
                                            </div>
                                        </div>
                                        <button class="btn__icon justify-content-center" title="Descargar Documento" style="width: 2.2rem; height: 2.1rem;">
                                            <svg width="1.1rem" height="1.1rem" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-down-to-line-icon lucide-arrow-down-to-line">
                                                <path d="M12 17V3"/>
                                                <path d="m6 11 6 6 6-6"/>
                                                <path d="M19 21H5"/>
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="d-flex py-1">
                                        <div class="d-flex w-100 gap-2">
                                            <img class="" src="assets/img/pdf.svg" style="width: 2.5rem;">
                                            <div class="d-flex flex-column justify-content-center">
                                                <span class="data__list-title">Estadísticas de Trámites</span>
                                                <span class="data__list-subtitle">Formato PDF • Mensual</span>
                                            </div>
                                        </div>
                                        <button class="btn__icon justify-content-center" title="Descargar Documento" style="width: 2.2rem; height: 2.1rem;">
                                            <svg width="1.1rem" height="1.1rem" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-down-to-line-icon lucide-arrow-down-to-line">
                                                <path d="M12 17V3"/>
                                                <path d="m6 11 6 6 6-6"/>
                                                <path d="M19 21H5"/>
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="d-flex py-1">
                                        <div class="d-flex w-100 gap-2">
                                            <img class="" src="assets/img/pdf.svg" style="width: 2.5rem;">
                                            <div class="d-flex flex-column justify-content-center">
                                                <span class="data__list-title">Rendimiento por Abogado</span>
                                                <span class="data__list-subtitle">Formato PDF • Trimestral</span>
                                            </div>
                                        </div>
                                        <button class="btn__icon justify-content-center" title="Descargar Documento" style="width: 2.2rem; height: 2.1rem;">
                                            <svg width="1.1rem" height="1.1rem" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-down-to-line-icon lucide-arrow-down-to-line">
                                                <path d="M12 17V3"/>
                                                <path d="m6 11 6 6 6-6"/>
                                                <path d="M19 21H5"/>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-6">
                            <div class="section__reports">
                                <div class="section__reports-header">
                                    <div class="section__reports-icon">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chart-no-axes-column-icon lucide-chart-no-axes-column"><path d="M5 21v-6"/><path d="M12 21V3"/><path d="M19 21V9"/></svg>
                                    </div>
                                    <div class="section__reports-details">
                                        <h4>Ejecución de Trámites</h4>
                                        <span>Proporción de gestiones civiles.</span>
                                    </div>
                                </div>
                                <div class="section__reports-body">
                                    <canvas id="tramitesChart"></canvas>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-6">
                            <div class="section__reports">
                                <div class="section__reports-header">
                                    <div class="section__reports-icon">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chart-pie-icon lucide-chart-pie"><path d="M21 12c.552 0 1.005-.449.95-.998a10 10 0 0 0-8.953-8.951c-.55-.055-.998.398-.998.95v8a1 1 0 0 0 1 1z"/><path d="M21.21 15.89A10 10 0 1 1 8 2.83"/></svg>
                                    </div>
                                    <div class="section__reports-details">
                                        <h4>Estatus Global de Casos</h4>
                                        <span>Distribución actual del despacho.</span>
                                    </div>
                                </div>
                                <div class="section__reports-body">
                                    <canvas id="estatusChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="page__tab-panel w-100" id="panel-casos" style="display: none;">
    
                    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4 g-3 mb-3">
                        <div class="col">
                            <div class="card__reports-simple">
                                <div class="card__reports-simple-icon">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-scale"><path d="M12 3v18"/><path d="m19 8 3 8a5 5 0 0 1-6 0zV7"/><path d="M3 7h1a17 17 0 0 0 8-2 17 17 0 0 0 8 2h1"/><path d="m5 8 3 8a5 5 0 0 1-6 0zV7"/><path d="M7 21h10"/></svg>
                                </div>
                                <div class="card__reports-simple-details">
                                    <h4>Total de Casos</h4>
                                    <span>28</span>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card__reports-simple">
                                <div class="card__reports-simple-icon" style="color: #2288cc; background-color: #e8f3fa;">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-scale"><path d="M12 3v18"/><path d="m19 8 3 8a5 5 0 0 1-6 0zV7"/><path d="M3 7h1a17 17 0 0 0 8-2 17 17 0 0 0 8 2h1"/><path d="m5 8 3 8a5 5 0 0 1-6 0zV7"/><path d="M7 21h10"/></svg>
                                </div>
                                <div class="card__reports-simple-details">
                                    <h4>En Desarrollo</h4>
                                    <span>14</span>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card__reports-simple">
                                <div class="card__reports-simple-icon" style="color: #0d8b61; background-color: #e6f5ef;">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-gavel"><path d="m14 13-8.381 8.38a1 1 0 0 1-3.001-3l8.384-8.381"/><path d="m16 16 6-6"/><path d="m21.5 10.5-8-8"/><path d="m8 8 6-6"/><path d="m8.5 7.5 8 8"/></svg>
                                </div>
                                <div class="card__reports-simple-details">
                                    <h4>Pendientes</h4>
                                    <span>8</span>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card__reports-simple">
                                <div class="card__reports-simple-icon" style="color: #6024a5; background-color: #f3ebfc;">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-archive"><rect width="20" height="5" x="2" y="3" rx="1"/><path d="M4 8v11a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8"/><path d="M10 12h4"/></svg>
                                </div>
                                <div class="card__reports-simple-details">
                                    <h4>Cerrados</h4>
                                    <span>112</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row g-3">
                        <div class="col-12 col-lg-7">
                            <div class="section__reports">
                                <div class="section__reports-header">
                                    <div class="section__reports-icon">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trending-up"><polyline points="22 7 13.5 15.5 8.5 10.5 2 17"/><polyline points="16 7 22 7 22 13"/></svg>
                                    </div>
                                    <div class="section__reports-details">
                                        <h4>Evolución de Casos</h4>
                                        <span>Ingresos y resoluciones en los últimos 6 meses.</span>
                                    </div>
                                </div>
                                <div class="section__reports-body">
                                    <canvas id="evolucionCasosChart"></canvas>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-5">
                            <div class="section__reports">
                                <div class="section__reports-header">
                                    <div class="section__reports-icon">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chart-pie-icon lucide-chart-pie"><path d="M21 12c.552 0 1.005-.449.95-.998a10 10 0 0 0-8.953-8.951c-.55-.055-.998.398-.998.95v8a1 1 0 0 0 1 1z"/><path d="M21.21 15.89A10 10 0 1 1 8 2.83"/></svg>
                                    </div>
                                    <div class="section__reports-details">
                                        <h4>Estatus Global de Casos</h4>
                                        <span>Distribución actual del despacho.</span>
                                    </div>
                                </div>
                                <div class="section__reports-body">
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-12">
                            <div class="section__container">
                                <div class="section__header">
                                    <h3 class="section__title">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text"><path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"/><path d="M14 2v4a2 2 0 0 0 2 2h4"/><path d="M10 9H8"/><path d="M16 13H8"/><path d="M16 17H8"/></svg>
                                        Generador de Reportes de Casos
                                    </h3>
                                </div>
                                <div class="section__content">
                                    <form id="form-generar-reporte-casos">
                                        <div class="row g-4 align-items-end">
                                            <div class="col-12 col-md-3">
                                                <div class="form-group-minimal">
                                                    <label>Tipo de Reporte</label>
                                                    <select class="form-control-minimal" id="rep-tipo">
                                                        <option value="general">Listado General</option>
                                                        <option value="detallado">Reporte Detallado</option>
                                                        <option value="estadistico">Resumen Estadístico</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-3">
                                                <div class="form-group-minimal">
                                                    <label>Estatus</label>
                                                    <select class="form-control-minimal" id="rep-estatus">
                                                        <option value="todos">Todos los Estatus</option>
                                                        <option value="activo">Activos</option>
                                                        <option value="inactivo">Inactivos</option>
                                                        <option value="cerrado">Cerrados</option>
                                                        <option value="pendiente">Pendientes</option>
                                                        <option value="en desarrollo">En Desarrollo</option>
                                                        <option value="sin asignacion">Sin Asignación</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-2">
                                                <div class="form-group-minimal">
                                                    <label>Fecha Inicio</label>
                                                    <input type="date" class="form-control-minimal" id="rep-desde">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-2">
                                                <div class="form-group-minimal">
                                                    <label>Fecha Fin</label>
                                                    <input type="date" class="form-control-minimal" id="rep-hasta">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-2">
                                                <button type="submit" class="btn__primary w-100 py-2 justify-content-center">
                                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-download" width="16" height="16"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" x2="12" y1="15" y2="3"/></svg>
                                                    Exportar PDF
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="page__tab-panel w-100" id="panel-abogados" style="display: none;">
                </div>

                <div class="page__tab-panel w-100" id="panel-clientes" style="display: none;">
                </div>

            </section>
        </main>
        <?php include('includes/footer.php'); ?>
    </body>
</html>