<!DOCTYPE html>
<html lang="es">
    <head>
        <?php include('includes/header.php'); ?>
        <title>Consultar Representantes</title>
    </head>
    <body>
        <?php include('includes/sidebar.php'); ?>
        <main class="main-content">
            <?php include('includes/topbar.php'); ?>
            <section class="page__container">
                <div class="page__header">
                    <div class="page__header-titles">
                        <h2 class="page__header-title">Consultar Representantes</h2>
                        <span class="page__header-subtitle">Gestión de Representantes</span>
                    </div>
                </div>
                <div class="page__content">
                    <div class="table__container">
                        <table id="table" class="table__content" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>Cédula de Identidad</th>
                                    <th>Nombre</th>
                                    <th>Número Teléfonico</th>
                                    <th class="text-center">Clientes Representados</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($data)){
                                    foreach ($data as $representante){ ?>
                                        <tr>
                                            <td><?php echo $representante['nacionalidadRepresentante'].'-'.$representante['cedulaRepresentante']?></td>
                                            <td class="text-capitalize"><?php echo $representante['nombreRepresentante'] . " " . $representante['apellidoRepresentante']?></td>
                                            <td><?php echo $representante['telefonoRepresentante']?></td>
                                            <td class="text-center"><?php echo $representante['totalClientes']?></td>
                                            <td>
                                                <div class="table__buttons">
                                                    <button class="btn__table-update" title="Modificar Representante">
                                                        <svg width="1rem" height="1rem" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-pencil-line-icon lucide-pencil-line"><path d="M13 21h8"/>
                                                            <path d="m15 5 4 4"/>
                                                            <path d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z"/>
                                                        </svg>
                                                    </button>
                                                    <button class="btn__table-delete" title="Eliminar Representante">
                                                        <svg width="0.9rem" height="0.9rem" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash2-icon lucide-trash-2">
                                                            <path d="M10 11v6"/>
                                                            <path d="M14 11v6"/>
                                                            <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6"/>
                                                            <path d="M3 6h18"/>
                                                            <path d="M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/>
                                                        </svg>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </main>
        <?php include('includes/footer.php'); ?>
    </body>
</html>
