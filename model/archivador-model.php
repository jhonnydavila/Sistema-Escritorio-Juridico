<?php
require_once('model/conexion.php');

class ArchivadorModel extends Conexion {
    
    // 1. Propiedades para usar con Setters
    private $numero;
    private $descripcion;
    private $estatus;

    // Métodos Setter
    public function set_Numero($numero) { $this->numero = $numero; }
    public function set_Descripcion($descripcion) { $this->descripcion = $descripcion; }
    public function set_Estatus($estatus) { $this->estatus = $estatus; }

    // 2. MÉTODO PARA REGISTRAR
    public function registrar_archivador_model() {
        try {
            // Consulta SQL corregida para incluir el parámetro :estatus
            $sql = "INSERT INTO tbl_archivadores (numeroArchivador, descripcionArchivador, estatusArchivador) 
                    VALUES (:numero, :descripcion, :estatus)";
            
            $stmt = $this->Conexion()->prepare($sql);
            
            // Usamos las propiedades de la clase que llenamos con los setters
            $stmt->bindParam(':numero', $this->numero, PDO::PARAM_STR);
            $stmt->bindParam(':descripcion', $this->descripcion, PDO::PARAM_STR);
            $stmt->bindParam(':estatus', $this->estatus, PDO::PARAM_STR);
            
            return $stmt->execute();
        } catch (Exception $e) {
            // Si quieres ver el error real, puedes comentar esto y poner: echo $e->getMessage();
            return false;
        }
    }

    // 3. MÉTODO PARA CONSULTAR
    public function consultar_archivador_model() {
        try {
            $sql = "SELECT numeroArchivador, descripcionArchivador, estatusArchivador FROM tbl_archivadores";
            $stmt = $this->Conexion()->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            return array();
        }
    }
}
?>