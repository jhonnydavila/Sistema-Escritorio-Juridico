console.log('script.js cargado: inicio');

// Inicialización del sidebar y dropdowns
function initSidebarDropdowns() {
    const dropdowns = document.querySelectorAll('.sidebar-nav-dropdown');
    console.log('sidebar dropdowns detectados:', dropdowns.length);
    dropdowns.forEach(dropdown => {
        dropdown.addEventListener('click', function() {
            const parent = this.closest('.sidebar-nav-item-dropdown');
            console.log('sidebar dropdown clic:', parent ? parent.querySelector('.sidebar-nav-dropdown').textContent.trim() : 'sin padre');
            // Cerrar otros dropdowns (Efecto Acordeón)
            document.querySelectorAll('.sidebar-nav-item-dropdown').forEach(item => {
                if (item !== parent) {
                    item.classList.remove('active');
                }
            });
            // Alternar el actual
            if (parent) {
                parent.classList.toggle('active');
            }
        });
    });
}

// Inicialización de DataTables
document.addEventListener("DOMContentLoaded", () => {
    console.log('DOMContentLoaded: inicializando script.js');
    initSidebarDropdowns();
    console.log('DOMContentLoaded: inicializando DataTables');
    const tablas = document.querySelectorAll('#table');
    console.log('tablas encontradas para DataTable:', tablas.length);
    
    tablas.forEach(tabla => {
        if (!window.$ || !window.$.fn || !window.$.fn.DataTable) {
            console.warn('DataTables no está disponible en window.$. Revisa que el plugin esté cargado.');
            return;
        }

        if (!window.$.fn.DataTable.isDataTable(tabla)) {
            console.log('Inicializando tabla:', tabla);
            new DataTable(tabla, {
                "language": {
                    "url": "assets/plugins/dataTables.español.json"
                }
            });
        } else {
            console.log('Tabla ya estaba inicializada:', tabla);
        }
    });
});

// Lógica de Control de Pestañas (Tabs) Activos / Inactivos
document.addEventListener("DOMContentLoaded", () => {
    console.log('DOMContentLoaded: inicializando pestañas');
    const tabs = document.querySelectorAll(".page-tab");
    const contenedorActivos = document.getElementById("page-active");
    const contenedorInactivos = document.getElementById("page-inactive");
    const tabla = document.querySelector('#table-inactive');
    
    function mostrarTab(status) {
        console.log('mostrarTab:', status);
        tabs.forEach(tab => {
            tab.classList.toggle("active", tab.getAttribute("data-status") === status);
        });

        if (status === "Activo") {
            if (contenedorActivos) {
                contenedorActivos.style.display = "block";
            }
            if (contenedorInactivos) {
                contenedorInactivos.style.display = "none";
            }
        } else if (status === "Inactivo") {
            if (tabla && !DataTable.isDataTable(tabla)){
                console.log('Inicializando tabla inactiva:', tabla);
                new DataTable(tabla, {
                    "language": {
                        "url": "assets/plugins/dataTables.español.json"
                    }
                });
            }
            if (contenedorInactivos) contenedorInactivos.style.display = "block";
            if (contenedorActivos) contenedorActivos.style.display = "none";
        }
    }

    // Inicializa la interfaz mostrando los abogados activos por defecto
    mostrarTab("Activo");

    // Evento click para cambiar dinámicamente entre pestañas
    tabs.forEach(tab => {
        tab.addEventListener("click", () => {
            const status = tab.getAttribute("data-status");
            console.log('tab click:', status);
            mostrarTab(status);
        });
    });
});


// Lógica de Tipo de Cliente
document.addEventListener('DOMContentLoaded', function() {
    const tipoCliente = document.getElementById('TipoCliente');
    console.log('DOMContentLoaded: tipoCliente detectado?', !!tipoCliente);
    
    if (tipoCliente) {
        tipoCliente.addEventListener('change', function() {
            const tipo = this.value;
            console.log('Tipo de cliente cambiado a:', tipo);
            
            const natural = document.getElementById('campos-naturales');
            const juridico = document.getElementById('campos-juridicos');
            const comunes = document.getElementById('campos-comunes');
            const secciones = [natural, juridico, comunes];

            secciones.forEach(section => {
                if (section) {
                    section.classList.add('d-none');
                    section.querySelectorAll('input').forEach(input => input.required = false);
                }
            });

            if (tipo === 'natural') {
                mostrarSeccion(natural);
                mostrarSeccion(comunes);
            } else if (tipo === 'juridico') {
                mostrarSeccion(juridico);
                mostrarSeccion(comunes);
            }
        });
    }

    function mostrarSeccion(seccion) {
        if (seccion) {
            console.log('mostrando seccion:', seccion.id);
            seccion.classList.remove('d-none');
            seccion.querySelectorAll('input').forEach(input => input.required = true);
        }
    }
});