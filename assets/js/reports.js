
// INICIALIZACIÓN DE LUCIDE ICONS (Al cargar el DOM)
document.addEventListener("DOMContentLoaded", function() {
    lucide.createIcons();
});

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
                backgroundColor: ['#197eb8', '#ffd037', '#cc0606'],
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

// Gráfica de Líneas - Evolución de Casos
    const ctxEvolucion = document.getElementById('evolucionCasosChart');
    if(ctxEvolucion) {
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
                        tension: 0.3, /* Curva suave */
                        fill: true
                    },
                    {
                        label: 'Casos Resueltos',
                        data: [8, 12, 10, 15, 18, 20],
                        borderColor: '#0d8b61',
                        backgroundColor: 'transparent',
                        borderWidth: 2,
                        tension: 0.3,
                        borderDash: [5, 5] /* Línea punteada para diferenciar */
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { 
                    legend: { 
                        position: 'top',
                        labels: { font: { family: 'Inter', size: 11 }, usePointStyle: true } 
                    } 
                },
                scales: {
                    y: { beginAtZero: true, grid: { color: '#ebeef0' } },
                    x: { grid: { display: false } }
                }
            }
        });
    }

    // Gráfica de Pastel - Especialidad de Casos
    const ctxEspecialidad = document.getElementById('especialidadCasosChart');
    if(ctxEspecialidad) {
        new Chart(ctxEspecialidad.getContext('2d'), {
            type: 'pie',
            data: {
                labels: ['Familia', 'Civil', 'Mercantil', 'Laboral'],
                datasets: [{
                    data: [40, 25, 20, 15],
                    backgroundColor: ['#f17108', '#2288cc', '#6024a5', '#e0e0e0'],
                    borderWidth: 1,
                    borderColor: '#ffffff'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'right',
                        labels: {
                            usePointStyle: true,
                            padding: 15,
                            font: { family: 'Inter', size: 11 }
                        }
                    }
                }
            }
        });
    }
// 3. Gráfica de Líneas Mutivariable - Tendencia de Carga por Abogado
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
                        borderColor: '#197eb8', // Azul casos
                        backgroundColor: 'transparent',
                        borderWidth: 2.5,
                        tension: 0.3, // Curvatura elegante
                        pointRadius: 4,
                        pointBackgroundColor: '#197eb8'
                    },
                    {
                        label: 'Abg. María Mendoza',
                        data: [9, 11, 18, 15, 20, 22],
                        borderColor: '#0d8b61', // Verde éxito
                        backgroundColor: 'transparent',
                        borderWidth: 2.5,
                        tension: 0.3,
                        pointRadius: 4,
                        pointBackgroundColor: '#0d8b61'
                    },
                    {
                        label: 'Abg. Carlos Rodríguez',
                        data: [15, 13, 12, 17, 16, 19],
                        borderColor: '#6024a5', // Violeta archivados/especial
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
                interaction: {
                    mode: 'index',
                    intersect: false // Permite ver los datos de todos los abogados al posicionar el cursor en el mes
                },
                plugins: {
                    legend: {
                        position: 'top',
                        labels: {
                            font: { family: 'Inter', size: 11, weight: 500 },
                            usePointStyle: true,
                            padding: 15
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: { color: '#ebeef0' },
                        ticks: { font: { family: 'Inter', size: 11 } },
                        title: {
                            display: true,
                            text: 'Nro. de Casos Activos',
                            font: { family: 'Inter', size: 11, weight: 600 }
                        }
                    },
                    x: {
                        grid: { display: false },
                        ticks: { font: { family: 'Inter', size: 11, weight: 500 } }
                    }
                }
            }
        });
    }