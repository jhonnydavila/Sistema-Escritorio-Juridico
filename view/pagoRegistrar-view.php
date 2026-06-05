<!DOCTYPE html>
<html lang="es">
    <head>
        <?php include('includes/header.php'); ?>
        <title>Registrar Pago</title>
    </head>
    <body>
        <?php include('includes/sidebar.php'); ?>
        <main class="main-content">
            <?php include('includes/topbar.php'); ?>
            
            <section class="page__container">
                <div class="page__header">
                    <div class="page__header-titles">
                        <h2 class="page__header-title">Registrar Pago</h2>
                        <span class="page__header-subtitle">Agrega un abono de dinero a una deuda de honorario</span>
                    </div>
                </div>
                <div class="page__content">
                    <form action="pago" id="form" class="row p-4 gy-1" method="POST">
                        <div class="col-md-6">
                            <div class="form-group form-floating">
                                <select class="form-select" id="honorarioPago" name="honorarioPago" required title="Seleccione el código del acuerdo de honorario correspondiente">
                                    <option value="" hidden>Seleccionar Honorario...</option>
                                    <?php 
                                        if (!empty($dataHonorarios)) {
                                            foreach($dataHonorarios as $honorario){
                                                echo '<option value="'.$honorario['codigoHonorario'].'">'.$honorario['codigoHonorario'].' (Caso: '.$honorario['codigoCaso'].')</option>';
                                            }
                                        } 
                                    ?>
                                </select>
                                <label class="form-label" for="honorarioPago">Código Acuerdo Honorario</label>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group form-floating">
                                <select class="form-select" id="metodoPago" name="metodoPago" required title="Seleccione el método con el que se realizó el pago">
                                    <option value="" hidden>Seleccionar...</option>
                                    <option value="Transferencia">Transferencia</option>
                                    <option value="Efectivo">Efectivo</option>
                                    <option value="Pago Móvil">Pago Móvil</option>
                                </select>
                                <label class="form-label" for="metodoPago">Método de Pago</label>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group form-floating">
                                <select class="form-select" id="estatusPago" name="estatusPago" required title="Seleccione el estatus actual del pago">
                                    <option value="Confirmado">Confirmado</option>
                                    <option value="Pendiente">Pendiente</option>
                                    <option value="Rechazado">Rechazado</option>
                                </select>
                                <label class="form-label" for="estatusPago">Estatus del Pago</label>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group form-floating">
                                <input id="montoPago" type="number" step="0.01" min="0.01" class="form-control" name="montoPago" placeholder="150.00" required title="Ingrese un monto válido mayor a 0">
                                <label class="form-label" for="montoPago">Monto a Abonar</label>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group form-floating">
                                <input id="conceptoPago" type="text" class="form-control" name="conceptoPago" placeholder="Concepto" required pattern="^[A-ZÁÉÍÓÚÑa-záéíóúñ0-9 .,#\-]+$" title="El concepto solo puede contener letras, números, espacios y los caracteres especiales (.,#-)">
                                <label class="form-label" for="conceptoPago">Concepto / Descripción Corta</label>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group form-floating">
                                <input id="observacionesPago" type="text" class="form-control" name="observacionesPago" placeholder="Observaciones" pattern="^[A-ZÁÉÍÓÚÑa-záéíóúñ0-9 .,#\-]*$" title="Las observaciones solo pueden contener letras, números, espacios y los caracteres especiales (.,#-)">
                                <label class="form-label" for="observacionesPago">Observaciones (Opcional)</label>
                            </div>
                        </div>

                        <div class="d-flex justify-content-center mt-4 w-100">
                            <button type="submit" class="btn__primary" name="registrarPago">Registrar</button>
                        </div>
                    </form>
                </div>
            </section>
        </main>
        <?php include('includes/footer.php'); ?>
    </body>
</html>