<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include ('includes/header.php'); ?>
        <title>Consultar Expedientes</title>
    </head>
    <body>
        <?php include ('includes/sidebar.php'); ?>
        <main class="main-content">
            <?php include ('includes/topbar.php'); ?>
            <section class="page__container">
                <div class="page__header">
                    <div class="page__header-titles">
                        <h2 class="page__header-title">Consultar Expedientes</h2>
                        <span class="page__header-subtitle">Listado de expedientes</span>
                    </div>
                </div>
                <div class="page__content">
                    <div class="table__container">
                        <table id="table" class="table__content">
                            <thead>
                                <tr>
                                    <th>Identificador</th>
                                    <th>Código Caso</th>
                                    <th>Número Archivador</th>
                                    <th>Número de Expediente</th>
                                    <th>Acción Legal</th>
                                    <th>Descripción</th>
                                    <th>Fecha Apertura</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>EXP-001</td>
                                    <td>CAS-001</td>
                                    <td>ARC-001</td>
                                    <td>3448348-001</td>
                                    <td>Demanda</td>
                                    <td>Lorem, ipsum do</td>
                                    <td>2026-05-01</td>
                                    <td>
                                        <div class="table__buttons">
                                            <button class="btn__table-view" title="Ver Documentos">
                                                <svg width="1rem" height="1rem" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-eye-icon lucide-eye">
                                                    <path d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0"/>
                                                    <circle cx="12" cy="12" r="3"/>
                                                </svg>
                                            </button>
                                            <button class="btn__table-update" title="Modificar Expediente">
                                                <svg width="1rem" height="1rem" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-pencil-line-icon lucide-pencil-line"><path d="M13 21h8"/>
                                                    <path d="m15 5 4 4"/>
                                                    <path d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </main>
        <?php include ('includes/footer.php'); ?>
    </body>
</html>