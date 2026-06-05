<!DOCTYPE html>
<html lang="es">
    <head>
        <?php include('includes/header.php'); ?>
        <title>Not Found 403</title>
    </head>
    <body>
        <div class="container px-5">
            <div class="row align-items-center justify-content-center h-100 px-3">
                <div class="col-6 p-0">
                    <img class="w-100 h-100" src="assets/img/403.svg" alt="not-found">
                </div>
                <div class="col-5 p-0">
                    <div class="d-flex flex-column align-items-center">
                        <h2 class="fw-bold" style="font-size: 7rem; color: #112c58;">403</h2>
                        <h2 class="fw-bold" style="font-size: 1.5rem;">Acceso Denegado</h2>
                        <span class="small text-muted my-3 text-center">No tienes los permisos necesarios para acceder al módulo de gestión. Si consideras que esto es un error, por favor contacta al administrador del sistema.</span>
                        <a href="home" class="text-white fw-bolder px-5 py-2" style="background: #143263; border-radius: 18px;">Volver</a>
                    </div>
                </div>
            </div>
        </div>
        <?php include('includes/footer.php'); ?>
    </body>
</html>