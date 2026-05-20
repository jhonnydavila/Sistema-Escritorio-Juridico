<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include __DIR__ . '/includes/header.php'; ?>
        <title>Registrar Usuario</title>
    </head>
    <body>
        <?php include __DIR__ . '/includes/sidebar.php'; ?>
        <main class="main-content">
            <?php include __DIR__ . '/includes/topbar.php'; ?>
            <section class="page-container">
                <div class="page-header">
                    <div class="page-header-titles">
                        <h2 class="page-header-title">Registrar Usuario</h2>
                        <span class="page-header-subtitle">Crea un nuevo usuario del sistema</span>
                    </div>
                </div>
                <div class="page-content">
                    <?php
                        require_once __DIR__ . '/../controller/usuarioController.php';
                        $usuarioController = new UsuarioController();
                        $roles = $usuarioController->listar_roles_controller();
                    ?>
                    <form action="src/controller/usuarioController.php" class="row p-4" method="POST">
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group form-floating">
                                <input id="nombreUsuario" type="text" class="form-control" name="nombreUsuario" placeholder="Nombre" autocomplete="off" required>
                                <label class="form-label" for="nombreUsuario">Nombre</label>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group form-floating">
                                <input id="apellidoUsuario" type="text" class="form-control" name="apellidoUsuario" placeholder="Apellido" autocomplete="off" required>
                                <label class="form-label" for="apellidoUsuario">Apellido</label>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group form-floating">
                                <input id="cedulaUsuario" type="text" class="form-control" name="cedulaUsuario" placeholder="Cédula" autocomplete="off">
                                <label class="form-label" for="cedulaUsuario">Cédula</label>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group form-floating">
                                <input id="correoUsuario" type="email" class="form-control" name="correoUsuario" placeholder="correo@example.com" autocomplete="off" required>
                                <label class="form-label" for="correoUsuario">Correo Electrónico</label>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group form-floating">
                                <input id="fechaNacimientoUsuario" type="date" class="form-control" name="fechaNacimientoUsuario" placeholder="Fecha de Nacimiento" autocomplete="off">
                                <label class="form-label" for="fechaNacimientoUsuario">Fecha de Nacimiento</label>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group form-floating">
                                <input id="direccionUsuario" type="text" class="form-control" name="direccionUsuario" placeholder="Dirección" autocomplete="off">
                                <label class="form-label" for="direccionUsuario">Dirección</label>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group form-floating">
                                <input id="contrasenaUsuario" type="password" class="form-control" name="contrasenaUsuario" placeholder="Contraseña" autocomplete="off" required>
                                <label class="form-label" for="contrasenaUsuario">Contraseña</label>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group form-floating">
                                <input id="fraseSecretaUsuario" type="password" class="form-control" name="fraseSecretaUsuario" placeholder="Frase secreta" autocomplete="off" required>
                                <label class="form-label" for="fraseSecretaUsuario">Frase Secreta</label>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group form-floating">
                                <select id="rolUsuario" class="form-control" name="rolUsuario" required>
                                    <option value="">Seleccione un rol</option>
                                    <?php foreach ($roles as $rol): ?>
                                        <option value="<?php echo htmlspecialchars($rol['idRol']); ?>"><?php echo htmlspecialchars($rol['nombreRol']); ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <label class="form-label" for="rolUsuario">Rol</label>
                            </div>
                        </div>
                        <div class="col-12 d-flex justify-content-center mt-4 gap-2 w-100">
                            <input type="hidden" name="registrarUsuario" value="1">
                            <button type="submit" class="btn btn-primary">Guardar Usuario</button>
                        </div>
                    </form>
                </div>
            </section>
        </main>
        <?php include __DIR__ . '/includes/footer.php'; ?>
    </body>
</html>