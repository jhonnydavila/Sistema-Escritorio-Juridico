<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include __DIR__ . '/includes/header.php'; ?>
        <title>Sistema - Abogados</title>
    </head>
    <body>
        <?php include __DIR__ . '/includes/sidebar.php'; ?>
        
        <main class="main-content">
            <?php include __DIR__ . '/includes/topbar.php'; ?>

            <section class="page__container">
                <div class="page__header">
                    <div class="page__header-titles">
                        <h2 class="page__header-title">Panel de Control</h2>
                        <span class="page__header-subtitle">Gestión general del sistema</span>
                    </div>
                </div>

                <div class="dashboard-grid">
                    <?php
                    $cards = [
                        'abogados' => [
                            'title' => 'Abogados',
                            'badge' => 'Activo',
                            'text' => 'Registra y consulta los abogados del sistema.',
                            'register' => ['page' => 'abogadoRegistrar', 'permission' => 'manage_abogados'],
                            'list' => ['page' => 'abogadoConsultar'],
                        ],
                        'clientes' => [
                            'title' => 'Clientes',
                            'badge' => 'Gestión',
                            'text' => 'Administra clientes activos y revisa su información.',
                            'register' => ['page' => 'clienteRegistrar', 'permission' => 'manage_clientes'],
                            'list' => ['page' => 'clienteConsultar'],
                        ],
                        'casos' => [
                            'title' => 'Casos',
                            'badge' => 'Seguimiento',
                            'text' => 'Registra y administra tus casos jurídicos.',
                            'register' => ['page' => 'casosRegistrar', 'permission' => 'manage_casos'],
                            'list' => ['page' => 'casosConsultar'],
                        ],
                        'pagos' => [
                            'title' => 'Pagos',
                            'badge' => 'Finanzas',
                            'text' => 'Registra pagos y verifica el historial financiero.',
                            'register' => ['page' => 'pagoRegistrar', 'permission' => 'manage_pagos'],
                            'list' => ['page' => 'pagoConsultar'],
                        ],
                        'eventos' => [
                            'title' => 'Citas',
                            'badge' => 'Agenda',
                            'text' => 'Agenda, consulta y administra citas del despacho.',
                            'register' => ['page' => 'eventoRegistrar', 'permission' => 'manage_eventos'],
                            'list' => ['page' => 'eventoConsultar'],
                        ],
                        'documentos' => [
                            'title' => 'Documentos',
                            'badge' => 'Archivos',
                            'text' => 'Registra y consulta documentos legales asociados a casos.',
                            'register' => ['page' => 'documentoRegistrar', 'permission' => 'manage_documentos'],
                            'list' => ['page' => 'documentoConsultar'],
                        ],
                        'usuarios' => [
                            'title' => 'Usuarios',
                            'badge' => 'Equipo',
                            'text' => 'Administra usuarios y roles del sistema.',
                            'register' => ['page' => 'usuarioRegistrar', 'permission' => 'manage_users'],
                            'list' => ['page' => 'usuarioConsultar'],
                        ],
                        'expedientes' => [
                            'title' => 'Expedientes',
                            'badge' => 'Archivos',
                            'text' => 'Consulta los expedientes jurídicos activos.',
                            'list' => ['page' => 'expedienteConsultar'],
                        ],
                        'archivadores' => [
                            'title' => 'Archivadores',
                            'badge' => 'Control',
                            'text' => 'Gestiona el personal de archivado y sus tareas.',
                            'register' => ['page' => 'archivadorRegistrar', 'permission' => 'manage_archivadores'],
                            'list' => ['page' => 'archivadorConsultar'],
                        ],
                    ];

                    foreach ($cards as $key => $card):
                        if (!function_exists('canMenu') || !canMenu($key)) {
                            continue;
                        }
                    ?>
                    <article class="dashboard-card">
                        <div class="dashboard-card-header">
                            <h3><?php echo htmlspecialchars($card['title']); ?></h3>
                            <span class="badge badge-primary"><?php echo htmlspecialchars($card['badge']); ?></span>
                        </div>
                        <p class="dashboard-card-text"><?php echo htmlspecialchars($card['text']); ?></p>
                        <div class="dashboard-card-actions">
                            <?php if (!empty($card['register']) && can($card['register']['permission'])): ?>
                            <a href="index.php?pagina=<?php echo htmlspecialchars($card['register']['page']); ?>">Registrar</a>
                            <?php endif; ?>
                            <a href="index.php?pagina=<?php echo htmlspecialchars($card['list']['page']); ?>">Listado</a>
                        </div>
                    </article>
                    <?php endforeach; ?>
                </div>
            </section>
        </main>

        <?php include __DIR__ . '/includes/footer.php'; ?>
    </body>
</html>