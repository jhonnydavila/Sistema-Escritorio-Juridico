<!DOCTYPE html>
<html lang="es">
    <head>
        <?php include ('includes/header.php'); ?>
        <title>Registrar Usuario</title>
    </head>
    <body>
        <?php include('includes/sidebar.php'); ?>
        <main class="main-content">
            <?php include('includes/topbar.php'); ?>
            <section class="page__container">
                <div class="page__header">
                    <div class="page__header-titles">
                        <h2 class="page__header-title">Registrar Usuario</h2>
                        <span class="page__header-subtitle">Crea un nuevo usuario del sistema</span>
                    </div>
                </div>
                <div class="page__content">
                    <form action="usuario" id="form" class="row p-4 gy-1" method="POST">

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
                                <input id="cedulaUsuario" type="text" class="form-control" name="cedulaUsuario" placeholder="Cédula" autocomplete="off" required>
                                <label class="form-label" for="cedulaUsuario">Cédula de Identidad</label>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6">
                            <div class="form-group form-floating">
                                <select id="rolUsuario" class="form-select" name="rolUsuario" required>
                                    <option value="" hidden>Seleccionar</option>
                                    <option value="administrador">Administrador</option>
                                    <option value="abogado">Abogado</option>
                                    <option value="secretaria">Secretaria</option>
                                </select>
                                <label class="form-label" for="rolUsuario">Rol</label>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6">
                            <div class="form-group form-floating">
                                <input id="clave1Usuario" type="password" class="form-control" name="clave1Usuario" placeholder="Contraseña" autocomplete="off" required>
                                <label class="form-label" for="clave1Usuario">Contraseña</label>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6">
                            <div class="form-group form-floating">
                                <input id="clave2Usuario" type="password" class="form-control" name="clave2Usuario" placeholder="Confirmar Contraseña" autocomplete="off" required>
                                <label class="form-label" for="clave2Usuario">Confirmar Contraseña</label>
                            </div>
                        </div>
                        
                        <div class="col-12 d-flex justify-content-center mt-4 gap-2 w-100">
                            <button type="submit" class="btn__primary" name="registrarUsuario">Registrar</button>
                        </div>
                    </form>
                </div>
            </section>
        </main>
        <?php include('includes/footer.php'); ?>
    </body>
</html>