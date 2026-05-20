<?php
require_once __DIR__ . '/conexion.php';

class Evento extends Conexion {
    private $codigoEvento;
    private $descripcionEvento;
    private $tituloEvento;
    private $estatusEvento;
    private $tipoEvento;
    private $fechaEvento;
    private $codigoCaso;

    public function __construct(){
        $this->conexion = new Conexion();
        $this->conexion = $this->conexion->Conexion();
    }

    public function create_evento(){
        try {
            $registro = "INSERT INTO tbl_eventos(codigoEvento, descripcionEvento, tituloEvento, estatusEvento, tipoEvento, fechaEvento, codigoCaso) VALUES (:codigo, :descripcion, :titulo, :estatus, :tipo, :fecha, :caso)";
            $sql = $this->conexion->prepare($registro);
            $sql->bindParam(':codigo', $this->codigoEvento);
            $sql->bindParam(':descripcion', $this->descripcionEvento);
            $sql->bindParam(':titulo', $this->tituloEvento);
            $sql->bindParam(':estatus', $this->estatusEvento);
            $sql->bindParam(':tipo', $this->tipoEvento);
            $sql->bindParam(':fecha', $this->fechaEvento);
            $sql->bindParam(':caso', $this->codigoCaso);
            return $sql->execute() ? 1 : 0;
        } catch (PDOException $e) {
            error_log('Error en create_evento(): ' . $e->getMessage());
            return 0;
        }
    }

    public function consultar_eventos(){
        try {
            $registro = "SELECT * FROM tbl_eventos";
            $consulta = $this->conexion->prepare($registro);
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log('Error en consultar_eventos(): ' . $e->getMessage());
            return [];
        }
    }
}
