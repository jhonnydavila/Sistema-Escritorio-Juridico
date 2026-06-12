// ==========================================================
// INICIALIZACIÓN DE COMPONENTES Y GRÁFICAS (MÓDULO REPORTES)
// ==========================================================

document.addEventListener("DOMContentLoaded", function() {
    // 1. Inicialización de Iconos Lucide
    if (typeof lucide !== 'undefined') {
        lucide.createIcons();
    }

    // Configuración global por defecto para Chart.js (Tipografía)
    if (typeof Chart !== 'undefined') {
        Chart.defaults.font.family = "'Inter', 'Helvetica', 'Arial', sans-serif";
    } else {
        console.error("Chart.js no está cargado en el proyecto.");
        return;
    }

    // ==========================================
    // PANEL: ESTADÍSTICAS (DASHBOARD PRINCIPAL)
    // ==========================================

    // Gráfica de Barras - Ejecución de Trámites Civiles
    const ctxTramites = document.getElementById('tramitesChart');
    if (ctxTramites) {
        new Chart(ctxTramites.getContext('2d'), {
            type: 'bar',
            data: {
                labels: ['Divorcios', 'Herencias', 'Manutención', 'Supletorios', 'Curatelas'],
                datasets: [{
                    label: 'Cantidad',
                    data: [24, 18, 35, 12, 9],
                    backgroundColor: '#2e394d',
                    borderColor: '#182232',
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
                        ticks: { font: { size: 11 } }
                    },
                    x: {
                        grid: { display: false },
                        ticks: { font: { size: 11, weight: 500 } }
                    }
                }
            }
        });
    }

    // Gráfica de Líneas Multivariable - Tendencia de Carga por Abogado
    const ctxAbogados = document.getElementById('tendenciaAbogadosChart');
    if (ctxAbogados) {
        new Chart(ctxAbogados.getContext('2d'), {
            type: 'line',
            data: {
                labels: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun'],
                datasets: [
                    {
                        label: 'Abg. Alejandro Jiménez',
                        data: [12, 16, 14, 21, 23, 28],
                        borderColor: '#197eb8',
                        backgroundColor: 'transparent',
                        borderWidth: 2.5,
                        tension: 0.3,
                        pointRadius: 4,
                        pointBackgroundColor: '#197eb8'
                    },
                    {
                        label: 'Abg. María Mendoza',
                        data: [9, 11, 18, 15, 20, 22],
                        borderColor: '#0d8b61',
                        backgroundColor: 'transparent',
                        borderWidth: 2.5,
                        tension: 0.3,
                        pointRadius: 4,
                        pointBackgroundColor: '#0d8b61'
                    },
                    {
                        label: 'Abg. Carlos Rodríguez',
                        data: [15, 13, 12, 17, 16, 19],
                        borderColor: '#6024a5',
                        backgroundColor: 'transparent',
                        borderWidth: 2.5,
                        tension: 0.3,
                        pointRadius: 4,
                        pointBackgroundColor: '#6024a5'
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                interaction: { mode: 'index', intersect: false },
                plugins: {
                    legend: {
                        position: 'top',
                        labels: { font: { size: 11, weight: 500 }, usePointStyle: true, padding: 15 }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: { color: '#ebeef0' },
                        ticks: { font: { size: 11 } },
                        title: { display: true, text: 'Nro. de Casos Activos', font: { size: 11, weight: 600 } }
                    },
                    x: {
                        grid: { display: false },
                        ticks: { font: { size: 11, weight: 500 } }
                    }
                }
            }
        });
    }
    
    const ctxRendimientoGlobal = document.getElementById('rendimientoGlobalChart')?.getContext('2d');
    if (ctxRendimientoGlobal) {
        new Chart(ctxRendimientoGlobal, {
            type: 'line',
            data: {
                labels: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun'],
                datasets: [{
                    label: 'Meta Alcanzada %',
                    data: [75, 82, 80, 88, 92, 88], // Porcentajes simulados de rendimiento global
                    borderColor: '#2288cc',
                    backgroundColor: 'rgba(34, 136, 204, 0.1)',
                    borderWidth: 2,
                    fill: true,
                    tension: 0.3
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 100,
                        ticks: { callback: value => value + '%' }
                    }
                }
            }
        });
    }

    // ==========================================
    // PANEL: CASOS
    // ==========================================

    // Gráfica de Líneas - Evolución de Casos (Ingresos vs Resoluciones)
    const ctxEvolucion = document.getElementById('evolucionCasosChart');
    if (ctxEvolucion) {
        new Chart(ctxEvolucion.getContext('2d'), {
            type: 'line',
            data: {
                labels: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun'],
                datasets: [
                    {
                        label: 'Nuevos Ingresos',
                        data: [12, 19, 15, 25, 22, 28],
                        borderColor: '#2288cc',
                        backgroundColor: 'rgba(34, 136, 204, 0.1)',
                        borderWidth: 2,
                        tension: 0.3,
                        fill: true
                    },
                    {
                        label: 'Casos Resueltos',
                        data: [8, 12, 10, 15, 18, 20],
                        borderColor: '#0d8b61',
                        backgroundColor: 'transparent',
                        borderWidth: 2,
                        tension: 0.3,
                        borderDash: [5, 5]
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { position: 'top', labels: { font: { size: 11 }, usePointStyle: true } }
                },
                scales: {
                    y: { beginAtZero: true, grid: { color: '#ebeef0' } },
                    x: { grid: { display: false } }
                }
            }
        });
    }

    // Gráfica de Anillo - Estatus Global de Casos en Tab
    const ctxEstCasos = document.getElementById('estatusCasosTabChart');
    if (ctxEstCasos) {
        new Chart(ctxEstCasos.getContext('2d'), {
            type: 'doughnut',
            data: {
                labels: ['Activos', 'Pendientes', 'Cerrados'],
                datasets: [{
                    data: [32, 12, 112],
                    backgroundColor: ['#2288cc', '#f17108', '#0d8b61'],
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
                        labels: { usePointStyle: true, padding: 15, font: { size: 11, weight: 500 } }
                    }
                }
            }
        });
    }

    // ==========================================
    // PANEL: TRÁMITES
    // ==========================================

    // Gráfica de Líneas Multivariable - Tendencia de Todos los Trámites del Semestre
    const ctxTendenciaTramites = document.getElementById('tendenciaTramitesChart');
    if (ctxTendenciaTramites) {
        new Chart(ctxTendenciaTramites.getContext('2d'), {
            type: 'line',
            data: {
                labels: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun'],
                datasets: [
                    {
                        label: 'Divorcios',
                        data: [5, 8, 4, 7, 6, 9],
                        borderColor: '#2288cc',
                        backgroundColor: 'transparent',
                        borderWidth: 2,
                        tension: 0.3,
                        pointRadius: 3
                    },
                    {
                        label: 'Herencias',
                        data: [3, 5, 2, 6, 4, 5],
                        borderColor: '#0d8b61',
                        backgroundColor: 'transparent',
                        borderWidth: 2,
                        tension: 0.3,
                        pointRadius: 3
                    },
                    {
                        label: 'Manutención',
                        data: [10, 12, 15, 11, 14, 16],
                        borderColor: '#f17108',
                        backgroundColor: 'transparent',
                        borderWidth: 2,
                        tension: 0.3,
                        pointRadius: 3
                    },
                    {
                        label: 'Supletorios',
                        data: [2, 4, 3, 5, 2, 4],
                        borderColor: '#6024a5',
                        backgroundColor: 'transparent',
                        borderWidth: 2,
                        tension: 0.3,
                        pointRadius: 3
                    },
                    {
                        label: 'Curatelas',
                        data: [1, 2, 1, 3, 2, 3],
                        borderColor: '#2e394d',
                        backgroundColor: 'transparent',
                        borderWidth: 2,
                        tension: 0.3,
                        pointRadius: 3
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                interaction: { mode: 'index', intersect: false },
                plugins: {
                    legend: {
                        position: 'top',
                        labels: { font: { size: 11, weight: 500 }, usePointStyle: true, padding: 10 }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: { color: '#ebeef0' },
                        title: { display: true, text: 'Cantidad Iniciada', font: { size: 11, weight: 600 } }
                    },
                    x: { grid: { display: false } }
                }
            }
        });
    }

    // Gráfica de Barras Horizontal - Total Histórico de Trámites
    const ctxHistoricoTramites = document.getElementById('totalHistoricoTramitesChart');
    if (ctxHistoricoTramites) {
        new Chart(ctxHistoricoTramites.getContext('2d'), {
            type: 'bar',
            data: {
                labels: ['Divorcios', 'Herencias', 'Manutención', 'Supletorios', 'Curatelas'],
                datasets: [{
                    label: 'Total Acumulado',
                    data: [124, 88, 215, 62, 45],
                    backgroundColor: '#2e394d',
                    borderColor: '#182232',
                    borderWidth: 1,
                    borderRadius: 4,
                    barPercentage: 0.6
                }]
            },
            options: {
                indexAxis: 'y', // Convierte la gráfica a horizontal para que coincida con tu layout css
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: {
                    x: {
                        beginAtZero: true,
                        grid: { color: '#ebeef0' },
                        ticks: { font: { size: 11 } }
                    },
                    y: {
                        grid: { display: false },
                        ticks: { font: { size: 11, weight: 500 } }
                    }
                }
            }
        });
    }

    // ==========================================
    // PANEL: ABOGADOS
    // ==========================================

    // Gráfica de Barras - Rendimiento Mensual de Abogados
    const ctxAbog = document.getElementById('rendimientoAbogadosChart');
    if (ctxAbog) {
        new Chart(ctxAbog.getContext('2d'), {
            type: 'bar',
            data: {
                labels: ['Alejandro J.', 'María M.', 'Carlos R.'],
                datasets: [{
                    label: 'Casos Resueltos',
                    data: [12, 15, 8],
                    backgroundColor: '#6024a5',
                    borderRadius: 4,
                    barPercentage: 0.5
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: {
                    y: { beginAtZero: true, grid: { color: '#ebeef0' } },
                    x: { grid: { display: false } }
                }
            }
        });
    }

    // Gráfica de Torta/Anillo - Especialidades del Bufete (Faltante Anteriormente)
    const ctxPorcentajeResolucion = document.getElementById('porcentajeResolucionChart')?.getContext('2d');
    if (ctxPorcentajeResolucion) {
        new Chart(ctxPorcentajeResolucion, {
            type: 'doughnut',
            data: {
                labels: ['Ganados (Sentencia Favorable)', 'Conciliados', 'Archivados / Desistidos'],
                datasets: [{
                    data: [65, 23, 12], // Suma 100%
                    backgroundColor: ['#0d8b61', '#2288cc', '#f17108'],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: { boxWidth: 12 }
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return ` ${context.label}: ${context.raw}%`;
                            }
                        }
                    }
                }
            }
        });
    }

    // ==========================================
    // PANEL: CLIENTES
    // ==========================================

    // Gráfica de Pastel - Tipo de Cliente (Naturales vs Jurídicos)
    const ctxCli = document.getElementById('tipoClientesChart');
    if (ctxCli) {
        new Chart(ctxCli.getContext('2d'), {
            type: 'pie',
            data: {
                labels: ['Naturales', 'Jurídicos'],
                datasets: [{
                    data: [98, 44],
                    backgroundColor: ['#2288cc', '#f17108'],
                    borderWidth: 1,
                    borderColor: '#ffffff'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: { usePointStyle: true, padding: 15, font: { size: 11, weight: 500 } }
                    }
                }
            }
        });
    }

    // Gráfica de Líneas - Captación Mensual de Clientes (Faltante Anteriormente)
    const ctxCaptacion = document.getElementById('captacionClientesChart');
    if (ctxCaptacion) {
        new Chart(ctxCaptacion.getContext('2d'), {
            type: 'line',
            data: {
                labels: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun'],
                datasets: [{
                    label: 'Registros Nuevos',
                    data: [10, 15, 12, 22, 18, 25],
                    borderColor: '#0d8b61',
                    backgroundColor: 'rgba(13, 139, 97, 0.08)',
                    borderWidth: 2,
                    tension: 0.3,
                    fill: true,
                    pointRadius: 4,
                    pointBackgroundColor: '#0d8b61'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: {
                    y: { beginAtZero: true, grid: { color: '#ebeef0' } },
                    x: { grid: { display: false } }
                }
            }
        });
    }
});
