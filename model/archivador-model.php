<?php
    require_once('conexion.php');
    
    class ArchivadorModel extends Conexion {
        private $numero;
        private $nombre;
        private $descripcion;
        private $estatus;

        public function __construct(){
            $this->conexion = new Conexion();
            $this->conexion = $this->conexion->Conexion();
        }

        public function registrar_archivador_model() {
            try {
                $registro = "INSERT INTO tbl_archivadores (numeroArchivador, nombreArchivador, descripcionArchivador, estatusArchivador) VALUES (:numero, :nombre, :descripcion, :estatus)";
                $strExec = $this->conexion->prepare($registro);
                $strExec->bindParam(':numero', $this->numero);
                $strExec->bindParam(':nombre', $this->nombre);
                $strExec->bindParam(':descripcion', $this->descripcion);
                $strExec->bindParam(':estatus', $this->estatus);
                return $strExec->execute();
            } catch (PDOException $e) {
                error_log('Error en registrar_archivador_model(): ' . $e->getMessage());
                exit();
            }
        }

        public function consultar_archivador_model() {
            try {
                $registro = "SELECT * FROM tbl_archivadores";
                $consulta = $this->conexion->prepare($registro);
                $consulta->execute();
                $datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
                return $datos;
            } catch (PDOException $e) {
                error_log('Error en consultar_archivador_model(): ' . $e->getMessage());
                exit();
            }
        }

        public function set_Numero($numero) { 
            $this->numero = $numero; 
        }
        public function get_Numero() { 
            return $this->numero; 
        }

        public function set_Nombre($nombre) { 
            $this->nombre = $nombre; 
        }
        public function get_Nombre() { 
            return $this->nombre; 
        }

        public function set_Descripcion($descripcion) { 
            $this->descripcion = $descripcion; 
        }
        public function get_Descripcion() { 
            return $this->descripcion; 
        }

        public function set_Estatus($estatus) { 
            $this->estatus = $estatus; 
        }
        public function get_Estatus() { 
            return $this->estatus; 
        }
    }