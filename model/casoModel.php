<?php
require_once __DIR__ . '/conexion.php';

class Caso extends Conexion {
    private $codigoCaso;
    private $fechaFinCaso;
    private $fechaInicioCaso;
    private $cotizacionInicialCaso;
    private $estatusCaso;
    private $tipoCaso;
    private $descripcionCaso;
    private $codigoCliente;

    public function __construct(){
        $this->conexion = new Conexion();
        $this->conexion = $this->conexion->Conexion();
    }

    public function create_caso(){
        try {
            $registro = "INSERT INTO tbl_casos(codigoCaso, fechaFinCaso, fechaInicioCaso, cotizacionInicialCaso, estatusCaso, tipoCaso, descripcionCaso, codigoCliente) VALUES (:codigo, :fin, :inicio, :cotizacion, :estatus, :tipo, :descripcion, :cliente)";
            $sql = $this->conexion->prepare($registro);
            $sql->bindParam(':codigo', $this->codigoCaso);
            $sql->bindParam(':fin', $this->fechaFinCaso);
            $sql->bindParam(':inicio', $this->fechaInicioCaso);
            $sql->bindParam(':cotizacion', $this->cotizacionInicialCaso);
            $sql->bindParam(':estatus', $this->estatusCaso);
            $sql->bindParam(':tipo', $this->tipoCaso);
            $sql->bindParam(':descripcion', $this->descripcionCaso);
            $sql->bindParam(':cliente', $this->codigoCliente);
            return $sql->execute() ? 1 : 0;
        } catch (PDOException $e) {
            error_log('Error en create_caso(): ' . $e->getMessage());
            return 0;
        }
    }

    public function consultar_casos(){
        try {
            $registro = "SELECT * FROM tbl_casos";
            $consulta = $this->conexion->prepare($registro);
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log('Error en consultar_casos(): ' . $e->getMessage());
            return [];
        }
    }
}
