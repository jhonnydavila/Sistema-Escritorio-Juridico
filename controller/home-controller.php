<?php
    require_once('model/cliente-model.php');
    require_once('model/caso-model.php');
    require_once('model/tramite-model.php');
    require_once('model/documento-model.php');
    require_once('model/evento-model.php');
    require_once('model/honorario-model.php');
    require_once('model/abogado-model.php');
    require_once('model/usuario-model.php');
    require_once('model/representante-model.php');
    require_once('model/pago-model.php');
    require_once('model/archivador-model.php');

    $objCliente = new ClienteModel();
    $objCaso = new CasoModel();
    $objTramite = new TramiteModel();
    $objDocumento = new DocumentoModel();
    $objEvento = new EventoModel();
    $objHonorario = new HonorarioModel();
    $objAbogado = new AbogadoModel();
    $objUsuario = new UsuarioModel();
    $objRepresentante = new RepresentanteModel();
    $objPago = new PagoModel();
    $objArchivador = new ArchivadorModel();

    $totalRepresentantes = count($objRepresentante->consultar_representantes_model());
    $totalClientes = count($objCliente->consultar_cliente_model());
    $totalTramites = count($objTramite->consultar_tramites_model());
    $totalArchivadores = count($objArchivador->consultar_archivador_model());
    
    if ($_SESSION['rolUsuario']!='secretaria') {
        $totalDocumentos = count($objDocumento->consultar_documento_model());
        $totalEventos = count($objEvento->consultar_evento_model());
        $totalHonorarios = count($objHonorario->consultar_honorarios_model());
        $totalPagos = count($objPago->consultar_pago_model());
        $listaCasos = $objCaso->consultar_caso_model();
        $casosActivos = 0;
        foreach ($listaCasos as $caso) {
            if ($caso['estatusCaso'] == 'Activo') {
                $casosActivos++;
            }
        }
    }
    $totalUsuarios = count($objUsuario->consultar_usuario_model());


    $listaAbogados = $objAbogado->consultar_abogado_model();
    $abogadosActivos = 0;
    foreach ($listaAbogados as $abogado) {
        if ($abogado['estatusAbogado'] == 'Activo') {
            $abogadosActivos++;
        }
    }

    require_once('view/home-view.php');
