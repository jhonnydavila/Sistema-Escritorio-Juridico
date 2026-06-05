<!DOCTYPE html>
<html lang="es">
    <head>
        <?php include('includes/header.php'); ?>
        <title>Registrar Abogado</title>
    </head>
    <body>
        <?php include('includes/sidebar.php'); ?>
        <main class="main-content">
            <?php include('includes/topbar.php'); ?>

            <section class="page__container">
                <div class="page__header">
                    <div class="page__header-titles">
                        <h2 class="page__header-title">Registrar Abogado</h2>
                        <span class="page__header-subtitle">Gestión de Abogados</span>
                    </div>
                </div>
                <div class="page__content">
                    <form action="abogado" id="form" class="row p-4 gy-1" method="POST">
                        <div class="col-md-6">
                            <div class="form-group form-floating">
                                <input id="nombreAbogado" type="text" class="form-control" name="nombreAbogado" placeholder="john doe" minlength="3" maxlength="40" pattern="^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]{3,40}$" title="El nombre debe contener solo letras y espacios, con una longitud de entre 3 y 40 caracteres." autocomplete="off" required>
                                <label class="form-label" for="nombreAbogado">Nombre</label>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group form-floating">
                                <input id="apellidoAbogado" type="text" class="form-control" name="apellidoAbogado" placeholder="john doe" minlength="3" maxlength="40" pattern="^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]{3,40}$" title="El apellido debe contener solo letras y espacios, con una longitud de entre 3 y 40 caracteres." autocomplete="off" required>
                                <label class="form-label" for="apellidoAbogado">Apellido</label>
                            </div>
                        </div>

                        <div class="col-md-1 col-4">
                            <div class="form-group form-floating">
                                <select class="form-select" name="nacionalidadAbogado" id="nacionalidadAbogado" required>
                                    <option value="V" selected>V</option>
                                    <option value="E">E</option>
                                </select>
                                <label for="nacionalidadAbogado" class="form-label">Nac.</label>
                            </div>
                        </div>

                        <div class="col-md-5 col-8">
                            <div class="form-group form-floating">
                                <input id="cedulaAbogado" type="text" class="form-control" name="cedulaAbogado" placeholder="john doe" minlength="3" maxlength="9" pattern="^[0-9]{3,9}$" title="La cédula debe contener solo números, con una longitud de entre 3 y 9 dígitos, sin puntos ni letras." autocomplete="off" required>
                                <label class="form-label" for="cedulaAbogado">Cédula de Identidad</label>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group form-floating">
                                <input id="telefonoAbogado" type="text" class="form-control" name="telefonoAbogado" placeholder="john doe" maxlength="12" pattern="^0[24][0-9]{9}$" title="El número telefónico debe empezar por 02 o 04 y tener un total de 11 dígitos numéricos (Ej: 04123456789)." autocomplete="off" required>
                                <label class="form-label" for="telefonoAbogado">Número Teléfonico</label>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group form-floating">
                                <input id="correoAbogado" type="email" class="form-control" name="correoAbogado" placeholder="john doe" maxlength="200" title="Por favor, introduce una dirección de correo electrónico válida (Ej: usuario@dominio.com)." autocomplete="off" required>
                                <label class="form-label" for="correoAbogado">Correo Electrónico</label>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group form-floating">
                                <input id="direccionAbogado" type="text" class="form-control" name="direccionAbogado" placeholder="john doe" maxlength="200" pattern="^[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ\s.,#\-\/]{3,200}$" title="La dirección puede contener letras, números, espacios y caracteres especiales permitidos (., # - /). Entre 3 y 200 caracteres." autocomplete="off" required>
                                <label class="form-label" for="direccionAbogado">Dirección de Residencia</label>
                            </div>
                        </div>
                        
                        <div class="d-flex justify-content-center mt-4 gap-2 w-100">
                            <button type="submit" class="btn__primary" name="registrarAbogado">Registrar</button>
                        </div>
                    </form>
                </div>
            </section>
        </main>

        <?php include('includes/footer.php'); ?>
    </body>
</html>