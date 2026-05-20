<?php
require_once __DIR__ . '/conexion.php';

class Archivador extends Conexion {
    private $numeroArchivador;
    private $descripcionArchivador;
    private $estatusArchivador;

    public function __construct(){
        $this->conexion = new Conexion();
        $this->conexion = $this->conexion->Conexion();
    }

    public function create_archivador(){
        try {
            $registro = "INSERT INTO tbl_archivadores(numeroArchivador, descripcionArchivador, estatusArchivador) VALUES (:numero, :descripcion, :estatus)";
            $sql = $this->conexion->prepare($registro);
            $sql->bindParam(':numero', $this->numeroArchivador);
            $sql->bindParam(':descripcion', $this->descripcionArchivador);
            $sql->bindParam(':estatus', $this->estatusArchivador);
            return $sql->execute() ? 1 : 0;
        } catch (PDOException $e) {
            error_log('Error en create_archivador(): ' . $e->getMessage());
            return 0;
        }
    }

    public function consultar_archivadores(){
        try {
            $registro = "SELECT * FROM tbl_archivadores";
            $consulta = $this->conexion->prepare($registro);
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log('Error en consultar_archivadores(): ' . $e->getMessage());
            return [];
        }
    }
}
