<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include __DIR__ . '/includes/header.php'; ?>
        <title>Listado de Usuarios</title>
    </head>
    <body>
        <?php include __DIR__ . '/includes/sidebar.php'; ?>
        <main class="main-content">
            <?php include __DIR__ . '/includes/topbar.php'; ?>
            <section class="page-container">
                <div class="page-header">
                    <div class="page-header-titles">
                        <h2 class="page-header-title">Usuarios</h2>
                        <span class="page-header-subtitle">Usuarios registrados en el sistema</span>
                    </div>
                </div>
                <div class="page-content">
                    <?php
                        require_once __DIR__ . '/../controller/usuarioController.php';
                        $usuarioController = new UsuarioController();
                        $listaUsuarios = $usuarioController->listar_usuarios_controller();
                    ?>
                    <div class="page-table-container">
                        <table id="table" class="page-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Correo</th>
                                    <th>Rol</th>
                                    <th>Estatus</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($listaUsuarios as $usuario): ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($usuario['idUsuario']); ?></td>
                                        <td><?php echo htmlspecialchars($usuario['nombreUsuario'] . ' ' . $usuario['apellidoUsuario']); ?></td>
                                        <td><?php echo htmlspecialchars($usuario['correoUsuario']); ?></td>
                                        <td><?php echo htmlspecialchars($usuario['nombreRol']); ?></td>
                                        <td><?php echo htmlspecialchars($usuario['estatusUsuario']); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                                <?php if (empty($listaUsuarios)): ?>
                                    <tr>
                                        <td colspan="5" class="text-center">No hay usuarios registrados.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </main>
        <?php include __DIR__ . '/includes/footer.php'; ?>
    </body>
</html>