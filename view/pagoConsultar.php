<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include __DIR__ . '/includes/header.php'; ?>
        <title>Consultar Pagos</title>
    </head>
    <body>
        <?php include __DIR__ . '/includes/sidebar.php'; ?>
        <main class="main-content">
            <?php include __DIR__ . '/includes/topbar.php'; ?>
            <section class="page__container">
                <div class="page__header">
                    <div class="page__header-titles">
                        <h2 class="page__header-title">Consultar Pagos</h2>
                        <span class="page__header-subtitle">Historial de pagos registrados</span>
                    </div>
                </div>
                <div class="page__content">
                    <div class="table__container">
                        <table id="table" class="table__content">
                            <thead>
                                <tr>
                                    <th>Código Pago</th>
                                    <th>Código Caso</th>
                                    <th>Concepto</th>
                                    <th>Monto</th>
                                    <th>Método</th>
                                    <th>Fecha</th>
                                    <th>Estatus</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>PAG-001</td>
                                    <td>CAS-001</td>
                                    <td>Honorarios</td>
                                    <td>1200.00</td>
                                    <td><span class="badge rounded-pill text-bg-secondary">Efectivo</span></td>
                                    <td>2026-05-18</td>
                                    <td><span class="badge rounded-pill text-bg-success">Confirmado</span></td>
                                    <td>
                                        <div class="table__buttons">
                                            <button class="btn__table-update" title="Modificar Pago">
                                                <svg width="1rem" height="1rem" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-pencil-line-icon lucide-pencil-line"><path d="M13 21h8"/>
                                                    <path d="m15 5 4 4"/>
                                                    <path d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>PAG-002</td>
                                    <td>CAS-002</td>
                                    <td>Honorarios</td>
                                    <td>18000.00</td>
                                    <td><span class="badge rounded-pill text-bg-dark">Transferencia</span></td>
                                    <td>2026-05-18</td>
                                    <td><span class="badge rounded-pill text-bg-secondary">Pendiente</span></td>
                                    <td>
                                        <div class="table__buttons">
                                            <button class="btn__table-update" title="Modificar Pago">
                                                <svg width="1rem" height="1rem" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-pencil-line-icon lucide-pencil-line"><path d="M13 21h8"/>
                                                    <path d="m15 5 4 4"/>
                                                    <path d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>PAG-003</td>
                                    <td>CAS-003</td>
                                    <td>Honorarios</td>
                                    <td>18000.00</td>
                                    <td><span class="badge rounded-pill text-bg-dark">Transferencia</span></td>
                                    <td>2026-05-18</td>
                                    <td><span class="badge rounded-pill text-bg-danger">Rechazado</span></td>
                                    <td>
                                        <div class="table__buttons">
                                            <button class="btn__table-update" title="Modificar Pago">
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
        <?php include __DIR__ . '/includes/footer.php'; ?>
    </body>
</html>