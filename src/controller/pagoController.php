<?php
require_once __DIR__ . '/../model/pagoModel.php';

class PagoController extends Pago {
    public function create_pago_controller() {
        $this->codigoPago = trim($_POST['codigoPago'] ?? '');
        $this->codigoCaso = trim($_POST['codigoCaso'] ?? '');
        $this->conceptoPago = trim($_POST['conceptoPago'] ?? '');
        $this->montoPago = trim($_POST['montoPago'] ?? '0');
        $this->metodoPago = trim($_POST['metodoPago'] ?? '');
        $this->fechaPago = trim($_POST['fechaPago'] ?? date('Y-m-d'));
        $this->observacionesPago = trim($_POST['observacionesPago'] ?? '');
        $this->estatusPago = 1;

        if (empty($this->codigoPago) || empty($this->codigoCaso) || empty($this->conceptoPago)) {
            return "<script>alert('Faltan datos obligatorios para registrar el pago.'); history.back();</script>";
        }

        $result = $this->create_pago();
        return $result === 1
            ? "<script>alert('Pago registrado con éxito.'); window.location='../../index.php?pagina=pagoRegistrar';</script>"
            : "<script>alert('No se pudo registrar el pago.'); history.back();</script>";
    }

    public function consultar_pagos_controller() {
        return $this->consultar_pagos();
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $response = new PagoController();
    echo $response->create_pago_controller();
}
