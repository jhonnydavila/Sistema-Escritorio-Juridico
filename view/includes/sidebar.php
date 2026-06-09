<?php 
    $pagina_actual = isset($_GET['page']) ? $_GET['page'] : 'home'; 
?>
<div class="sidebar__container">
    <div class="sidebar__header">
        <div class="sidebar__header-logo">
           <img src="assets/img/logo-icono.svg" alt="Familia Jiménez" style="width:42px;height:42px;">
        </div>
        <div>
            <h3 class="sidebar__header-title">Seguimiento</h3>
            <p class="sidebar__header-subtitle">Casos Juridicos</p>
        </div>
    </div>
    
    <nav class="sidebar__nav">
        <a class="sidebar__nav-item <?php echo ($pagina_actual == 'home') ? 'active' : ''; ?>" href="home">
            <svg width="1.3rem" height="1.3rem" viewBox="0 0 24 24" fill="currentColor">
                <path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z"/>
            </svg>
            <span>Panel de 
                <?php 
                    if (isset($_SESSION['rolUsuario']) && $_SESSION['rolUsuario'] === 'administrador') {
                        echo 'Control';
                    } else if(isset($_SESSION['rolUsuario']) && $_SESSION['rolUsuario'] === 'abogado') {
                        echo 'Abogado';
                    } else {
                        echo 'Secretaria';
                    }
                ?> 
            </span>
        </a>

        <?php if(isset($_SESSION['rolUsuario']) && $_SESSION['rolUsuario'] === 'administrador') { ?>
        <div class="sidebar__nav-item-dropdown <?php echo ($pagina_actual == 'usuario') ? 'active' : ''; ?>">
            <div class="sidebar__nav-dropdown">
                <svg width="1.2rem" height="1.2rem" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-hat-glasses-icon lucide-hat-glasses">
                    <path d="M14 18a2 2 0 0 0-4 0"/><path d="m19 11-2.11-6.657a2 2 0 0 0-2.752-1.148l-1.276.61A2 2 0 0 1 12 4H8.5a2 2 0 0 0-1.925 1.456L5 11"/><path d="M2 11h20"/><circle cx="17" cy="18" r="3"/><circle cx="7" cy="18" r="3"/>
                </svg>
                <span>Gestionar Usuarios</span>
                <svg class="dropdown-arrow" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-left: auto;">
                    <path d="m6 9 6 6 6-6"/>
                </svg>
            </div>
            <form action="usuario" method="POST" class="sidebar__nav-dropdown-menu">
                <button type="submit" class="sidebar__nav-item <?php echo isset($_POST['usuarioRegistrar']) ? 'active' : ''; ?>" name="usuarioRegistrar"><span>Registrar Usuario</span></button>
                <button type="submit" class="sidebar__nav-item <?php echo isset($_POST['usuarioConsultar']) ? 'active' : ''; ?>" name="usuarioConsultar"><span>Consultar Usuarios</span></button>
            </form>
        </div>
        <?php } ?>
        
        <div class="sidebar__nav-item-dropdown <?php echo ($pagina_actual == 'tramite') ? 'active' : ''; ?>">
            <div class="sidebar__nav-dropdown">
                <svg width="1.3rem" height="1.3rem" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-clipboard-list-icon lucide-clipboard-list">
                    <rect width="8" height="4" x="8" y="2" rx="1" ry="1"/><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"/><path d="M12 11h4"/><path d="M12 16h4"/><path d="M8 11h.01"/><path d="M8 16h.01"/>
                </svg>
                <span>Gestionar Trámites</span>
                <svg class="dropdown-arrow" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-left: auto;">
                    <path d="m6 9 6 6 6-6"/>
                </svg>
            </div>
            <form action="tramite" method="POST" class="sidebar__nav-dropdown-menu">
                <?php if(isset($_SESSION['rolUsuario']) && ($_SESSION['rolUsuario'] === 'administrador' || $_SESSION['rolUsuario'] === 'abogado')) { ?>
                <button type="submit" class="sidebar__nav-item <?php echo isset($_POST['tramiteRegistrar']) ? 'active' : ''; ?>" name="tramiteRegistrar"><span>Registrar Trámite</span></button>
                <?php } ?>
                <button type="submit" class="sidebar__nav-item <?php echo isset($_POST['tramiteConsultar']) ? 'active' : ''; ?>" name="tramiteConsultar"><span>Consultar Trámites</span></button>
            </form>
        </div>
        
        <div class="sidebar__nav-item-dropdown <?php echo ($pagina_actual == 'abogado') ? 'active' : ''; ?>">
            <div class="sidebar__nav-dropdown">
                <svg width="1.2rem" height="1.2rem" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-gavel-icon lucide-gavel">
                    <path d="m14 13-8.381 8.38a1 1 0 0 1-3.001-3l8.384-8.381"/><path d="m16 16 6-6"/><path d="m21.5 10.5-8-8"/><path d="m8 8 6-6"/><path d="m8.5 7.5 8 8"/>
                </svg>
                <span>Gestionar Abogados</span>
                <svg class="dropdown-arrow" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-left: auto;">
                    <path d="m6 9 6 6 6-6"/>
                </svg>
            </div>
            <form action="abogado" method="POST" class="sidebar__nav-dropdown-menu">
                <?php if(isset($_SESSION['rolUsuario']) && $_SESSION['rolUsuario'] === 'administrador') { ?>
                <button type="submit" class="sidebar__nav-item <?php echo isset($_POST['abogadoRegistrar']) ? 'active' : ''; ?>" name="abogadoRegistrar"><span>Registrar Abogado</span></button>
                <?php } ?>
                <button type="submit" class="sidebar__nav-item <?php echo isset($_POST['abogadoConsultar']) ? 'active' : ''; ?>" name="abogadoConsultar"><span>Consultar Abogados</span></button>
            </form>
        </div>

        <div class="sidebar__nav-item-dropdown <?php echo ($pagina_actual == 'cliente') ? 'active' : ''; ?>">
            <div class="sidebar__nav-dropdown">
                <svg width="1.2rem" height="1.2rem" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user-icon lucide-user">
                    <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/>
                </svg>
                <span>Gestionar Clientes</span>
                <svg class="dropdown-arrow" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-left: auto;">
                    <path d="m6 9 6 6 6-6"/>
                </svg>
            </div>
            <form action="cliente" method="POST" class="sidebar__nav-dropdown-menu">
                <button type="submit" class="sidebar__nav-item <?php echo isset($_POST['clienteRegistrar']) ? 'active' : ''; ?>" name="clienteRegistrar"><span>Registrar Cliente</span></button>
                <button type="submit" class="sidebar__nav-item <?php echo isset($_POST['clienteConsultar']) ? 'active' : ''; ?>" name="clienteConsultar"><span>Consultar Clientes</span></button>
            </form>
        </div>

        <div class="sidebar__nav-item-dropdown <?php echo ($pagina_actual == 'representante') ? 'active' : ''; ?>">
            <div class="sidebar__nav-dropdown">
                <svg width="1.2rem" height="1.2rem" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users-icon lucide-users">
                    <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                </svg>
                <span>Gestionar Representantes</span>
                <svg class="dropdown-arrow" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-left: auto;">
                    <path d="m6 9 6 6 6-6"/>
                </svg>
            </div>
            <form action="representante" method="POST" class="sidebar__nav-dropdown-menu">
                <button type="submit" class="sidebar__nav-item <?php echo isset($_POST['representanteRegistrar']) ? 'active' : ''; ?>" name="representanteRegistrar"><span>Registrar Representante</span></button>
                <button type="submit" class="sidebar__nav-item <?php echo isset($_POST['representanteConsultar']) ? 'active' : ''; ?>" name="representanteConsultar"><span>Consultar Representantes</span></button>
            </form>
        </div>

        <div class="sidebar__nav-item-dropdown <?php echo ($pagina_actual == 'caso') ? 'active' : ''; ?>">
            <div class="sidebar__nav-dropdown">
                <svg width="1.3rem" height="1.3rem" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-scale-icon lucide-scale">
                    <path d="M12 3v18"/><path d="m19 8 3 8a5 5 0 0 1-6 0zV7"/><path d="M3 7h1a17 17 0 0 0 8-2 17 17 0 0 0 8 2h1"/><path d="m5 8 3 8a5 5 0 0 1-6 0zV7"/><path d="M7 21h10"/>
                </svg>
                <span>Gestionar Casos</span>
                <svg class="dropdown-arrow" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-left: auto;">
                    <path d="m6 9 6 6 6-6"/>
                </svg>
            </div>
            <form action="caso" method="POST" class="sidebar__nav-dropdown-menu">
                <button type="submit" class="sidebar__nav-item <?php echo isset($_POST['casoRegistrar']) ? 'active' : ''; ?>" name="casoRegistrar"><span>Registrar Caso</span></button>
                <?php if(isset($_SESSION['rolUsuario']) && ($_SESSION['rolUsuario'] === 'administrador' || $_SESSION['rolUsuario'] === 'abogado')) { ?>
                <button type="submit" class="sidebar__nav-item <?php echo isset($_POST['casoConsultar']) ? 'active' : ''; ?>" name="casoConsultar"><span>Consultar Casos</span></button>
                <button type="submit" class="sidebar__nav-item <?php echo isset($_POST['expedienteConsultar']) ? 'active' : ''; ?>" name="expedienteConsultar"><span>Consultar Expedientes</span></button>
                <?php } ?>
            </form>
        </div>

        <div class="sidebar__nav-item-dropdown <?php echo ($pagina_actual == 'asignacion') ? 'active' : ''; ?>">
            <div class="sidebar__nav-dropdown">
                <svg width="1.3rem" height="1.3rem" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-clipboard-check-icon lucide-clipboard-check">
                    <rect width="8" height="4" x="8" y="2" rx="1" ry="1"/><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"/><path d="m9 14 2 2 4-4"/>
                </svg>
                <span>Gestionar Asignaciones</span>
                <svg class="dropdown-arrow" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-left: auto;">
                    <path d="m6 9 6 6 6-6"/>
                </svg>
            </div>
            <form action="asignacion" method="POST" class="sidebar__nav-dropdown-menu">
                <button type="submit" class="sidebar__nav-item <?php echo isset($_POST['asignacionRegistrar']) ? 'active' : ''; ?>" name="asignacionRegistrar"><span>Registrar Asignación</span></button>
                <?php if(isset($_SESSION['rolUsuario']) && ($_SESSION['rolUsuario'] === 'administrador' || $_SESSION['rolUsuario'] === 'abogado')) { ?>
                <button type="submit" class="sidebar__nav-item <?php echo isset($_POST['asignacionConsultar']) ? 'active' : ''; ?>" name="asignacionConsultar"><span>Consultar Asignaciones</span></button>
                <button type="submit" class="sidebar__nav-item <?php echo isset($_POST['asignacionTablero']) ? 'active' : ''; ?>" name="asignacionTablero"><span>Tablero de Asignaciones</span></button>
                <?php } ?>
            </form>
        </div>

        <?php if(isset($_SESSION['rolUsuario']) && ($_SESSION['rolUsuario'] === 'administrador' || $_SESSION['rolUsuario'] === 'abogado')) { ?>
        <div class="sidebar__nav-item-dropdown <?php echo ($pagina_actual == 'evento') ? 'active' : ''; ?>">
            <div class="sidebar__nav-dropdown">
                <svg width="1.2rem" height="1.2rem" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calendar-days-icon lucide-calendar-days">
                    <path d="M8 2v4"/><path d="M16 2v4"/><rect width="18" height="18" x="3" y="4" rx="2"/><path d="M3 10h18"/><path d="M8 14h.01"/><path d="M12 14h.01"/><path d="M16 14h.01"/><path d="M8 18h.01"/><path d="M12 18h.01"/><path d="M16 18h.01"/>
                </svg>
                <span>Gestionar Eventos</span>
                <svg class="dropdown-arrow" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-left: auto;">
                    <path d="m6 9 6 6 6-6"/>
                </svg>
            </div>
            <form action="evento" method="POST" class="sidebar__nav-dropdown-menu">
                <button type="submit" class="sidebar__nav-item <?php echo isset($_POST['eventoRegistrar']) ? 'active' : ''; ?>" name="eventoRegistrar"><span>Registrar Evento</span></button>
                <button type="submit" class="sidebar__nav-item <?php echo isset($_POST['eventoConsultar']) ? 'active' : ''; ?>" name="eventoConsultar"><span>Consultar Eventos</span></button>
            </form>
        </div>
        <?php } ?>

        <?php if(isset($_SESSION['rolUsuario']) && ($_SESSION['rolUsuario'] === 'administrador' || $_SESSION['rolUsuario'] === 'abogado')) { ?>
        <div class="sidebar__nav-item-dropdown <?php echo ($pagina_actual == 'honorario') ? 'active' : ''; ?>">
            <div class="sidebar__nav-dropdown">
                <svg width="1.2rem" height="1.2rem" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M19 7V4a1 1 0 0 0-1-1H5a2 2 0 0 0 0 4h15a1 1 0 0 1 1 1v4h-3a2 2 0 0 0 0 4h3a1 1 0 0 0 1-1v-2a1 1 0 0 0-1-1"/><path d="M3 5v14a2 2 0 0 0 2 2h15a1 1 0 0 0 1-1v-4"/>
                </svg>
                <span>Gestionar Honorarios</span>
                <svg class="dropdown-arrow" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-left: auto;">
                    <path d="m6 9 6 6 6-6"/>
                </svg>
            </div>
            <form action="honorario" method="POST" class="sidebar__nav-dropdown-menu">
                <button type="submit" class="sidebar__nav-item <?php echo isset($_POST['honorarioRegistrar']) ? 'active' : ''; ?>" name="honorarioRegistrar"><span>Registrar Honorario</span></button>
                <button type="submit" class="sidebar__nav-item <?php echo isset($_POST['honorarioConsultar']) ? 'active' : ''; ?>" name="honorarioConsultar"><span>Consultar Honorarios</span></button>
            </form>
        </div>
        <?php } ?>

        <?php if(isset($_SESSION['rolUsuario']) && ($_SESSION['rolUsuario'] === 'administrador' || $_SESSION['rolUsuario'] === 'abogado')) { ?>
        <div class="sidebar__nav-item-dropdown <?php echo ($pagina_actual == 'pago') ? 'active' : ''; ?>">
            <div class="sidebar__nav-dropdown">
                <svg width="1.2rem" height="1.2rem" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-receipt-text-icon lucide-receipt-text">
                    <path d="M13 16H8"/><path d="M14 8H8"/><path d="M16 12H8"/><path d="M4 3a1 1 0 0 1 1-1 1.3 1.3 0 0 1 .7.2l.933.6a1.3 1.3 0 0 0 1.4 0l.934-.6a1.3 1.3 0 0 1 1.4 0l.933.6a1.3 1.3 0 0 0 1.4 0l.933-.6a1.3 1.3 0 0 1 1.4 0l.934.6a1.3 1.3 0 0 0 1.4 0l.933-.6A1.3 1.3 0 0 1 19 2a1 1 0 0 1 1 1v18a1 1 0 0 1-1 1 1.3 1.3 0 0 1-.7-.2l-.933-.6a1.3 1.3 0 0 0-1.4 0l-.934.6a1.3 1.3 0 0 1-1.4 0l-.933-.6a1.3 1.3 0 0 0-1.4 0l-.933.6a1.3 1.3 0 0 1-1.4 0l-.934-.6a1.3 1.3 0 0 0-1.4 0l-.933.6a1.3 1.3 0 0 1-.7.2 1 1 0 0 1-1-1z"/>
                </svg>
                <span>Gestionar Pagos</span>
                <svg class="dropdown-arrow" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-left: auto;">
                    <path d="m6 9 6 6 6-6"/>
                </svg>
            </div>
            <form action="pago" method="POST" class="sidebar__nav-dropdown-menu">
                <button type="submit" class="sidebar__nav-item <?php echo isset($_POST['pagoRegistrar']) ? 'active' : ''; ?>" name="pagoRegistrar"><span>Registrar Pago</span></button>
                <button type="submit" class="sidebar__nav-item <?php echo isset($_POST['pagoConsultar']) ? 'active' : ''; ?>" name="pagoConsultar"><span>Consultar Pagos</span></button>
            </form>
        </div>
        <?php } ?>

        <?php if(isset($_SESSION['rolUsuario']) && ($_SESSION['rolUsuario'] === 'administrador' || $_SESSION['rolUsuario'] === 'abogado')) { ?>
        <div class="sidebar__nav-item-dropdown <?php echo ($pagina_actual == 'documentoRegistrar' || $pagina_actual == 'documentoConsultar') ? 'active' : ''; ?>">
            <div class="sidebar__nav-dropdown">
                <svg width="1.2rem" height="1.2rem" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-up-icon lucide-file-up">
                    <path d="M6 22a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h8a2.4 2.4 0 0 1 1.704.706l3.588 3.588A2.4 2.4 0 0 1 20 8v12a2 2 0 0 1-2 2z"/><path d="M14 2v5a1 1 0 0 0 1 1h5"/><path d="M12 12v6"/><path d="m15 15-3-3-3 3"/>
                </svg>
                <span>Gestionar Documentos</span>
                <svg class="dropdown-arrow" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-left: auto;">
                    <path d="m6 9 6 6 6-6"/>
                </svg>
            </div>
            <form action="documento" method="POST" class="sidebar__nav-dropdown-menu">
                <button type="submit" class="sidebar__nav-item <?php echo isset($_POST['documentoRegistrar']) ? 'active' : ''; ?>" name="documentoRegistrar"><span>Registrar Documento</span></button>
                <button type="submit" class="sidebar__nav-item <?php echo isset($_POST['documentoConsultar']) ? 'active' : ''; ?>" name="documentoConsultar"><span>Consultar Documentos</span></button>
            </form>
        </div>
        <?php } ?>

        <?php if(isset($_SESSION['rolUsuario']) && ($_SESSION['rolUsuario'] === 'administrador' || $_SESSION['rolUsuario'] === 'abogado')) { ?>
        <div class="sidebar__nav-item-dropdown <?php echo ($pagina_actual == 'archivador') ? 'active' : ''; ?>">
            <div class="sidebar__nav-dropdown">
                <svg width="1.2rem" height="1.2rem" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-archive-icon lucide-archive">
                    <rect width="20" height="5" x="2" y="3" rx="1"/><path d="M4 8v11a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8"/><path d="M10 12h4"/>
                </svg>
                <span>Gestionar Archivadores</span>
                <svg class="dropdown-arrow" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-left: auto;">
                    <path d="m6 9 6 6 6-6"/>
                </svg>
            </div>
            <form action="archivador" method="POST" class="sidebar__nav-dropdown-menu">
                <button type="submit" class="sidebar__nav-item <?php echo isset($_POST['archivadorRegistrar']) ? 'active' : ''; ?>" name="archivadorRegistrar"><span>Registrar Archivador</span></button>
                <button type="submit" class="sidebar__nav-item <?php echo isset($_POST['archivadorConsultar']) ? 'active' : ''; ?>" name="archivadorConsultar"><span>Consultar Archivadores</span></button>
            </form>
        </div>
        <?php } ?>

        
        <?php if(isset($_SESSION['rolUsuario']) && ($_SESSION['rolUsuario'] === 'administrador' || $_SESSION['rolUsuario'] === 'abogado')) { ?>
        <a class="sidebar__nav-item <?php echo ($pagina_actual == 'reportes') ? 'active' : ''; ?>" href="reportes">
            <svg width="1.2rem" height="1.2rem" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chart-no-axes-combined-icon lucide-chart-no-axes-combined">
                <path d="M12 16v5"/><path d="M16 14.639V21"/><path d="M20 10.656V21"/><path d="m22 3-8.646 8.646a.5.5 0 0 1-.708 0L9.354 8.354a.5.5 0 0 0-.707 0L2 15"/><path d="M4 18.463V21"/><path d="M8 14.656V21"/>
            </svg>
            <span>Reportes</span>
        </a>
        <?php } ?>
    </nav>
</div>