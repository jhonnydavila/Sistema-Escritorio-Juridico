<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include('includes/header.php'); ?>
        <title>Consultar Eventos</title>
    </head>
    <body>
        <?php include ('includes/sidebar.php'); ?>
        
        <main class="main-content">
            <?php include ('includes/topbar.php'); ?>

            
            <section class="page__container">
                <div class="page__header">
                    <div class="page__header-titles">
                        <h2 class="page__header-title">Consultar Abogados</h2>
                        <span class="page__header-subtitle">Gestión de Abogados</span>
                    </div>
                </div>
                <div class="page__content">
                    <div class="page__tabs">
                        <button class="page__tab active" data-target="panel-activos">
                            <svg width="1.2rem" height="1.2rem" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-archive-icon lucide-archive">
                                <rect width="20" height="5" x="2" y="3" rx="1"/>
                                <path d="M4 8v11a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8"/>
                                <path d="M10 12h4"/>
                            </svg>
                            <span>Eventos Activos</span>
                        </button>
                        <button class="page__tab" data-target="panel-suspendidos">
                            <svg width="1.2rem" height="1.2rem" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-archive-x-icon lucide-archive-x">
                                <rect width="20" height="5" x="2" y="3" rx="1"/>
                                <path d="M4 8v11a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8"/>
                                <path d="m9.5 17 5-5"/><path d="m9.5 12 5 5"/>
                            </svg>
                            <span>Eventos Suspendidos</span>
                        </button>
                    </div>

                    
                    <div class="page__panels-container w-100">
                        <div class="table__container page__tab-panel w-100" id="panel-activos" style="display: block;">
                            <table id="table" class="table__content">
                                <thead>
                                    <tr>
                                        <th>Código Evento</th>
                                        <th>Código Caso</th>
                                        <th>Título/Nombre</th>
                                        <th>Tipo</th>
                                        <th>Fecha</th>
                                        <th>Descripción</th>
                                        <th>Estatus</th>
                                        <th class="text-center">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($data)){
                                        foreach ($data as $evento){ 
                                            if($evento['estatusEvento'] != "Suspendido"){ ?>
                                                <tr>
                                                    <td><?php echo $evento['codigoEvento']?></td>
                                                    <td><?php echo $evento['codigoCaso']?></td>
                                                    <td><?php echo $evento['tituloEvento']?></td>
                                                    <td><?php echo $evento['tipoEvento']?></td>
                                                    <td><?php echo $evento['fechaEvento']?></td>
                                                    <td><?php echo $evento['descripcionEvento']?></td>
                                                    <td><span class="badge rounded-pill <?php if ($evento['estatusEvento']=="Confirmado") {echo "text-bg-primary";}else{ echo "text-bg-secondary";} ?>"><?php echo $evento['estatusEvento']?></span></td>
                                                    <td>
                                                        <div class="table__buttons">
                                                            <button class="btn__table-update" title="Modificar evento">
                                                                <svg width="1rem" height="1rem" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-pencil-line-icon lucide-pencil-line"><path d="M13 21h8"/>
                                                                    <path d="m15 5 4 4"/>
                                                                    <path d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z"/>
                                                                </svg>
                                                            </button>
                                                            <button class="btn__table-delete" title="Eliminar evento">
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
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="table__container page__tab-panel w-100" id="panel-suspendidos" style="display: none;">
                            <table id="table" class="table__content">
                                <thead>
                                    <tr>
                                        <th>Código Evento</th>
                                        <th>Código Caso</th>
                                        <th>Título/Nombre</th>
                                        <th>Tipo</th>
                                        <th>Fecha</th>
                                        <th>Descripción</th>
                                        <th>Estatus</th>
                                        <th class="text-center">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($data)){
                                        foreach ($data as $evento){ 
                                            if($evento['estatusEvento'] == "Suspendido"){ ?>
                                                <tr>
                                                    <td><?php echo $evento['codigoEvento']?></td>
                                                    <td><?php echo $evento['codigoCaso']?></td>
                                                    <td><?php echo $evento['tituloEvento']?></td>
                                                    <td><?php echo $evento['tipoEvento']?></td>
                                                    <td><?php echo $evento['fechaEvento']?></td>
                                                    <td><?php echo $evento['descripcionEvento']?></td>
                                                    <td><span class="badge rounded-pill text-bg-danger"><?php echo $evento['estatusEvento']?></span></td>
                                                    <td>
                                                        <div class="table__buttons">
                                                            <button class="btn__table-update" title="Modificar evento">
                                                                <svg width="1rem" height="1rem" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-pencil-line-icon lucide-pencil-line"><path d="M13 21h8"/>
                                                                    <path d="m15 5 4 4"/>
                                                                    <path d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z"/>
                                                                </svg>
                                                            </button>
                                                            <button class="btn__table-delete" title="Eliminar evento">
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
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        </main>

        <?php (include 'view/includes/footer.php'); ?>
    </body>
</html>
