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
            <section class="page__container">
                <div class="page__header">
                    <div class="page__header-titles">
                        <h2 class="page__header-title">Registrar Usuario</h2>
                        <span class="page__header-subtitle">Crea un nuevo usuario del sistema</span>
                    </div>
                </div>
                <div class="page__content">
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
                                <input id="nameUsuario" type="text" class="form-control" name="nameUsuario" placeholder="Nombre" autocomplete="off">
                                <label class="form-label" for="nameUsuario">Nombre de Usuario</label>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group form-floating">
                                <select id="rolUsuario" class="form-select" name="rolUsuario" required>
                                    <option value="">Seleccione un rol</option>
                                </select>
                                <label class="form-label" for="rolUsuario">Rol</label>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group form-floating">
                                <input id="contrasenaUsuario1" type="password" class="form-control" name="contrasenaUsuario1" placeholder="Contraseña" autocomplete="off" required>
                                <label class="form-label" for="contrasenaUsuario1">Contraseña</label>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group form-floating">
                                <input id="contrasenaUsuario2" type="password" class="form-control" name="contrasenaUsuario2" placeholder="Confirmar Contraseña" autocomplete="off" required>
                                <label class="form-label" for="contrasenaUsuario2">Confirmar Contraseña</label>
                            </div>
                        </div>
                        <div class="col-12 d-flex justify-content-center mt-4 gap-2 w-100">
                            <input type="hidden" name="registrarUsuario" value="1">
                            <button type="submit" class="btn__primary">Registrar</button>
                        </div>
                    </form>
                </div>
            </section>
        </main>
        <?php include __DIR__ . '/includes/footer.php'; ?>
    </body>
</html>