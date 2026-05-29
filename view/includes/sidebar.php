<div class="sidebar__container">
    <div class="sidebar__header">
        <div class="sidebar__header-logo">
            EJFJ
        </div>
        <div>
            <h3 class="sidebar__header-title">Seguimiento</h3>
            <p class="sidebar__header-subtitle">Casos Juridicos</p>
        </div>
    </div>
    
    <nav class="sidebar__nav">
        <a class="sidebar__nav-item" href="?page=home">
            <svg width="1.3rem" height="1.3rem" viewBox="0 0 24 24" fill="currentColor">
                <path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z"/>
            </svg>
            <span>Panel de Control</span>
        </a>
        
        <div class="sidebar__nav-item-dropdown">
            <div class="sidebar__nav-dropdown">
                <svg width="1.3rem" height="1.3rem" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-scale-icon lucide-scale">
                    <path d="M12 3v18"/>
                    <path d="m19 8 3 8a5 5 0 0 1-6 0zV7"/>
                    <path d="M3 7h1a17 17 0 0 0 8-2 17 17 0 0 0 8 2h1"/>
                    <path d="m5 8 3 8a5 5 0 0 1-6 0zV7"/>
                    <path d="M7 21h10"/>
                </svg>
                <span>Gestionar Casos</span>
                <svg class="dropdown-arrow" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-left: auto;">
                    <path d="m6 9 6 6 6-6"/>
                </svg>
            </div>
            <div class="sidebar__nav-dropdown-menu">
                <a class="sidebar__nav-item" href="?page=casoRegistrar"><span>Registrar Caso</span></a>
                <a class="sidebar__nav-item" href="?page=casoConsultar"><span>Consultar Casos</span></a>
                <a class="sidebar__nav-item" href="?page=casoAsignaciones"><span>Asignaciones</span></a>
            </div>
        </div>
        <div class="sidebar__nav-item-dropdown">
            <div class="sidebar__nav-dropdown">
                <svg width="1.2rem" height="1.2rem" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calendar-days-icon lucide-calendar-days">
                    <path d="M8 2v4"/>
                    <path d="M16 2v4"/>
                    <rect width="18" height="18" x="3" y="4" rx="2"/>
                    <path d="M3 10h18"/>
                    <path d="M8 14h.01"/>
                    <path d="M12 14h.01"/>
                    <path d="M16 14h.01"/>
                    <path d="M8 18h.01"/>
                    <path d="M12 18h.01"/>
                    <path d="M16 18h.01"/>
                </svg>
                <span>Gestionar Eventos</span>
                <svg class="dropdown-arrow" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-left: auto;">
                    <path d="m6 9 6 6 6-6"/>
                </svg>
            </div>
            <div class="sidebar__nav-dropdown-menu">
                <a class="sidebar__nav-item" href="?page=eventoRegistrar"><span>Registrar Evento</span></a>
                <a class="sidebar__nav-item" href="?page=eventoConsultar"><span>Consultar Eventos</span></a>
                <a class="sidebar__nav-item" href="?page=eventoCalendario"><span>Calendario de Eventos</span></a>
            </div>
        </div>

        <div class="sidebar__nav-item-dropdown">
            <div class="sidebar__nav-dropdown">
                <svg width="1.2rem" height="1.2rem" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-wallet-icon lucide-wallet">
                    <path d="M19 7V4a1 1 0 0 0-1-1H5a2 2 0 0 0 0 4h15a1 1 0 0 1 1 1v4h-3a2 2 0 0 0 0 4h3a1 1 0 0 0 1-1v-2a1 1 0 0 0-1-1"/>
                    <path d="M3 5v14a2 2 0 0 0 2 2h15a1 1 0 0 0 1-1v-4"/>
                </svg>
                <span>Gestionar Pagos</span>
                <svg class="dropdown-arrow" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-left: auto;">
                    <path d="m6 9 6 6 6-6"/>
                </svg>
            </div>
            <div class="sidebar__nav-dropdown-menu">
                <a class="sidebar__nav-item" href="?page=pagoRegistrar"><span>Registrar Pago</span></a>
                <a class="sidebar__nav-item" href="?page=pagoConsultar"><span>Consultar Pagos</span></a>
            </div>
        </div>

        <div class="sidebar__nav-item-dropdown">
            <div class="sidebar__nav-dropdown">
                <svg width="1.2rem" height="1.2rem" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user-icon lucide-user">
                    <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/>
                    <circle cx="12" cy="7" r="4"/>
                </svg>
                <span>Gestionar Clientes</span>
                <svg class="dropdown-arrow" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-left: auto;">
                    <path d="m6 9 6 6 6-6"/>
                </svg>
            </div>
            <form action="?page=cliente" method="POST" class="sidebar__nav-dropdown-menu">
                <button type="submit" class="sidebar__nav-item" name="clienteRegistrar"><span>Registrar Cliente</span></button>
                <button type="submit" class="sidebar__nav-item" name="clienteConsultar"><span>Consultar Clientes</span></button>
            </form>
        </div>

        <div class="sidebar__nav-item-dropdown">
            <div class="sidebar__nav-dropdown">
                <svg width="1.2rem" height="1.2rem" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-archive-icon lucide-archive">
                    <rect width="20" height="5" x="2" y="3" rx="1"/>
                    <path d="M4 8v11a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8"/>
                    <path d="M10 12h4"/>
                </svg>
                <span>Gestionar Expedientes</span>
                <svg class="dropdown-arrow" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-left: auto;">
                    <path d="m6 9 6 6 6-6"/>
                </svg>
            </div>
            <div class="sidebar__nav-dropdown-menu">
                <a class="sidebar__nav-item" href="?page=expedienteRegistrar"><span>Registrar Expedientes</span></a>
                <a class="sidebar__nav-item" href="?page=expedienteConsultar"><span>Consultar Expedientes</span></a>
            </div>
        </div>

        <div class="sidebar__nav-item-dropdown">
            <div class="sidebar__nav-dropdown">
                <svg width="1.2rem" height="1.2rem" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-icon lucide-file">
                    <path d="M6 22a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h8a2.4 2.4 0 0 1 1.704.706l3.588 3.588A2.4 2.4 0 0 1 20 8v12a2 2 0 0 1-2 2z"/>
                    <path d="M14 2v5a1 1 0 0 0 1 1h5"/>
                </svg>
                <span>Gestionar Documentos</span>
                <svg class="dropdown-arrow" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-left: auto;">
                    <path d="m6 9 6 6 6-6"/>
                </svg>
            </div>
            <div class="sidebar__nav-dropdown-menu">
                <a class="sidebar__nav-item" href="?page=documentoRegistrar"><span>Registrar Documento</span></a>
                <a class="sidebar__nav-item" href="?page=documentoConsultar"><span>Consultar Documentos</span></a>
            </div>
        </div>

        <div class="sidebar__nav-item-dropdown">
            <div class="sidebar__nav-dropdown">
                <svg width="1.2rem" height="1.2rem" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-gavel-icon lucide-gavel">
                    <path d="m14 13-8.381 8.38a1 1 0 0 1-3.001-3l8.384-8.381"/>
                    <path d="m16 16 6-6"/>
                    <path d="m21.5 10.5-8-8"/>
                    <path d="m8 8 6-6"/>
                    <path d="m8.5 7.5 8 8"/>
                </svg>
                <span>Gestionar Abogados</span>
                <svg class="dropdown-arrow" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-left: auto;">
                    <path d="m6 9 6 6 6-6"/>
                </svg>
            </div>
            <form action="?page=abogado" method="POST" class="sidebar__nav-dropdown-menu">
                <button type="submit" class="sidebar__nav-item" name="abogadoRegistrar"><span>Registrar Abogado</span></button>
                <button type="submit" class="sidebar__nav-item" name="abogadoConsultar"><span>Consultar Abogados</span></button>
            </form>
        </div>

        <div class="sidebar__nav-item-dropdown">
            <div class="sidebar__nav-dropdown">
                <svg width="1.2rem" height="1.2rem" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-hat-glasses-icon lucide-hat-glasses">
                    <path d="M14 18a2 2 0 0 0-4 0"/>
                    <path d="m19 11-2.11-6.657a2 2 0 0 0-2.752-1.148l-1.276.61A2 2 0 0 1 12 4H8.5a2 2 0 0 0-1.925 1.456L5 11"/>
                    <path d="M2 11h20"/>
                    <circle cx="17" cy="18" r="3"/>
                    <circle cx="7" cy="18" r="3"/>
                </svg>
                <span>Gestionar Usuarios</span>
                <svg class="dropdown-arrow" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-left: auto;">
                    <path d="m6 9 6 6 6-6"/>
                </svg>
            </div>
            <div class="sidebar__nav-dropdown-menu">
                <a class="sidebar__nav-item" href="?page=usuarioRegistrar"><span>Registrar Usuario</span></a>
                <a class="sidebar__nav-item" href="?page=usuarioConsultar"><span>Consultar Usuarios</span></a>
            </div>
        </div>

        <div class="sidebar__nav-item-dropdown">
            <div class="sidebar__nav-dropdown">
                <svg width="1.2rem" height="1.2rem" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-server-icon lucide-server">
                    <rect width="20" height="8" x="2" y="2" rx="2" ry="2"/><rect width="20" height="8" x="2" y="14" rx="2" ry="2"/>
                    <line x1="6" x2="6.01" y1="6" y2="6"/>
                    <line x1="6" x2="6.01" y1="18" y2="18"/>
                </svg>
                <span>Gestionar Archivadores</span>
                <svg class="dropdown-arrow" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-left: auto;">
                    <path d="m6 9 6 6 6-6"/>
                </svg>
            </div>
            <div class="sidebar__nav-dropdown-menu">
                <a class="sidebar__nav-item" href="?page=archivadorRegistrar"><span>Registrar Archivador</span></a>
                <a class="sidebar__nav-item" href="?page=archivadorConsultar"><span>Consultar Archivadores</span></a>
            </div>
        </div>

        <a class="sidebar__nav-item" href="?page=reportes">
            <svg width="1.2rem" height="1.2rem" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chart-no-axes-combined-icon lucide-chart-no-axes-combined">
                <path d="M12 16v5"/><path d="M16 14.639V21"/>
                <path d="M20 10.656V21"/>
                <path d="m22 3-8.646 8.646a.5.5 0 0 1-.708 0L9.354 8.354a.5.5 0 0 0-.707 0L2 15"/>
                <path d="M4 18.463V21"/>
                <path d="M8 14.656V21"/>
            </svg>
            <span>Reportes</span>
        </a>
    </nav>
</div>