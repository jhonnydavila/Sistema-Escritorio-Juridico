<!DOCTYPE html>
<html lang="es">
    <head>
        <?php include('includes/header.php'); ?>
        <title>Asignaciones - Desarrollo de Caso</title>
    </head>
    <body>
        <?php include ('includes/sidebar.php'); ?>
        <main class="main-content">
            <?php include ('includes/topbar.php'); ?>

            
            <section class="page__container">
                <div class="page__content">
                    <div class="page__tabs">
                        <button class="page__tab active" data-target="tab-informacion">
                            <svg width="1.2rem" height="1.2rem" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-archive-icon lucide-archive">
                                <rect width="20" height="5" x="2" y="3" rx="1"/>
                                <path d="M4 8v11a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8"/>
                                <path d="M10 12h4"/>
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
                            <svg width="1.2rem" height="1.2rem" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-archive-x-icon lucide-archive-x">
                                <rect width="20" height="5" x="2" y="3" rx="1"/>
                                <path d="M4 8v11a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8"/>
                                <path d="m9.5 17 5-5"/><path d="m9.5 12 5 5"/>
                            </svg>
                            <span>Documentos</span>
                        </button>
                        <button class="page__tab" data-target="tab-pagos">
                            <svg width="1.2rem" height="1.2rem" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-archive-x-icon lucide-archive-x">
                                <rect width="20" height="5" x="2" y="3" rx="1"/>
                                <path d="M4 8v11a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8"/>
                                <path d="m9.5 17 5-5"/><path d="m9.5 12 5 5"/>
                            </svg>
                            <span>Pagos y Gastos</span>
                        </button>
                        <button class="page__tab" data-target="tab-eventos">
                            <svg width="1.2rem" height="1.2rem" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-archive-x-icon lucide-archive-x">
                                <rect width="20" height="5" x="2" y="3" rx="1"/>
                                <path d="M4 8v11a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8"/>
                                <path d="m9.5 17 5-5"/><path d="m9.5 12 5 5"/>
                            </svg>
                            <span>Eventos</span>
                        </button>
                    </div>
                </div>
                <div class="page__panels-container mt-3">

                    <div class="row g-3 tab__panel" id="tab-informacion" style="display: flex;">
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
                                                    <span class="data__list-title">N° de Expediente: EXP-2026-8849</span>
                                                    <span class="data__list-subtitle">Instancia: Tribunal de Municipio</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="data__list-item">
                                                <div class="data__list-info">
                                                    <span class="data__list-title">Cliente Representado</span>
                                                    <span class="data__list-subtitle">Juan Rodríguez (C.I: 12.345.678)</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="data__list-item">
                                                <div class="data__list-info">
                                                    <span class="data__list-title">N° de Expediente: EXP-2026-8849</span>
                                                    <span class="data__list-subtitle">Instancia: Tribunal de Municipio</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="data__list-item">
                                                <div class="data__list-info">
                                                    <span class="data__list-title">Dr. Carlos Jiménez</span>
                                                    <span class="data__list-subtitle">Abogado Principal</span>
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

                    <div class="row g-2 tab__panel" id="tab-datos" style="display: none;">
                        <div class="col-12">
                            <div class="section__container">
                                <div class="section__header">
                                    <h2 class="section__title">Actualizar Datos del Caso</h2>
                                    <button class="btn__primary">Guardar Cambios</button>
                                </div>
                                <div class="section__content">
                                    <div class="row form__row">
                                        <div class="col-md-6 form__group-minimal">
                                            <label for="tituloCaso">Título del Caso</label>
                                            <input type="text" id="tituloCaso" value="Demanda por Linderos" placeholder="Ingrese el título">
                                        </div>
                                        <div class="col-md-6 form__group-minimal">
                                            <label for="materiaCaso">Materia Jurídica</label>
                                            <select id="materiaCaso">
                                                <option value="civil" selected>Civil</option>
                                                <option value="penal">Penal</option>
                                                <option value="mercantil">Mercantil</option>
                                            </select>
                                        </div>
                                        <div class="col-12 form__group-minimal">
                                            <label for="descripcionCaso">Descripción de los Hechos</label>
                                            <textarea id="descripcionCaso" rows="3">Conflicto de linderos en parcela norte...</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="section__container">
                                <div class="section__header">
                                    <h2 class="section__title">Asignación</h2>
                                </div>
                                <div class="section__content">
                                    <div class="data__list">
                                        <div class="data__list-item">
                                            <div class="data__list-info">
                                                <span class="data__list-title">Dr. Carlos Jiménez</span>
                                                <span class="data__list-subtitle">Abogado Principal</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row g-2 tab__panel" id="tab-documentos" style="display: none;">
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
                                                <span class="data__list-subtitle">Soporte Formal - Subido el 21/05/2026</span>
                                            </div>
                                            <div class="d-flex gap-2">
                                                <button class="btn__icon" title="Ver Documento">
                                                    </button>
                                                <button class="btn__icon" title="Descargar Documento">
                                                    </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row g-2 tab__panel" id="tab-pagos" style="display: none;">
                        <div class="col-12">
                            <div class="section__container">
                                <div class="section__header">
                                    <h2 class="section__title">Historial Financiero</h2>
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
                    </div>

                    <div class="row g-2 tab__panel" id="tab-eventos" style="display: none;">
                        <div class="col-12">
                            <div class="section__container">
                                <div class="section__header">
                                    <h2 class="section__title">Próximos Eventos y Apuntes</h2>
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
            </section>
        </main>

        <?php include ('view/includes/footer.php'); ?>
    </body>
</html>
<!-- 
                    
                    <div class="col-12">
                        <div class="section__container">
                            <div class="section__header">
                                <h2 class="section__title">Expediente</h2>
                            </div>

                            <div class="data__list">
                                <div class="data__list-item">
                                    <div class="data__list-info">
                                        <span class="data__list-title">N° de Expediente: EXP-2026-8849</span>
                                        <span class="data__list-subtitle">Instancia: Tribunal de Municipio</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
-->