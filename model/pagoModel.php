<?php
require_once __DIR__ . '/conexion.php';

class Pago extends Conexion {
    private $codigoPago;
    private $codigoCaso;
    private $estatusPago;
    private $observacionesPago;
    private $conceptoPago;
    private $montoPago;
    private $metodoPago;
    private $fechaPago;

    public function __construct(){
        $this->conexion = new Conexion();
        $this->conexion = $this->conexion->Conexion();
    }

    public function create_pago(){
        try {
            $registro = "INSERT INTO tbl_casopagos(codigoPago, codigoCaso, estatusPago, observacionesPago, conceptoPago, montoPago, metodoPago, fechaPago) VALUES (:codigo, :caso, :estatus, :observaciones, :concepto, :monto, :metodo, :fecha)";
            $sql = $this->conexion->prepare($registro);
            $sql->bindParam(':codigo', $this->codigoPago);
            $sql->bindParam(':caso', $this->codigoCaso);
            $sql->bindParam(':estatus', $this->estatusPago);
            $sql->bindParam(':observaciones', $this->observacionesPago);
            $sql->bindParam(':concepto', $this->conceptoPago);
            $sql->bindParam(':monto', $this->montoPago);
            $sql->bindParam(':metodo', $this->metodoPago);
            $sql->bindParam(':fecha', $this->fechaPago);
            return $sql->execute() ? 1 : 0;
        } catch (PDOException $e) {
            error_log('Error en create_pago(): ' . $e->getMessage());
            return 0;
        }
    }

    public function consultar_pagos(){
        try {
            $registro = "SELECT * FROM tbl_casopagos";
            $consulta = $this->conexion->prepare($registro);
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log('Error en consultar_pagos(): ' . $e->getMessage());
            return [];
        }
    }
}
