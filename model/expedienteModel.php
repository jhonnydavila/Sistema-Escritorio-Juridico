<?php
require_once __DIR__ . '/conexion.php';

class Expediente extends Conexion {
    private $identificadorExpediente;
    private $numeroExpediente;
    private $descripcionExpediente;
    private $fechaAperturaExpediente;
    private $accionLegalExpediente;
    private $numeroArchivador;
    private $codigoCaso;

    public function __construct(){
        $this->conexion = new Conexion();
        $this->conexion = $this->conexion->Conexion();
    }

    public function create_expediente(){
        try {
            $registro = "INSERT INTO tbl_expedientes(identificadorExpediente, numeroExpediente, descripcionExpediente, fechaAperturaExpediente, accionLegalExpediente, numeroArchivador, codigoCaso) VALUES (:id, :numero, :descripcion, :fecha, :accion, :archivador, :caso)";
            $sql = $this->conexion->prepare($registro);
            $sql->bindParam(':id', $this->identificadorExpediente);
            $sql->bindParam(':numero', $this->numeroExpediente);
            $sql->bindParam(':descripcion', $this->descripcionExpediente);
            $sql->bindParam(':fecha', $this->fechaAperturaExpediente);
            $sql->bindParam(':accion', $this->accionLegalExpediente);
            $sql->bindParam(':archivador', $this->numeroArchivador);
            $sql->bindParam(':caso', $this->codigoCaso);
            return $sql->execute() ? 1 : 0;
        } catch (PDOException $e) {
            error_log('Error en create_expediente(): ' . $e->getMessage());
            return 0;
        }
    }

    public function consultar_expedientes(){
        try {
            $registro = "SELECT * FROM tbl_expedientes";
            $consulta = $this->conexion->prepare($registro);
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log('Error en consultar_expedientes(): ' . $e->getMessage());
            return [];
        }
    }
}
