<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$userName = htmlspecialchars(trim(($_SESSION['user']['nombre'] ?? '') . ' ' . ($_SESSION['user']['apellido'] ?? '')));
$userRole = htmlspecialchars($_SESSION['user']['role'] ?? 'Sin rol');
?>
<header class="topbar">
    <div class="topbar-actions">
        <button class="btn-menu">
            <svg width="1.6rem" height="1.6rem" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-text-align-justify-icon lucide-text-align-justify">
                <path d="M3 5h18"/>
                <path d="M3 12h18"/>
                <path d="M3 19h18"/>
            </svg>
        </button>
        <div class="topbar-user">
            <div>
                <p class="topbar-user-name"><?php echo $userName; ?></p>
                <small><?php echo $userRole; ?></small>
            </div>
            <div class="topbar-user-avatar">
                <img src="assets/img/user.svg" alt="User Avatar">
            </div>
            <a href="index.php?pagina=logout" class="btn btn-link">Cerrar sesión</a>
        </div>
    </div>
</header>