<!DOCTYPE html>
<html lang="es">
    <head>
        <?php include('includes/header.php'); ?>
        <title>Sistema - Panel de Control</title>
    </head>
    <body>
        <?php include('includes/sidebar.php'); ?>
        
        <main class="main-content">
            <?php include('includes/topbar.php'); ?>
            <section class="page__container">
                <div class="page__header">
                    <div class="page__header-titles" data-usal="fade-r duration-500">
                        <h2 class="page__header-title">Panel de 
                            <?php 
                                if (isset($_SESSION['rolUsuario']) && $_SESSION['rolUsuario'] === 'administrador') {
                                    echo 'Control';
                                } else if(isset($_SESSION['rolUsuario']) && $_SESSION['rolUsuario'] === 'abogado') {
                                    echo 'Abogado';
                                } else {
                                    echo 'Secretaria';
                                }
                            ?> 
                        </h2>
                        <span class="page__header-subtitle text-capitalize">Bienvenido "<?php echo $_SESSION['nombreUsuario'] . ' ' . $_SESSION['apellidoUsuario']; ?>"</span>
                    </div>
                </div>
                <div class="row g-3" data-usal="split-item split-fade-r split-delay-100">

                    <?php if (isset($_SESSION['rolUsuario']) && ($_SESSION['rolUsuario'] === 'administrador' || $_SESSION['rolUsuario'] === 'abogado')) { ?>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="card__home">
                            <div class="card__home-header">
                                <div class="card__home-icon">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M12 3v18"/>
                                        <path d="m19 8 3 8a5 5 0 0 1-6 0zV7"/>
                                        <path d="M3 7h1a17 17 0 0 0 8-2 17 17 0 0 0 8 2h1"/>
                                        <path d="m5 8 3 8a5 5 0 0 1-6 0zV7"/>
                                        <path d="M7 21h10"/>
                                    </svg>
                                </div>
                                <h3>Casos</h3>
                            </div>
                            <div class="card__home-body">
                                <p class="stats"><?php echo $casosActivos; ?></p>
                                <span class="stats-label">Procesos en Desarrollo</span>
                            </div>
                        </div>
                    </div>
                    <?php } ?>

                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="card__home">
                            <div class="card__home-header">
                                <div class="card__home-icon">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-clipboard-list-icon lucide-clipboard-list">
                                        <rect width="8" height="4" x="8" y="2" rx="1" ry="1"/>
                                        <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"/>
                                        <path d="M12 11h4"/>
                                        <path d="M12 16h4"/>
                                        <path d="M8 11h.01"/>
                                        <path d="M8 16h.01"/>
                                    </svg>
                                </div>
                                <h3>Trámites</h3>
                            </div>
                            <div class="card__home-body">
                                <p class="stats"><?php echo $totalTramites; ?></p>
                                <span class="stats-label">Registrados en el sistema</span>
                            </div>
                        </div>
                    </div>

                    <?php if (isset($_SESSION['rolUsuario']) && ($_SESSION['rolUsuario'] === 'administrador' || $_SESSION['rolUsuario'] === 'abogado')) { ?>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="card__home">
                            <div class="card__home-header">
                                <div class="card__home-icon">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M8 2v4"/>
                                        <path d="M16 2v4"/>
                                        <rect width="18" height="18" x="3" y="4" rx="2"/>
                                        <path d="M3 10h18"/>
                                    </svg>
                                </div>
                                <h3>Eventos</h3>
                            </div>
                            <div class="card__home-body">
                                <p class="stats"><?php echo $totalEventos; ?></p>
                                <span class="stats-label">Próximos en agenda</span>
                            </div>
                        </div>
                    </div>
                    <?php } ?>

                    <?php if (isset($_SESSION['rolUsuario']) && ($_SESSION['rolUsuario'] === 'administrador' || $_SESSION['rolUsuario'] === 'abogado')) { ?>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="card__home">
                            <div class="card__home-header">
                                <div class="card__home-icon">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M19 7V4a1 1 0 0 0-1-1H5a2 2 0 0 0 0 4h15a1 1 0 0 1 1 1v4h-3a2 2 0 0 0 0 4h3a1 1 0 0 0 1-1v-2a1 1 0 0 0-1-1"/>
                                        <path d="M3 5v14a2 2 0 0 0 2 2h15a1 1 0 0 0 1-1v-4"/>
                                    </svg>
                                </div>
                                <h3>Honorarios</h3>
                            </div>
                            <div class="card__home-body">
                                <p class="stats"><?php echo $totalHonorarios; ?></p>
                                <span class="stats-label">Honorarios pendientes</span>
                            </div>
                        </div>
                    </div>
                    <?php } ?>

                    <?php if (isset($_SESSION['rolUsuario']) && ($_SESSION['rolUsuario'] === 'administrador' || $_SESSION['rolUsuario'] === 'abogado')) { ?>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="card__home">
                            <div class="card__home-header">
                                <div class="card__home-icon">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M13 16H8"/><path d="M14 8H8"/><path d="M16 12H8"/><path d="M4 3a1 1 0 0 1 1-1 1.3 1.3 0 0 1 .7.2l.933.6a1.3 1.3 0 0 0 1.4 0l.934-.6a1.3 1.3 0 0 1 1.4 0l.933.6a1.3 1.3 0 0 0 1.4 0l.933-.6a1.3 1.3 0 0 1 1.4 0l.934.6a1.3 1.3 0 0 0 1.4 0l.933-.6A1.3 1.3 0 0 1 19 2a1 1 0 0 1 1 1v18a1 1 0 0 1-1 1 1.3 1.3 0 0 1-.7-.2l-.933-.6a1.3 1.3 0 0 0-1.4 0l-.934.6a1.3 1.3 0 0 1-1.4 0l-.933-.6a1.3 1.3 0 0 0-1.4 0l-.933.6a1.3 1.3 0 0 1-1.4 0l-.934-.6a1.3 1.3 0 0 0-1.4 0l-.933.6a1.3 1.3 0 0 1-.7.2 1 1 0 0 1-1-1z"/>
                                    </svg>
                                </div>
                                <h3>Pagos</h3>
                            </div>
                            <div class="card__home-body">
                                <p class="stats"><?php echo $totalPagos; ?></p>
                                <span class="stats-label">Registrados</span>
                            </div>
                        </div>
                    </div>

                    <?php if (isset($_SESSION['rolUsuario']) && ($_SESSION['rolUsuario'] === 'administrador' || $_SESSION['rolUsuario'] === 'abogado')) { ?>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="card__home">
                            <div class="card__home-header">
                                <div class="card__home-icon">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M6 22a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h8a2.4 2.4 0 0 1 1.704.706l3.588 3.588A2.4 2.4 0 0 1 20 8v12a2 2 0 0 1-2 2z"/>
                                        <path d="M14 2v5a1 1 0 0 0 1 1h5"/>
                                    </svg>
                                </div>
                                <h3>Documentos</h3>
                            </div>
                            <div class="card__home-body">
                                <p class="stats"><?php echo $totalDocumentos; ?></p>
                                <span class="stats-label">Archivos subidos</span>
                            </div>
                        </div>
                    </div>
                    <?php } ?>

                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="card__home">
                            <div class="card__home-header">
                                <div class="card__home-icon">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/>
                                        <circle cx="12" cy="7" r="4"/>
                                    </svg>
                                </div>
                                <h3>Clientes</h3>
                            </div>
                            <div class="card__home-body">
                                <p class="stats"><?php echo $totalClientes; ?></p>
                                <span class="stats-label">Registrados Totales</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="card__home">
                            <div class="card__home-header">
                                <div class="card__home-icon">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="m14 13-8.381 8.38a1 1 0 0 1-3.001-3l8.384-8.381"/>
                                        <path d="m16 16 6-6"/>
                                        <path d="m21.5 10.5-8-8"/>
                                        <path d="m8 8 6-6"/>
                                        <path d="m8.5 7.5 8 8"/>
                                    </svg>
                                </div>
                                <h3>Abogados</h3>
                            </div>
                            <div class="card__home-body">
                                <p class="stats"><?php echo $abogadosActivos; ?></p>
                                <span class="stats-label">Activos en sistema</span>
                            </div>
                        </div>
                    </div>

                    <?php if (isset($_SESSION['rolUsuario']) && $_SESSION['rolUsuario'] === 'administrador') { ?>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="card__home">
                            <div class="card__home-header">
                                <div class="card__home-icon">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M14 18a2 2 0 0 0-4 0"/>
                                        <path d="m19 11-2.11-6.657a2 2 0 0 0-2.752-1.148l-1.276.61A2 2 0 0 1 12 4H8.5a2 2 0 0 0-1.925 1.456L5 11"/>
                                        <path d="M2 11h20"/>
                                        <circle cx="17" cy="18" r="3"/>
                                        <circle cx="7" cy="18" r="3"/>
                                    </svg>
                                </div>
                                <h3>Usuarios</h3>
                            </div>
                            <div class="card__home-body">
                                <p class="stats"><?php echo $totalUsuarios; ?></p>
                                <span class="stats-label">Cuentas con acceso</span>
                            </div>
                        </div>
                    </div>

                    <?php } ?>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="card__home">
                            <div class="card__home-header">
                                <div class="card__home-icon">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                                    </svg>
                                </div>
                                <h3>Representantes</h3>
                            </div>
                            <div class="card__home-body">
                                <p class="stats"><?php echo $totalRepresentantes; ?></p>
                                <span class="stats-label">Registrados</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="card__home">
                            <div class="card__home-header">
                                <div class="card__home-icon">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <rect width="20" height="5" x="2" y="3" rx="1"/><path d="M4 8v11a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8"/><path d="M10 12h4"/>
                                    </svg>
                                </div>
                                <h3>Archivadores</h3>
                            </div>
                            <div class="card__home-body">
                                <p class="stats"><?php echo $totalArchivadores; ?></p>
                                <span class="stats-label">En sistema</span>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </section>
        </main>
        <?php include ('includes/footer.php'); ?>
    </body>
</html>