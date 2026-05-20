<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include('includes/header.php'); ?>
        <title>Casos en Desarrollo</title>
    </head>
    <body>
        <?php include ('includes/sidebar.php'); ?>
        
        <main class="main-content">
            <?php include ('includes/topbar.php'); ?>

            <section class="page-container">
                <div class="page-header">
                    <div class="page-header-titles">
                        <h2 class="page-header-title">Casos en Desarrollo</h2>
                        <span class="page-header-subtitle">Gestión de Casos</span>
                    </div>
                </div>
                <div class="page-content">
                    <div class="row p-3 g-3">
                        <div class="col-lg-4 col-md-6">
                            <div class="page-card page-card-blue">
                                <div class="page-card-header">
                                    <span class="badge bg-dark">Asesoría</span>
                                    <span class="badge bg-success">En Desarrollo</span>
                                </div>
                                <div class="page-card-body">
                                    <p class="text-muted" style="font-size: 12px;">Código: CAS-2026-001</p>
                                    <h5 class="fs-6 fw-bold text-dark pb-2 border-bottom w-100">María Alejandra Pérez</h5>
                                    
                                    <div class="page-card-assigned">
                                        <div class="page-card-assigned-avatar">
                                            EJ
                                        </div>
                                        <div class="page-card-assigned-info">
                                            <span>Abogado asignado</span>
                                            <p>Dra. Elena Jiménez</p>
                                        </div>
                                    </div>
                                    
                                    <a href="#" class="page-card-footer">Ver Caso</a>
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
<!-- 
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div class="d-flex align-items-center gap-2">
                                        <span class="badge bg-info">Gestión Jurídica</span>
                                    </div>
                                    <span class="badge rounded-pill bg-warning-subtle text-warning-emphasis border border-warning-subtle px-2 py-1">Audiencia Pendiente</span>
                                </div> -->