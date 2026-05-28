// Manejo de Dropdowns en el Sidebar
const dropdowns = document.querySelectorAll('.sidebar__nav-dropdown');
dropdowns.forEach(dropdown => {
    dropdown.addEventListener('click', function() {
        const parent = this.closest('.sidebar__nav-item-dropdown');
        // Cerrar otros dropdowns (Efecto Acordeón)
        document.querySelectorAll('.sidebar__nav-item-dropdown').forEach(item => {
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

// Lógica de Tipo de Cliente
document.addEventListener('DOMContentLoaded', function() {
    const tipoCliente = document.getElementById('tipoCliente');
    
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

// Lógica de los tabs de las paginas/secciones
document.addEventListener("DOMContentLoaded", () => {
    const tabs = document.querySelectorAll(".page__tab");
    const tabContents = document.querySelectorAll(".page__tab-panel");

    tabs.forEach(tab => {
        tab.addEventListener("click", () => {
            tabs.forEach(t => t.classList.remove("active"));
            tabContents.forEach(content => content.style.display = "none");

            tab.classList.add("active");
            const targetId = tab.getAttribute("data-target");
            const targetPanel = document.getElementById(targetId);
            
            if (targetPanel) {
                targetPanel.style.display = "block";
            }
        });
    });
});