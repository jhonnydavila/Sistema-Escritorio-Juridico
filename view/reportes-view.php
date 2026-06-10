<!DOCTYPE html>
<html lang="es">
    <head>
        <?php include('includes/header.php'); ?>
        <title>Reportes | Familia Jiménez</title>
        
        <script src="https://unpkg.com/lucide@latest"></script>
        
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
        
        <style>
            /* Ajustes para los íconos SVG de Lucide */
            .lucide {
                width: 1.2em;
                height: 1.2em;
                vertical-align: text-bottom;
                stroke-width: 2;
            }
            .kpi-icon .lucide {
                width: 24px;
                height: 24px;
            }

            /* Ajustes menores específicos para la navegación del módulo */
            .reports__nav-tabs {
                display: flex;
                gap: 10px;
                margin-bottom: 20px;
                border-bottom: 1px solid var(--body-outline);
                padding-bottom: 8px;
            }
            .reports__tab-btn {
                background: transparent;
                border: none;
                padding: 8px 16px;
                font-size: 13px;
                font-weight: 500;
                color: var(--secondary);
                cursor: pointer;
                border-radius: var(--border-small);
                transition: all 0.2s ease;
                display: flex;
                align-items: center;
                gap: 6px;
            }
            .reports__tab-btn:hover {
                background-color: var(--neutral-container);
                color: var(--primary);
            }
            .reports__tab-btn.active {
                background-color: var(--primary-background);
                color: white;
            }

            /* Estilos del Nuevo Dashboard Principal */
            .kpi-grid {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
                gap: 20px;
                margin-bottom: 20px;
            }
            .kpi-card {
                background-color: #ffffff;
                border: 1px solid var(--body-outline);
                border-radius: var(--border-large);
                padding: 20px;
                display: flex;
                align-items: center;
                gap: 16px;
                box-shadow: 0 2px 6px rgba(0, 0, 0, 0.02);
                transition: transform 0.2s ease;
            }
            .kpi-card:hover {
                transform: translateY(-3px);
                box-shadow: 0 6px 12px rgba(0, 0, 0, 0.06);
            }
            .kpi-icon {
                width: 48px;
                height: 48px;
                border-radius: 50%;
                background-color: var(--neutral-container);
                color: var(--primary);
                display: flex;
                align-items: center;
                justify-content: center;
            }
            .kpi-details {
                display: flex;
                flex-direction: column;
            }
            .kpi-details h4 {
                font-size: 12px;
                color: var(--secondary);
                font-weight: 500;
                margin-bottom: 4px;
            }
            .kpi-details span {
                font-size: 24px;
                font-weight: 700;
                color: var(--primary);
                line-height: 1;
            }
            .charts-grid {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
                gap: 20px;
            }

            /* Estilos de Formularios de Filtro */
            .grid-form {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
                gap: 20px;
                align-items: flex-end;
            }
            .form-floating {
                position: relative;
                display: flex;
                flex-direction: column-reverse;
            }
            .form-label {
                font-size: 12px;
                color: var(--secondary);
                margin-bottom: 4px;
                font-weight: 500;
            }
            .preview__section {
                margin-top: 24px;
                display: none;
            }
        </style>
    </head>
    <body>
        <?php include('includes/sidebar.php'); ?>
        <main class="main-content">
            <?php include('includes/topbar.php'); ?>
            
            <section class="page__container">
                <div class="page__header">
                    <div class="page__header-titles">
                        <h2 class="page__header-title">Módulo de Reportes</h2>
                        <span class="page__header-subtitle">Visualización y análisis del estado de casos y registros</span>
                    </div>
                </div>

                <div class="reports__nav-tabs">
                    <button class="reports__tab-btn active" onclick="switchTab('estadisticas')"><i data-lucide="pie-chart"></i> Estadísticas</button>
                    <button class="reports__tab-btn" onclick="switchTab('casos')"><i data-lucide="folder-open"></i> Casos Legales</button>
                    <button class="reports__tab-btn" onclick="switchTab('abogados')"><i data-lucide="scale"></i> Abogados</button>
                    <button class="reports__tab-btn" onclick="switchTab('clientes')"><i data-lucide="users"></i> Clientes</button>
                </div>
                
                <div class="page__content" style="background: transparent; border: none; overflow: visible;">
                    
                    <div id="tab-estadisticas" class="tab-content-block">
                        
                        <div class="kpi-grid">
                            <div class="kpi-card">
                                <div class="kpi-icon"><i data-lucide="folder-open"></i></div>
                                <div class="kpi-details">
                                    <h4>Total Casos (Mes)</h4>
                                    <span>45</span>
                                </div>
                            </div>
                            <div class="kpi-card">
                                <div class="kpi-icon" style="color: #0d8b61; background-color: #e6f5ef;"><i data-lucide="check-circle"></i></div>
                                <div class="kpi-details">
                                    <h4>Casos Activos</h4>
                                    <span>32</span>
                                </div>
                            </div>
                            <div class="kpi-card">
                                <div class="kpi-icon" style="color: #f17108; background-color: #fdf1e6;"><i data-lucide="clock"></i></div>
                                <div class="kpi-details">
                                    <h4>Trámites en Proceso</h4>
                                    <span>12</span>
                                </div>
                            </div>
                            <div class="kpi-card">
                                <div class="kpi-icon" style="color: #2288cc; background-color: #e8f3fa;"><i data-lucide="users"></i></div>
                                <div class="kpi-details">
                                    <h4>Nuevos Clientes</h4>
                                    <span>18</span>
                                </div>
                            </div>
                        </div>

                        <div class="charts-grid">
                            
                            <div class="card__home">
                                <div class="card__home-header" style="margin-bottom: 15px;">
                                    <div class="card__home-icon" style="background-color: var(--neutral-container); color: var(--primary); padding: 8px; border-radius: 6px; display: flex;">
                                        <i data-lucide="bar-chart-2"></i>
                                    </div>
                                    <div style="display: flex; flex-direction: column;">
                                        <h3 style="font-size: 15px; font-weight: 600;">Ejecución de Trámites</h3>
                                        <span style="font-size: 11px; color: var(--secondary);">Proporción de gestiones civiles.</span>
                                    </div>
                                </div>
                                <div class="card__home-body" style="height: 280px; position: relative;">
                                    <canvas id="tramitesChart"></canvas>
                                </div>
                            </div>

                            <div class="card__home">
                                <div class="card__home-header" style="margin-bottom: 15px;">
                                    <div class="card__home-icon" style="background-color: var(--neutral-container); color: var(--primary); padding: 8px; border-radius: 6px; display: flex;">
                                        <i data-lucide="pie-chart"></i>
                                    </div>
                                    <div style="display: flex; flex-direction: column;">
                                        <h3 style="font-size: 15px; font-weight: 600;">Estatus Global de Casos</h3>
                                        <span style="font-size: 11px; color: var(--secondary);">Distribución actual del despacho.</span>
                                    </div>
                                </div>
                                <div class="card__home-body" style="height: 280px; position: relative; display: flex; justify-content: center;">
                                    <canvas id="estatusChart"></canvas>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div id="tab-casos" class="tab-content-block" style="display: none;">
                        <div class="section__container">
                            <div class="section__header">
                                <h3 class="section__title"><i data-lucide="filter"></i> Criterios de Selección - Casos</h3>
                            </div>
                            <div class="section__content">
                                <form id="form-casos" onsubmit="generarPrevisualizacion(event, 'casos')">
                                    <div class="grid-form">
                                        <div class="form-floating">
                                            <select class="form-select" id="caso-estatus">
                                                <option value="Todos">Todos los Estatus</option>
                                                <option value="Activo">Activos</option>
                                                <option value="Cerrado">Cerrados</option>
                                                <option value="Archivado">Archivados</option>
                                            </select>
                                            <label class="form-label">Estatus del Caso</label>
                                        </div>
                                        <div class="form-floating">
                                            <input type="date" class="form-control" id="caso-desde">
                                            <label class="form-label">Desde (Fecha de Apertura)</label>
                                        </div>
                                        <div class="form-floating">
                                            <input type="date" class="form-control" id="caso-hasta">
                                            <label class="form-label">Hasta</label>
                                        </div>
                                        <div>
                                            <button type="submit" class="btn__primary" style="width: 100%; justify-content: center; display: flex; gap: 8px;">
                                                <i data-lucide="eye"></i> Visualizar Datos
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div id="tab-abogados" class="tab-content-block" style="display: none;">
                        <div class="section__container">
                            <div class="section__header">
                                <h3 class="section__title"><i data-lucide="filter"></i> Criterios de Selección - Especialidades</h3>
                            </div>
                            <div class="section__content">
                                <form id="form-abogados" onsubmit="generarPrevisualizacion(event, 'abogados')">
                                    <div class="grid-form">
                                        <div class="form-floating">
                                            <select class="form-select" id="abogado-especialidad">
                                                <option value="Todas">Todas las Especialidades</option>
                                                <option value="Civil">Derecho Civil</option>
                                                <option value="Familia">Derecho de Familia</option>
                                                <option value="Mercantil">Derecho Mercantil</option>
                                            </select>
                                            <label class="form-label">Especialización</label>
                                        </div>
                                        <div class="form-floating">
                                            <select class="form-select" id="abogado-estado">
                                                <option value="Todos">Todos (Activos / Inactivos)</option>
                                                <option value="Disponible">Disponibles</option>
                                                <option value="Asignados">Con Carga Máxima</option>
                                            </select>
                                            <label class="form-label">Estado de Carga</label>
                                        </div>
                                        <div>
                                            <button type="submit" class="btn__primary" style="width: 100%; justify-content: center; display: flex; gap: 8px;">
                                                <i data-lucide="eye"></i> Visualizar Datos
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div id="tab-clientes" class="tab-content-block" style="display: none;">
                        <div class="section__container">
                            <div class="section__header">
                                <h3 class="section__title"><i data-lucide="filter"></i> Criterios de Selección - Registro de Clientes</h3>
                            </div>
                            <div class="section__content">
                                <form id="form-clientes" onsubmit="generarPrevisualizacion(event, 'clientes')">
                                    <div class="grid-form">
                                        <div class="form-floating">
                                            <select class="form-select" id="cliente-tipo">
                                                <option value="Todos">Todos los Clientes</option>
                                                <option value="Frecuente">Clientes con múltiples casos</option>
                                                <option value="Nuevo">Registrados este mes</option>
                                            </select>
                                            <label class="form-label">Tipo de Cliente</label>
                                        </div>
                                        <div>
                                            <button type="submit" class="btn__primary" style="width: 100%; justify-content: center; display: flex; gap: 8px;">
                                                <i data-lucide="eye"></i> Visualizar Datos
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="preview__section" id="previewContainer">
                        <div class="section__container">
                            <div class="section__header">
                                <h3 class="section__title" id="previewTitle"><i data-lucide="table"></i> Tabla de Resultados</h3>
                                <div class="page__header-options" style="width: auto;">
                                    <button onclick="window.print()" class="btn__outline" style="display: flex; gap: 8px;">
                                        <i data-lucide="printer"></i> Imprimir Vista
                                    </button>
                                </div>
                            </div>
                            <div class="table__container" id="tableWrapper">
                            </div>
                        </div>
                    </div>

                </div>
            </section>
        </main>
        <?php include('includes/footer.php'); ?>

        <script>
            // INICIALIZACIÓN DE LUCIDE ICONS (Al cargar el DOM)
            document.addEventListener("DOMContentLoaded", function() {
                lucide.createIcons();
            });

            // 1. LÓGICA DE INTERCAMBIO DE PESTAÑAS
            function switchTab(tabId) {
                document.querySelectorAll('.tab-content-block').forEach(el => el.style.display = 'none');
                document.querySelectorAll('.reports__tab-btn').forEach(btn => btn.classList.remove('active'));
                
                document.getElementById('tab-' + tabId).style.display = 'block';
                event.currentTarget.classList.add('active');
                
                // Ocultar previsualización al cambiar de módulo
                document.getElementById('previewContainer').style.display = 'none';
            }

            // 2. INICIALIZACIÓN DE CHART.JS (Dashboard Principal)
            document.addEventListener("DOMContentLoaded", function() {
                
                // Gráfica de Barras - Trámites
                const ctxTramites = document.getElementById('tramitesChart').getContext('2d');
                new Chart(ctxTramites, {
                    type: 'bar',
                    data: {
                        labels: ['Divorcios', 'Herencias', 'Manutención', 'Supletorios', 'Curatelas'],
                        datasets: [{
                            label: 'Cantidad',
                            data: [24, 18, 35, 12, 9],
                            backgroundColor: '#2e394d', // var(--primary-background)
                            borderColor: '#182232',     // var(--primary)
                            borderWidth: 1,
                            borderRadius: 4,
                            barPercentage: 0.6
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: { legend: { display: false } },
                        scales: {
                            y: {
                                beginAtZero: true,
                                grid: { color: '#ebeef0' },
                                ticks: { font: { family: 'Inter', size: 11 } }
                            },
                            x: {
                                grid: { display: false },
                                ticks: { font: { family: 'Inter', size: 11, weight: 500 } }
                            }
                        }
                    }
                });

                // Gráfica de Anillo - Estatus de Casos
                const ctxEstatus = document.getElementById('estatusChart').getContext('2d');
                new Chart(ctxEstatus, {
                    type: 'doughnut',
                    data: {
                        labels: ['Activos', 'Pendientes', 'Cerrados'],
                        datasets: [{
                            data: [45, 15, 20],
                            backgroundColor: ['#069e4b', '#c7c7c7', '#e20000'], // Colores corporativos
                            borderWidth: 0,
                            hoverOffset: 4
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        cutout: '70%',
                        plugins: {
                            legend: {
                                position: 'bottom',
                                labels: {
                                    usePointStyle: true,
                                    padding: 20,
                                    font: { family: 'Inter', size: 12, weight: 500 }
                                }
                            }
                        }
                    }
                });
            });

            // 3. GENERACIÓN DE DATOS SIMULADOS PARA VISUALIZAR EN DATATABLES
            function generarPrevisualizacion(e, tipo) {
                e.preventDefault();
                
                const container = document.getElementById('previewContainer');
                const wrapper = document.getElementById('tableWrapper');
                const title = document.getElementById('previewTitle');
                
                let htmlTable = '';
                
                if (tipo === 'casos') {
                    title.innerHTML = '<i data-lucide="folder-open"></i> Previsualización: Reporte de Casos Jurídicos';
                    htmlTable = `
                        <table class="table__content" id="dtReporte">
                            <thead>
                                <tr>
                                    <th>N° Caso</th>
                                    <th>Cliente</th>
                                    <th>Abogado Asignado</th>
                                    <th>Fecha Apertura</th>
                                    <th>Estatus</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr><td><strong>CAS-2026-001</strong></td><td>María Almarza</td><td>Dr. Jhonny Dávila</td><td>12-04-2026</td><td><span style="color:green; font-weight:600;">Activo</span></td></tr>
                                <tr><td><strong>CAS-2026-004</strong></td><td>Pedro Jiménez</td><td>Dra. Marien Balona</td><td>05-05-2026</td><td><span style="color:orange; font-weight:600;">Archivado</span></td></tr>
                                <tr><td><strong>CAS-2026-009</strong></td><td>Carlos Rodríguez</td><td>Dr. Jesús Pérez</td><td>18-05-2026</td><td><span style="color:green; font-weight:600;">Activo</span></td></tr>
                                <tr><td><strong>CAS-2026-012</strong></td><td>Elena Mendoza</td><td>Dr. Beritzon Colmenares</td><td>01-06-2026</td><td><span style="color:red; font-weight:600;">Cerrado</span></td></tr>
                            </tbody>
                        </table>`;
                } else if (tipo === 'abogados') {
                    title.innerHTML = '<i data-lucide="scale"></i> Previsualización: Estado de Carga de Abogados';
                    htmlTable = `
                        <table class="table__content" id="dtReporte">
                            <thead>
                                <tr>
                                    <th>Abogado</th>
                                    <th>Cédula</th>
                                    <th>Especialidad Principal</th>
                                    <th>Casos Activos</th>
                                    <th>Disponibilidad</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr><td><strong>Dr. Jhonny Dávila</strong></td><td>V-32.266.365</td><td>Derecho Civil</td><td>4</td><td>Disponible</td></tr>
                                <tr><td><strong>Dra. Marien Balona</strong></td><td>V-25.760.513</td><td>Derecho de Familia</td><td>6</td><td>Carga Máxima</td></tr>
                                <tr><td><strong>Dr. Jesús Pérez</strong></td><td>V-32.437.593</td><td>Derecho Civil</td><td>3</td><td>Disponible</td></tr>
                                <tr><td><strong>Dr. Beritzon Colmenares</strong></td><td>V-33.390.116</td><td>Derecho Mercantil</td><td>2</td><td>Disponible</td></tr>
                            </tbody>
                        </table>`;
                } else if (tipo === 'clientes') {
                    title.innerHTML = '<i data-lucide="users"></i> Previsualización: Registro General de Clientes';
                    htmlTable = `
                        <table class="table__content" id="dtReporte">
                            <thead>
                                <tr>
                                    <th>Cédula / RIF</th>
                                    <th>Nombre del Cliente</th>
                                    <th>Teléfono</th>
                                    <th>Dirección</th>
                                    <th>Total Casos</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr><td><strong>V-14.205.114</strong></td><td>María Almarza</td><td>0414-5551234</td><td>Quíbor Centro</td><td>2</td></tr>
                                <tr><td><strong>V-18.941.002</strong></td><td>Pedro Jiménez</td><td>0424-6123456</td><td>Barrio El Chino</td><td>1</td></tr>
                                <tr><td><strong>V-22.304.881</strong></td><td>Carlos Rodríguez</td><td>0412-7894512</td><td>La Ermita</td><td>3</td></tr>
                            </tbody>
                        </table>`;
                }
                
                // Destruir instancia previa de DataTables si existe
                if ($.fn.DataTable.isDataTable('#dtReporte')) {
                    $('#dtReporte').DataTable().destroy();
                }
                
                wrapper.innerHTML = htmlTable;
                container.style.display = 'block';
                
                // Reinicializar los íconos de Lucide que se acaban de inyectar en el título dinámico
                lucide.createIcons();
                
                // Inicializar DataTables aplicando el estilo del sistema
                $('#dtReporte').DataTable({
                    "language": {
                        "url": "https://cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json"
                    },
                    "pageLength": 5,
                    "lengthMenu": [5, 10, 25],
                    "ordering": true,
                    "dom": '<"top"f>rt<"bottom"lp><"clear">'
                });
            }
        </script>
    </body>
</html>