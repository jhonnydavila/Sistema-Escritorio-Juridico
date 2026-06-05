<!DOCTYPE html>
<html lang="es">
<head>
    <?php include('includes/header.php'); ?>
    <title>Iniciar Sesión</title>
</head>
<body>
    <main class="container-fluid row vh-100 vw-100 m-0 p-0">
        <section class="col-4 px-4">
            <div class="d-flex flex-column justify-content-between h-100 w-100 py-5 px-3 pe-5">
                
                <div></div>
                
                <div class="w-100">
                    <div class="d-flex flex-column">
                        <h2 class="display-5 fw-bold lh-sm m-0">Hola,<br>
                        Bienvenido</h2>
                        <span class="small text-muted">Por favor, ingrese sus credenciales de acceso</span>
                    </div>
                    <form action="login" class="row mt-2" method="POST">
                        <div class="col-12 pt-0">
                            <div class="form-group form-floating">
                                <input id="cedulaUsuario" type="text" class="form-control" name="cedulaUsuario" placeholder="12345678" required autocomplete="username">
                                <label for="cedulaUsuario" class="form-label">Cédula de Identidad</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group form-floating">
                                <input id="claveUsuario" type="password" class="form-control" name="claveUsuario" placeholder="********" required autocomplete="current-password">
                                <label for="claveUsuario" class="form-label">Contraseña</label>
                            </div>
                        </div>
                        <div class="col-12 mt-4">
                            <button type="submit" class="btn__primary-rounded">Iniciar Sesión</button>
                        </div>
                    </form>
                </div>
                <div class="w-100 text-center">
                    <p class="text-muted small m-0">&copy; <?php echo date('Y'); ?> Todos los derechos reservados.</p>
                </div>
            </div>
        </section>
        <section class="col-8 m-0 p-0">
            <img class="img-fluid w-100 h-100" src="assets/img/login.jpg">
        </section>
    </main>
    <?php include('includes/footer.php'); ?>
</body>
</html>