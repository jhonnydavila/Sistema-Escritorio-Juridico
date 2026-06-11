<!DOCTYPE html>
<html lang="es">
    <head>
        <?php include('includes/header.php'); ?>
        <title>Asignaciones - Desarrollo de Caso</title>
    </head>
    <body>
        <?php include('includes/sidebar.php'); ?>
        <main class="main-content">
            <?php include('includes/topbar.php'); ?>
            <section class="page__container">
                <div class="page__content">
                    <div class="page__tabs">
                        <button class="page__tab active" data-target="tab-informacion">
                            <svg width="1.2rem" height="1.2rem" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text-icon lucide-file-text">
                                <path d="M6 22a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h8a2.4 2.4 0 0 1 1.704.706l3.588 3.588A2.4 2.4 0 0 1 20 8v12a2 2 0 0 1-2 2z"/>
                                <path d="M14 2v5a1 1 0 0 0 1 1h5"/>
                                <path d="M10 9H8"/>
                                <path d="M16 13H8"/>
                                <path d="M16 17H8"/>
                            </svg>
                            <span>Información General</span>
                        </button>
                        <button class="page__tab" data-target="tab-datos">
                            <svg width="1.2rem" height="1.2rem" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-archive-icon lucide-archive">
                                <rect width="20" height="5" x="2" y="3" rx="1"/>
                                <path d="M4 8v11a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8"/>
                                <path d="M10 12h4"/>
                            </svg>
                            <span>Datos del Caso</span>
                        </button>
                        <button class="page__tab" data-target="tab-documentos">
                            <svg width="1.2rem" height="1.2rem" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-folder-icon lucide-folder">
                                <path d="M20 20a2 2 0 0 0 2-2V8a2 2 0 0 0-2-2h-7.9a2 2 0 0 1-1.69-.9L9.6 3.9A2 2 0 0 0 7.93 3H4a2 2 0 0 0-2 2v13a2 2 0 0 0 2 2Z"/>
                            </svg>
                            <span>Documentos</span>
                        </button>
                        <button class="page__tab" data-target="tab-pagos">
                            <svg width="1.2rem" height="1.2rem" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chart-network-icon lucide-chart-network">
                                <path d="m13.11 7.664 1.78 2.672"/>
                                <path d="m14.162 12.788-3.324 1.424"/>
                                <path d="m20 4-6.06 1.515"/>
                                <path d="M3 3v16a2 2 0 0 0 2 2h16"/>
                                <circle cx="12" cy="6" r="2"/>
                                <circle cx="16" cy="12" r="2"/>
                                <circle cx="9" cy="15" r="2"/>
                            </svg>
                            <span>Pagos y Gastos</span>
                        </button>
                        <button class="page__tab" data-target="tab-eventos">
                            <svg width="1.2rem" height="1.2rem" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calendar-clock-icon lucide-calendar-clock">
                                <path d="M16 14v2.2l1.6 1"/>
                                <path d="M16 2v4"/>
                                <path d="M21 7.5V6a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h3.5"/>
                                <path d="M3 10h5"/>
                                <path d="M8 2v4"/>
                                <circle cx="16" cy="16" r="6"/>
                            </svg>
                            <span>Eventos</span>
                        </button>
                    </div>
                </div>
                
                <div class="page__panels-container mt-3">
                    <div class="page__tab-panel" id="tab-informacion" style="display: block;">
                        <div class="row g-3">
                            <div class="col-8">
                                <div class="section__container">
                                    <div class="section__header">
                                        <h2 class="section__title">Detalles Principales</h2>
                                    </div>
                                    <div class="section__content">
                                        <div class="row g-2">
                                            <div class="col-6">
                                                <div class="data__list-item">
                                                    <div class="data__list-info">
                                                        <span class="data__list-title">Gestión Jurídica</span>
                                                        <span class="data__list-subtitle">Tipo de Caso</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="data__list-item">
                                                    <div class="data__list-info">
                                                        <span class="data__list-title">Juan Rodríguez C.I: 12.345.678</span>
                                                        <span class="data__list-subtitle">Cliente Representado</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="data__list-item">
                                                    <div class="data__list-info">
                                                        <span class="data__list-title">EXP-2026-8849</span>
                                                        <span class="data__list-subtitle">Número de Expediente</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="data__list-item">
                                                    <div class="data__list-info">
                                                        <span class="data__list-title">Dr. Carlos Jiménez</span>
                                                        <span class="data__list-subtitle">Abogado Asignado</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-4">
                                <div class="section__container">
                                    <div class="section__header">
                                        <h2 class="section__title">Documentos Recientes</h2>
                                    </div>
                                    <div class="section__content">
                                        <div class="data__list">
                                            <div class="data__list-item">
                                                <div class="data__list-info">
                                                    <span class="data__list-title">Poder Integrado Legal.pdf</span>
                                                    <span class="data__list-subtitle">Soporte Formal</span>
                                                </div>
                                                <button class="btn__icon" title="Descargar Documento">
                                                    <svg width="1.1rem" height="1.1rem" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-down-to-line-icon lucide-arrow-down-to-line">
                                                        <path d="M12 17V3"/>
                                                        <path d="m6 11 6 6 6-6"/>
                                                        <path d="M19 21H5"/>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="section__container">
                                    <div class="section__header">
                                        <h2 class="section__title">Ultimos Pagos y Gastos</h2>
                                    </div>

                                    <div class="section__content">
                                        <div class="data__list">
                                            <div class="data__list-item" style="border-left-color: #2e7d32;">
                                                <div class="data__list-info">
                                                    <span class="data__list-title">Honorarios Profesionales</span>
                                                    <span class="data__list-subtitle">Tipo: Ingreso por Pago</span>
                                                </div>
                                                <span class="text-success fw-bold">+$450.00</span>
                                            </div>
                                            <div class="data__list-item" style="border-left-color: #c62828;">
                                                <div class="data__list-info">
                                                    <span class="data__list-title">Tasas e Impuestos de Tramitación</span>
                                                    <span class="data__list-subtitle">Tipo: Egreso Operativo</span>
                                                </div>
                                                <span class="text-danger fw-bold">-$60.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="section__container">
                                    <div class="section__header">
                                        <h2 class="section__title">Próximos Eventos</h2>
                                    </div>

                                    <div class="section__content">
                                        <div class="data__list">
                                            <div class="data__list-item">
                                                <div class="data__list-info">
                                                    <span class="data__list-title">Audiencia de Mediación Formal</span>
                                                    <span class="data__list-subtitle">Lugar: Sede del Tribunal correspondiente</span>
                                                </div>
                                                <span class="data__list-subtitle" style="font-weight: 500;">28/05/2026 - 09:00 AM</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="page__tab-panel" id="tab-datos" style="display: none;">
                        <div class="row g-3">
                            <div class="col-8">
                                <div class="row g-3">
                                    <div class="col-12">
                                        <div class="section__container">
                                            <div class="section__header">
                                                <h2 class="section__title">Apuntes</h2>
                                                <button class="btn__outline">Agregar</button>
                                            </div>
                                            <div class="section__content">
                                                <div class="data__list">
                                                    <div class="data__list-item">
                                                        <div class="data__list-info">
                                                            <span class="data__list-title">Poder Integrado Legal.pdf</span>
                                                            <span class="data__list-subtitle">Soporte Formal</span>
                                                        </div>
                                                        <div class="d-flex gap-2">
                                                            <button class="btn__icon" title="Editar Apunte">
                                                                <svg width="0.9rem" height="0.9rem" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-pencil-line-icon lucide-pencil-line">
                                                                    <path d="M13 21h8"/>
                                                                    <path d="m15 5 4 4"/>
                                                                    <path d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z"/>
                                                                </svg>
                                                            </button>
                                                            <button class="btn__icon" title="Eliminar Apunte">
                                                                <svg width="1rem" height="1rem" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash2-icon lucide-trash-2">
                                                                    <path d="M10 11v6"/>
                                                                    <path d="M14 11v6"/>
                                                                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6"/>
                                                                    <path d="M3 6h18"/>
                                                                    <path d="M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/>
                                                                </svg>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="section__container">
                                            <div class="section__header">
                                                <h2 class="section__title">Información de la Asignación</h2>
                                            </div>
                                            <div class="section__content">
                                                <div class="data__list">
                                                    <div class="data__list-item">
                                                        <div class="data__list-info">
                                                            <span class="data__list-title">Dr. Carlos Jiménez</span>
                                                            <span class="data__list-subtitle">Abogado Principal</span>
                                                        </div>
                                                    </div>
                                                    <button class="btn__primary">Cambiar</button>
                                                    <button class="btn__outline">Cerrar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-4">
                                <div class="section__container">
                                    <div class="section__header">
                                        <h2 class="section__title">Información del Caso</h2>
                                    </div>
                                    <div class="section__content p-3 px-4">
                                        
                                        <p class="text-muted mb-3">No hay una descripción</p>

                                        <div class="d-flex flex-column gap-2 mb-3">
                                            <div class="d-flex align-items-center gap-2 text-muted">
                                                <svg width="1rem" height="1rem" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-tag">
                                                    <path d="M12 2H2v10l9.29 9.29c.94.94 2.48.94 3.42 0l6.58-6.58c.94-.94.94-2.48 0-3.42L12 2Z"/>
                                                    <path d="M7 7h.01"/>
                                                </svg>
                                                <span><strong>Tipo:</strong> Civil / Familiar</span>
                                            </div>
                                            <div class="d-flex align-items-center gap-2 text-muted">
                                                <svg width="1rem" height="1rem" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-activity">
                                                    <path d="M22 12h-4l-3 9L9 3l-3 9H2"/>
                                                </svg>
                                                <span><strong>Estatus:</strong> En Desarrollo</span>
                                            </div>
                                            <div class="d-flex align-items-center gap-2 text-muted">
                                                <svg width="1rem" height="1rem" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calendar">
                                                    <rect width="18" height="18" x="3" y="4" rx="2" ry="2"/>
                                                    <line x1="16" x2="16" y1="2" y2="6"/>
                                                    <line x1="8" x2="8" y1="2" y2="6"/>
                                                    <line x1="3" x2="21" y1="10" y2="10"/>
                                                </svg>
                                                <span><strong>Iniciado:</strong> 15 de Marzo, 2026</span>
                                            </div>
                                        </div>

                                        <hr style="opacity: 0.15; margin: 0.9rem 0;">

                                        <div class="mb-3">
                                            <h6 class="fw-bold mb-1" style="color: var(--primary);">Expediente Generado</h6>
                                            <a href="#" class="text-decoration">EXP-2026-8849</a>
                                            <p class="text-muted">Acción Legal: Demanda de partición</p>
                                        </div>

                                        <hr style="opacity: 0.15; margin: 0.9rem 0;">

                                        <div>
                                            <h6 class="fw-bold mb-1" style="color: var(--primary);">Cliente</h6>
                                            <div class="d-flex align-items-center gap-2 pb-2">
                                                <div class="rounded-circle d-flex align-items-center justify-content-center text-white" style="width: 28px; height: 28px; font-size: 0.7rem; background-color: var(--primary-background);">
                                                    JR
                                                </div>
                                                <div>
                                                    <span class="d-block fw-medium">Juan Rodríguez</span>
                                                    <span class="d-block text-muted" style="margin-top: -3px; font-size: 0.7rem;">Persona Natural</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="page__tab-panel" id="tab-documentos" style="display: none;">
                        <div class="row g-3">
                            <div class="col-12">
                                <div class="section__container">
                                    <div class="section__header">
                                        <h2 class="section__title">Gestión de Documentos</h2>
                                        <button class="btn__outline">Cargar Documento</button>
                                    </div>
                                    <div class="section__content">
                                        <div class="data__list">
                                            <div class="data__list-item">
                                                <div class="data__list-info">
                                                    <span class="data__list-title">Poder Integrado Legal.pdf</span>
                                                    <span class="data__list-subtitle">Soporte Formal</span>
                                                </div>
                                                <button class="btn__icon" title="Descargar Documento">
                                                    <svg width="1.1rem" height="1.1rem" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-down-to-line-icon lucide-arrow-down-to-line">
                                                        <path d="M12 17V3"/>
                                                        <path d="m6 11 6 6 6-6"/>
                                                        <path d="M19 21H5"/>
                                                    </svg>
                                                </button>
                                            </div>
                                            <div class="data__list-item">
                                                <div class="data__list-info">
                                                    <span class="data__list-title">Poder Integrado Legal.pdf</span>
                                                    <span class="data__list-subtitle">Soporte Formal</span>
                                                </div>
                                                <button class="btn__icon" title="Descargar Documento">
                                                    <svg width="1.1rem" height="1.1rem" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-down-to-line-icon lucide-arrow-down-to-line">
                                                        <path d="M12 17V3"/>
                                                        <path d="m6 11 6 6 6-6"/>
                                                        <path d="M19 21H5"/>
                                                    </svg>
                                                </button>
                                            </div>
                                            <div class="data__list-item">
                                                <div class="data__list-info">
                                                    <span class="data__list-title">Poder Integrado Legal.pdf</span>
                                                    <span class="data__list-subtitle">Soporte Formal</span>
                                                </div>
                                                <button class="btn__icon" title="Descargar Documento">
                                                    <svg width="1.1rem" height="1.1rem" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-down-to-line-icon lucide-arrow-down-to-line">
                                                        <path d="M12 17V3"/>
                                                        <path d="m6 11 6 6 6-6"/>
                                                        <path d="M19 21H5"/>
                                                    </svg>
                                                </button>
                                            </div>
                                            <div class="data__list-item">
                                                <div class="data__list-info">
                                                    <span class="data__list-title">Poder Integrado Legal.pdf</span>
                                                    <span class="data__list-subtitle">Soporte Formal</span>
                                                </div>
                                                <button class="btn__icon" title="Descargar Documento">
                                                    <svg width="1.1rem" height="1.1rem" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-down-to-line-icon lucide-arrow-down-to-line">
                                                        <path d="M12 17V3"/>
                                                        <path d="m6 11 6 6 6-6"/>
                                                        <path d="M19 21H5"/>
                                                    </svg>
                                                </button>
                                            </div>
                                            <div class="data__list-item">
                                                <div class="data__list-info">
                                                    <span class="data__list-title">Poder Integrado Legal.pdf</span>
                                                    <span class="data__list-subtitle">Soporte Formal</span>
                                                </div>
                                                <button class="btn__icon" title="Descargar Documento">
                                                    <svg width="1.1rem" height="1.1rem" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-down-to-line-icon lucide-arrow-down-to-line">
                                                        <path d="M12 17V3"/>
                                                        <path d="m6 11 6 6 6-6"/>
                                                        <path d="M19 21H5"/>
                                                    </svg>
                                                </button>
                                            </div>
                                            <div class="data__list-item">
                                                <div class="data__list-info">
                                                    <span class="data__list-title">Poder Integrado Legal.pdf</span>
                                                    <span class="data__list-subtitle">Soporte Formal</span>
                                                </div>
                                                <button class="btn__icon" title="Descargar Documento">
                                                    <svg width="1.1rem" height="1.1rem" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-down-to-line-icon lucide-arrow-down-to-line">
                                                        <path d="M12 17V3"/>
                                                        <path d="m6 11 6 6 6-6"/>
                                                        <path d="M19 21H5"/>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="page__tab-panel" id="tab-pagos" style="display: none;">
                        <div class="row g-3">
                            <div class="col-12">
                                <div class="section__container">
                                    <div class="section__header">
                                        <h2 class="section__title">Historial Financiero</h2>
                                        <button class="btn__primary">Historial</button>
                                    </div>
                                    <div class="section__content">
                                        <div class="data__list">
                                            <div class="data__list-item" style="border-left-color: #2e7d32;">
                                                <div class="data__list-info">
                                                    <span class="data__list-title">Honorarios Profesionales (Abono Inicial)</span>
                                                    <span class="data__list-subtitle">Tipo: Ingreso por Pago</span>
                                                </div>
                                                <span style="color: #2e7d32; font-weight: 600;">+$450.00</span>
                                            </div>
                                            <div class="data__list-item" style="border-left-color: #c62828;">
                                                <div class="data__list-info">
                                                    <span class="data__list-title">Tasas e Impuestos de Tramitación</span>
                                                    <span class="data__list-subtitle">Tipo: Egreso Operativo</span>
                                                </div>
                                                <span style="color: #c62828; font-weight: 600;">-$60.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="section__container">
                                    <div class="section__header">
                                        <h2 class="section__title">Pagos</h2>
                                        <div class="d-flex gap-2">
                                            <button class="btn__outline">Agregar</button>
                                            <button class="btn__primary">Listado</button>
                                        </div>
                                    </div>
                                    <div class="section__content">
                                        <div class="data__list">
                                            <div class="data__list-item" style="border-left-color: #2e7d32;">
                                                <div class="data__list-info">
                                                    <span class="data__list-title">Honorarios Profesionales</span>
                                                    <span class="data__list-subtitle">Fecha: 07/02/2025 | Observaciones: </span>
                                                </div>
                                                <span style="color: #2e7d32; font-weight: 600;">+$450.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="section__container">
                                    <div class="section__header">
                                        <h2 class="section__title">Gastos</h2>
                                        <div class="d-flex gap-2">
                                            <button class="btn__outline">Agregar</button>
                                            <button class="btn__primary">Listado</button>
                                        </div>
                                    </div>
                                    <div class="section__content">
                                        <div class="data__list">
                                            <div class="data__list-item" style="border-left-color: #c62828;">
                                                <div class="data__list-info">
                                                    <span class="data__list-title">Trámites notariales</span>
                                                    <span class="data__list-subtitle">Fecha: 07/02/2025</span>
                                                </div>
                                                <span style="color: #c62828; font-weight: 600;">-$60.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="page__tab-panel" id="tab-eventos" style="display: none;">
                        <div class="row g-3">
                            <div class="col-12">
                                <div class="section__container">
                                    <div class="section__header">
                                        <h2 class="section__title">Próximos Eventos</h2>
                                        <button class="btn__outline">Agendar</button>
                                    </div>
                                    <div class="section__content">
                                        <div class="data__list">
                                            <div class="data__list-item">
                                                <div class="data__list-info">
                                                    <span class="data__list-title">Audiencia de Mediación Formal</span>
                                                    <span class="data__list-subtitle">Lugar: Sede del Tribunal correspondiente</span>
                                                </div>
                                                <span class="data__list-subtitle" style="font-weight: 500;">28/05/2026 - 09:00 AM</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </section>
        </main>

        <?php include ('view/includes/footer.php'); ?>
    </body>
</html>