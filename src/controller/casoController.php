<?php
require_once __DIR__ . '/../model/casoModel.php';

class CasoController extends Caso {
    public function create_caso_controller() {
        $this->codigoCaso = trim($_POST['codigoCaso'] ?? '');
        $this->codigoCliente = trim($_POST['codigoCliente'] ?? '');
        $this->fechaInicioCaso = trim($_POST['fechaInicioCaso'] ?? date('Y-m-d'));
        $this->fechaFinCaso = trim($_POST['fechaFinCaso'] ?? null);
        $this->cotizacionInicialCaso = trim($_POST['cotizacionInicialCaso'] ?? '0');
        $this->estatusCaso = trim($_POST['estatusCaso'] ?? 'Abierto');
        $this->tipoCaso = trim($_POST['tipoCaso'] ?? 'General');
        $this->descripcionCaso = trim($_POST['descripcionCaso'] ?? '');

        if (empty($this->codigoCaso) || empty($this->codigoCliente) || empty($this->descripcionCaso)) {
            return "<script>alert('Faltan datos obligatorios para registrar el caso.'); history.back();</script>";
        }

        $result = $this->create_caso();
        return $result === 1
            ? "<script>alert('Caso registrado con éxito.'); window.location='../../index.php?pagina=casosRegistrar';</script>"
            : "<script>alert('No se pudo registrar el caso.'); history.back();</script>";
    }

    public function consultar_casos_controller() {
        return $this->consultar_casos();
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $response = new CasoController();
    echo $response->create_caso_controller();
}
