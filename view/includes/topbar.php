<header class="topbar">
    <div class="topbar-actions">
        <button class="btn__menu">
            <svg width="1.6rem" height="1.6rem" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-text-align-justify-icon lucide-text-align-justify">
                <path d="M3 5h18"/>
                <path d="M3 12h18"/>
                <path d="M3 19h18"/>
            </svg>
        </button>
        <div class="topbar-user">
            <div class="d-flex flex-column text-end">
                <p class="topbar-user-name text-capitalize"><?php echo $_SESSION['nombreUsuario'] . ' ' . $_SESSION['apellidoUsuario']; ?></p>
                <span class="topbar-user-role text-capitalize"><?php echo $_SESSION['rolUsuario']; ?></span>
            </div>
            <div class="topbar-user-avatar avatar-toggle">
                <img src="assets/img/user.svg" alt="User Avatar">
            </div>
            <a href="logout" class="btn-logout dropdown-logout">
                <svg width="1.2rem" height="1.2rem" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="lucide lucide-log-out">
                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
                    <polyline points="16 17 21 12 16 7"/>
                    <line x1="21" x2="9" y1="12" y2="12"/>
                </svg>
                Cerrar Sesión
            </a>
        </div>
    </div>
</header>