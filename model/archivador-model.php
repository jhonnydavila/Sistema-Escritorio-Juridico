<?php
    require_once('model/conexion.php');
    
    class ArchivadorModel extends Conexion {
        
        // 1. Propiedades para usar con Setters
        private $numero;
        private $descripcion;
        private $estatus;

        // 2. MÉTODO PARA REGISTRAR
        public function registrar_archivador_model() {
            try {
                // Consulta SQL corregida para incluir el parámetro :estatus
                $registro = "INSERT INTO tbl_archivadores (numeroArchivador, descripcionArchivador, estatusArchivador) VALUES (:numero, :descripcion, :estatus)";
                
                $strExec = $this->Conexion()->prepare($registro);
                
                // Usamos las propiedades de la clase que llenamos con los setters
                $strExec->bindParam(':numero', $this->numero);
                $strExec->bindParam(':descripcion', $this->descripcion);
                $strExec->bindParam(':estatus', $this->estatus);
                
                return $strExec->execute();
            } catch (Exception $e) {
                    error_log('Error en registrar_archivador_model(): ' . $e->getMessage());
                    exit();
            }
        }

        // 3. MÉTODO PARA CONSULTAR
        public function consultar_archivador_model() {
            try {
                $registro = "SELECT numeroArchivador, descripcionArchivador, estatusArchivador FROM tbl_archivadores";
                $strExec = $this->Conexion()->prepare($registro);
                $strExec->execute();
                return $strExec->fetchAll(PDO::FETCH_ASSOC);
            } catch (Exception $e) {
                return array();
            }
        }

        // Métodos Setter
        public function set_Numero($numero) {
            $this->numero = $numero; 
        }
        public function set_Descripcion($descripcion) {
            $this->descripcion = $descripcion; 
        }
        public function set_Estatus($estatus) { 
            $this->estatus = $estatus; 
        }
    }
?>