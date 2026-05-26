<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('includes/header.php'); ?>
    <title>Iniciar Sesión</title>
</head>
<body>
    <main class="container-fluid row vh-100 vw-100 m-0 p-0">
        <section class="col-4 px-4">
            <div class="d-flex flex-column justify-content-center h-100 w-100 py-5 px-4 pe-5">
                <div class="d-flex flex-column">
                    <h2 class="fs-1 fw-bold">Hola,<br>
                    Bienvenido</h2>
                    <span class="small text-muted">Por favor, ingrese sus credenciales de acceso</span>
                </div>
                <form class="row mt-2" action="index.php?pagina=auth" method="POST">
                    <div class="col-12 pt-0">
                        <div class="form-group form-floating">
                            <input id="login" type="text" class="form-control" name="login" placeholder="12345678" required autocomplete="username">
                            <label for="login" class="form-label">Correo o Cédula</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group form-floating">
                            <input id="password" type="password" class="form-control" name="password" placeholder="********" required autocomplete="current-password">
                            <label for="password" class="form-label">Contraseña</label>
                        </div>
                    </div>
                </form>
                <div class="col-12 mt-4">
                    <button type="submit" class="btn__primary-rounded">Iniciar Sesión</button>
                </div>
                <p class="text-muted small mt-5 text-center">todos los derechos reservados</p>
            </div>
        </section>
        <section class="col-8 m-0 p-0">
            <img class="img-fluid w-100 h-100" src="assets/img/login.jpg">
        </section>
    </main>
    <?php include('includes/footer.php'); ?>
</body>
</html>