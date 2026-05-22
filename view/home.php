<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include __DIR__ . '/includes/header.php'; ?>
        <title>Sistema - Abogados</title>
    </head>
    <body>
        <?php include __DIR__ . '/includes/sidebar.php'; ?>
        
        <main class="main-content">
            <?php include __DIR__ . '/includes/topbar.php'; ?>
            

                            <div class="row g-2" id="informacion-general" style="display: none;">
                                <div class="col-12">
                                    <div class="section__content">
                                        <h3>Datos del Caso</h3>
                                        <h3>Datos del Abogado</h3>
                                        <h3>Datos del Cliente</h3>
                                        <h3>Expediente</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-2" id="datos-caso" style="display: none;">
                                <div class="col-12">
                                    <div class="section__content">
                                        <h3>Datos del Caso</h3>
                                        <h3>Datos del Abogado</h3>
                                        <h3>Datos del Cliente</h3>
                                        <h3>Expediente</h3>
                                    </div>
                                </div>
                            </div>

                    <div class="col-12" id="datos-caso">
                        <div class="row g-2">
                            <div class="col-5">
                                <div class="section__container">
                                    <div class="section__header">
                                        <h2 class="section__title">Documentos Recientes</h2>
                                        <button class="btn__outline">Agregar</button>
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
                                    
                            <div class="col-7">
                                <div class="section__container">
                                    <div class="section__header">
                                        <h2 class="section__title">Próximos Eventos</h2>
                                        <button class="btn__outline">Agregar</button>
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
                                                    <span class="data__list-title">Entrevista inicial con los representados</span>
                                                    <span class="data__list-subtitle">Revisión de la documentación aportada y diseño de los primeros argumentos de defensa.</span>
                                                </div>
                                                <span class="data__list-subtitle">21/05/2026</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12" id="informacion-documental" style="display: none;">
                        <div class="row g-2">
                            <div class="col-lg-7">
                                <div class="section__container">
                                    <div class="section__header">
                                        <h2 class="section__title">Apuntes</h2>
                                        <button class="btn__outline">Agregar</button>
                                    </div>
                                    <div class="section__content">
                                        <div class="data__list">
                                            <div class="data__list-item">
                                                <div class="data__list-info">
                                                    <span class="data__list-title">Entrevista inicial con los representados</span>
                                                    <span class="data__list-subtitle">Revisión de la documentación aportada y diseño de los primeros argumentos de defensa.</span>
                                                </div>
                                                <span class="data__list-subtitle">21/05/2026</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-5">
                                <div class="row g-2">
                                    <div class="col-12">
                                        <div class="section__container">
                                            <div class="section__header">
                                                <h2 class="section__title">Documentos Recientes</h2>
                                                <button class="btn__outline">Agregar</button>
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
                                    
                                    <div class="col-12">
                                        <div class="section__container">
                                            <div class="section__header">
                                                <h2 class="section__title">Próximos Eventos</h2>
                                                <button class="btn__outline">Agregar</button>
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
                    </div>
            </section>
        </main>

        <?php include __DIR__ . '/includes/footer.php'; ?>
    </body>
</html>