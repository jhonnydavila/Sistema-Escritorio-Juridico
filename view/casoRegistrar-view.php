<!DOCTYPE html>
<html lang="es">
    <head>
        <?php include('includes/header.php'); ?>
        <title>Registrar Caso</title>
    </head>
    <body>
        <?php include('includes/sidebar.php'); ?>
        <main class="main-content">
            <?php include('includes/topbar.php'); ?>

            <section class="page__container">
                <div class="page__header">
                    <div class="page__header-titles">
                        <h2 class="page__header-title">Registrar Caso</h2>
                        <span class="page__header-subtitle">Gestión de Casos</span>
                    </div>
                </div>
                <div class="page__content">
                    <form action="caso" id="form" class="row p-4 gy-1" method="POST">
                        <input type="text" name="registrar" hidden required>
                        
                        <div class="col-md-6">
                            <div class="form-group form-floating">
                                <select class="form-select" id="codigoCliente" name="codigoCliente" required>
                                    <option value="" hidden>Seleccione una opción...</option>
                                    <?php
                                        if (!empty($dataClientes)) {
                                            foreach ($dataClientes as $cliente) {
                                                // Se usa codigoCliente para el value. 
                                                // Si en tu consulta combinaste (JOIN) con tbl_clientesnaturales, puedes usar nombre y apellido.
                                                // De lo contrario, puedes mostrar solo el codigoCliente.
                                                $nombreMostrar = isset($cliente['nombreClienteNatural']) ? $cliente['nombreClienteNatural'] . ' ' . $cliente['apellidoClienteNatural'] : '';
                                                echo '<option value="' . htmlspecialchars($cliente['codigoCliente']) . '">' . htmlspecialchars($cliente['codigoCliente'] . ' - ' . $nombreMostrar) . '</option>';
                                            }
                                        }
                                    ?>
                                </select>
                                <label for="codigoCliente" class="form-label">Cliente</label>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group form-floating">
                                <select class="form-select" id="modalidadCaso" name="modalidadCaso" required>
                                    <option value="" hidden>Seleccionar...</option>
                                    <option value="Asesoria">Asesoría</option>
                                    <option value="Gestion Juridica">Gestión Jurídica</option>
                                </select>
                                <label for="modalidadCaso" class="form-label">Tipo de Caso</label>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <div class="form-group form-floating">
                                <select class="form-select" id="origenExpediente" name="origenExpediente" required>
                                    <option value="" hidden>Seleccionar...</option>
                                    <option value="Asesoria">Extrajudicial</option>
                                    <option value="Gestion Juridica">Judicial</option>
                                </select>
                                <label for="origenExpediente" class="form-label">Origen para el Expediente</label>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <div class="form-group form-floating">
                                <input id="numeroExpediente" type="text" class="form-control" name="numeroExpediente" placeholder="Ej: EXP-2026-X" autocomplete="off" required>
                                <label class="form-label" for="numeroExpediente">Número de Expediente (Opcional)</label>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <div class="form-group form-floating">
                                <select class="form-select" id="codigoArchivador" name="codigoArchivador" required>
                                    <option value="" hidden>Seleccione una opción...</option>
                                    <?php
                                        if (!empty($dataArchivadores)) {
                                            foreach ($dataArchivadores as $archivador) {
                                                echo '<option value="' . htmlspecialchars($archivador['codigoArchivador']) . '">' . htmlspecialchars($archivador['codigoArchivador'] . ' - ' . $archivador['nombreArchivador']) . '</option>';
                                            }
                                        }
                                        ?>
                                </select>
                                <label for="codigoArchivador" class="form-label">Archivador para el Expediente (Opcional)</label>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group form-floating">
                                <input id="descripcionCaso" type="text" class="form-control" name="descripcionCaso" placeholder="Detalles del caso..." autocomplete="off" required>
                                <label class="form-label" for="descripcionCaso">Descripción del Caso</label>
                            </div>
                        </div>

                        <div class="d-flex justify-content-center mt-4 gap-2 w-100">
                            <button type="submit" class="btn__primary" name="registrarCaso">Registrar</button>
                        </div>
                    </form>
                </div>
            </section>
        </main>

        <?php include ('includes/footer.php'); ?>
    </body>
</html>