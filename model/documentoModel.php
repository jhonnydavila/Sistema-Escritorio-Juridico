<?php
require_once __DIR__ . '/conexion.php';

class Documento extends Conexion {
    private $codigoDocumento;
    private $nombreDocumento;
    private $tipoDocumento;
    private $descripcionDocumento;
    private $estatusDocumento;

    public function __construct(){
        $this->conexion = new Conexion();
        $this->conexion = $this->conexion->Conexion();
    }

    public function create_documento(){
        try {
            $registro = "INSERT INTO tbl_documentos(codigoDocumento, nombreDocumento, tipoDocumento, descripcionDocumento, estatusDocumento) VALUES (:codigo, :nombre, :tipo, :descripcion, :estatus)";
            $sql = $this->conexion->prepare($registro);
            $sql->bindParam(':codigo', $this->codigoDocumento);
            $sql->bindParam(':nombre', $this->nombreDocumento);
            $sql->bindParam(':tipo', $this->tipoDocumento);
            $sql->bindParam(':descripcion', $this->descripcionDocumento);
            $sql->bindParam(':estatus', $this->estatusDocumento);
            return $sql->execute() ? 1 : 0;
        } catch (PDOException $e) {
            error_log('Error en create_documento(): ' . $e->getMessage());
            return 0;
        }
    }

    public function consultar_documentos(){
        try {
            $registro = "SELECT * FROM tbl_documentos";
            $consulta = $this->conexion->prepare($registro);
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log('Error en consultar_documentos(): ' . $e->getMessage());
            return [];
        }
    }

    public function create_expediente_documento($codigoDocumento, $identificadorExpediente){
        try {
            $registro = "INSERT INTO tbl_expedientedocumentos(codigoDocumento, identificadorExpediente, fechaAnexoExpedienteDocumento) VALUES (:codigo, :identificador, :fecha)";
            $sql = $this->conexion->prepare($registro);
            $sql->execute([
                ':codigo' => $codigoDocumento,
                ':identificador' => $identificadorExpediente,
                ':fecha' => date('Y-m-d'),
            ]);
            return 1;
        } catch (PDOException $e) {
            error_log('Error en create_expediente_documento(): ' . $e->getMessage());
            return 0;
        }
    }
}
