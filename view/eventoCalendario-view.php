<!-- Bootstrap 5 CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Bootstrap Icons (requerido por FullCalendar para los botones) -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet">

<!-- FullCalendar Core y Plugin de Bootstrap 5 -->
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@fullcalendar/bootstrap5@6.1.11/index.global.min.js"></script>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include('includes/header.php'); ?>
        <title>Calendario de Eventos</title>
    </head>
    <body>
        <?php include ('includes/sidebar.php'); ?>
        
        <main class="main-content">
            <?php include ('includes/topbar.php'); ?>

            <section class="page__container">
                <div class="page__header">
                    <div class="page__header-titles">
                        <h2 class="page__header-title">Calendario de Eventos</h2>
                        <span class="page__header-subtitle">Gestión de Eventos</span>
                    </div>
                </div>
                <div class="page__content">
                    <div class="container mt-4">
                        <div id="calendario-mensual"></div>
                    </div>
                </div>
            </section>
        </main>

        <?php (include 'view/includes/footer.php'); ?>
    </body>
</html>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendario-mensual');
        
        var calendar = new FullCalendar.Calendar(calendarEl, {
        // Activa el tema de Bootstrap 5
        themeSystem: 'bootstrap5',
        
        // Define que la vista por defecto (y única) sea la mensual
        initialView: 'dayGridMonth',
        
        // Configura la barra superior
        headerToolbar: {
            left: 'prev', // Botones de navegación
            center: 'title',         // Título del mes actual
            right: 'next'                // Se deja vacío para que no existan otras vistas
        },
        
        // Cambia el idioma a español (opcional pero recomendado)
        locale: 'es',
        
        // Ejemplo de eventos básicos (fechas de audiencias, entrega de documentos, etc.)
        events: [
            {
            title: 'Revisión de documentos',
            start: '2026-05-25'
            }
        ]
        });
        
        calendar.render();
    });
</script>