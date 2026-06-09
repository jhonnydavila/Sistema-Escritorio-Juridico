<?php
    require_once('model/caso-model.php');
    require_once('model/abogado-model.php');
    require_once('model/tramite-model.php');
    require_once('model/cliente-model.php');

    $objCaso = new CasoModel();
    $objAbogado = new AbogadoModel();
    $objTramite = new TramiteModel();
    $objCliente = new ClienteModel();

    $dataCasos = $objCaso->consultar_caso_model();
    $dataAbogados = $objAbogado->consultar_abogado_model();
    $dataTramites = $objTramite->consultar_tramites_model();
    $dataClientes = $objCliente->consultar_cliente_model();

    $totalCasos = count($dataCasos);
    $totalAbogados = count($dataAbogados);
    $totalTramites = count($dataTramites);
    $totalClientes = count($dataClientes);

    $clientesNaturales = 0;
    $clientesJuridicos = 0;
    foreach ($dataClientes as $cli) {
        if ($cli['tipoCliente'] == 'Natural') {
            $clientesNaturales++;
        } else if ($cli['tipoCliente'] == 'Juridico') {
            $clientesJuridicos++;
        }
    }

    require_once('view/reportes-view.php');
