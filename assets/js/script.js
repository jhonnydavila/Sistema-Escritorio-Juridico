// Manejo de Dropdowns en el Sidebar
const dropdowns = document.querySelectorAll('.sidebar-nav-dropdown');
dropdowns.forEach(dropdown => {
    dropdown.addEventListener('click', function() {
        const parent = this.closest('.sidebar-nav-item-dropdown');
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

// Inicialización de DataTables
document.addEventListener("DOMContentLoaded", () => {
    const tablas = document.querySelectorAll('#table');
    
    tablas.forEach(tabla => {
        if (!window.$.fn.DataTable.isDataTable(tabla)) {
            new DataTable(tabla, {
                "language": {
                    "url": "assets/plugins/dataTables.español.json"
                }
            });
        }
    });
});

// Lógica de Control de Pestañas (Tabs) Activos / Inactivos
document.addEventListener("DOMContentLoaded", () => {
    const tabs = document.querySelectorAll(".page-tab");
    const contenedorActivos = document.getElementById("page-active");
    const contenedorInactivos = document.getElementById("page-inactive");
    const tabla = document.querySelector('#table-inactive');
    
    function mostrarTab(status) {
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
            mostrarTab(status);
        });
    });
});


// Lógica de Tipo de Cliente
document.addEventListener('DOMContentLoaded', function() {
    const tipoCliente = document.getElementById('TipoCliente');
    
    if (tipoCliente) {
        tipoCliente.addEventListener('change', function() {
            const tipo = this.value;
            
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
            seccion.classList.remove('d-none');
            seccion.querySelectorAll('input').forEach(input => input.required = true);
        }
    }
});