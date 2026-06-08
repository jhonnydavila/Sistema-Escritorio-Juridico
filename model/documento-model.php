<?php
    require_once('conexion.php');

    class DocumentoModel extends Conexion {
        private $conex;
        private $codigo;
        private $nombre;
        private $tipo;
        private $descripcion;
        private $estatus;
        private $codigoCaso;

        public function __construct(){
            $this->conex = new Conexion();
            $this->conex = $this->conex->Conex();
        }

        public function registrar_documento_model() {
            try {
                $this->generar_codigo_documento();

                $registro = "INSERT INTO tbl_documentos (codigoDocumento, nombreDocumento, tipoDocumento, descripcionDocumento, estatusDocumento, codigoCaso) VALUES (:codigo, :nombre, :tipo, :descripcion, :estatus, :caso)";
                $strExec = $this->conex->prepare($registro);
                $strExec->bindParam(':codigo', $this->codigo);
                $strExec->bindParam(':nombre', $this->nombre);
                $strExec->bindParam(':tipo', $this->tipo);
                $strExec->bindParam(':descripcion', $this->descripcion);
                $strExec->bindParam(':estatus', $this->estatus);
                $strExec->bindParam(':caso', $this->codigoCaso);
                return $strExec->execute();
                
            } catch (PDOException $e) {
                error_log('Error en registrar_documento_model(): ' . $e->getMessage());
                return false;
            }
        }

        public function consultar_documento_model() {
            try {
                $registro = "SELECT * FROM tbl_documentos";
                $consulta = $this->conex->prepare($registro);
                $consulta->execute();
                return $consulta->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                error_log('Error en consultar_documento_model(): ' . $e->getMessage());
                return [];
            }
        }

        private function generar_codigo_documento() {
            $sql = "SELECT codigoDocumento FROM tbl_documentos ORDER BY codigoDocumento DESC LIMIT 1";
            $consulta = $this->conex->prepare($sql);
            $consulta->execute();
            $ultimo = $consulta->fetch(PDO::FETCH_ASSOC);
            if ($ultimo) {
                $partes = explode('-', $ultimo['codigoDocumento']);
                $nuevoNumero = (int)$partes[1] + 1;
                $this->codigo = 'DOC-' . str_pad($nuevoNumero, 5, '0', STR_PAD_LEFT);
            } else {
                $this->codigo = 'DOC-00001';
            }
        }

        // --- Getters y Setters ---
        public function set_Codigo($codigo) { 
            $this->codigo = $codigo; 
        }
        public function get_Codigo() { 
            return $this->codigo; 
        }

        public function set_Nombre($nombre) { 
            $this->nombre = $nombre; 
        }
        public function get_Nombre() { 
            return $this->nombre; 
        }

        public function set_Tipo($tipo) { 
            $this->tipo = $tipo; 
        }
        public function get_Tipo() { 
            return $this->tipo; 
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

        public function set_CodigoCaso($caso) { 
            $this->codigoCaso = $caso; 
        }
        public function get_CodigoCaso() { 
            return $this->codigoCaso; 
        }
    }
?>