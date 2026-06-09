<?php
    require_once('model/cliente-model.php');
    require_once('model/caso-model.php');
    require_once('model/tramite-model.php');
    require_once('model/documento-model.php');
    require_once('model/evento-model.php');
    require_once('model/honorario-model.php');
    require_once('model/abogado-model.php');
    require_once('model/usuario-model.php');

    $objCliente = new ClienteModel();
    $objCaso = new CasoModel();
    $objTramite = new TramiteModel();
    $objDocumento = new DocumentoModel();
    $objEvento = new EventoModel();
    $objHonorario = new HonorarioModel();
    $objAbogado = new AbogadoModel();
    $objUsuario = new UsuarioModel();

    $totalClientes = count($objCliente->consultar_cliente_model());
    $totalTramites = count($objTramite->consultar_tramites_model());
    $totalDocumentos = count($objDocumento->consultar_documento_model());
    $totalEventos = count($objEvento->consultar_evento_model());
    $totalHonorarios = count($objHonorario->consultar_honorarios_model());
    $totalUsuarios = count($objUsuario->consultar_usuario_model());

    $listaCasos = $objCaso->consultar_caso_model();
    $casosActivos = 0;
    foreach ($listaCasos as $caso) {
        if ($caso['estatusCaso'] == 'Activo') {
            $casosActivos++;
        }
    }

    $listaAbogados = $objAbogado->consultar_abogado_model();
    $abogadosActivos = 0;
    foreach ($listaAbogados as $abogado) {
        if ($abogado['estatusAbogado'] == 'Activo') {
            $abogadosActivos++;
        }
    }

    require_once('view/home-view.php');
