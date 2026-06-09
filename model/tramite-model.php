<?php
    require_once('conexion.php');
    
    class TramiteModel extends Conexion {
        private $conex;
        private $codigo;
        private $nombre;
        private $montoBase;
        private $descripcion;
        private $estatus;

        public function __construct(){
            $this->conex = new Conexion();
            $this->conex = $this->conex->Conex();
        }

        public function registrar_tramite_model() {
            try {
                $this->generar_codigo_tramite();
                $registro = "INSERT INTO tbl_tramites (codigoTramite, nombreTramite, montoBaseTramite, descripcionTramite, estatusTramite) VALUES (:codigo, :nombre, :monto, :descripcion, :estatus)";
                
                $strExec = $this->conex->prepare($registro);
                $strExec->bindParam(':codigo', $this->codigo);
                $strExec->bindParam(':nombre', $this->nombre);
                $strExec->bindParam(':monto', $this->montoBase);
                $strExec->bindParam(':descripcion', $this->descripcion);
                $strExec->bindParam(':estatus', $this->estatus);
                
                return $strExec->execute();
            } catch (PDOException $e) {
                error_log('Error en registrar_tramite_model(): ' . $e->getMessage());
                return false;
            }
        }

        public function consultar_tramites_model() {
            try {
                $registro = "SELECT * FROM tbl_tramites tramite ";
                $consulta = $this->conex->prepare($registro);
                $consulta->execute();
                return $consulta->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                error_log('Error en consultar_tramites_model(): ' . $e->getMessage());
                return [];
            }
        }

        private function generar_codigo_tramite() {
            $registro = "SELECT codigoTramite FROM tbl_tramites WHERE codigoTramite LIKE 'TRA-%' ORDER BY codigoTramite DESC LIMIT 1";
            $consulta = $this->conex->prepare($registro);
            $consulta->execute();
            $ultimo = $consulta->fetch(PDO::FETCH_ASSOC);
            if ($ultimo) {
                $partes = explode('-', $ultimo['codigoTramite']);
                $nuevoNumero = (int)$partes[1] + 1;
                $this->codigo = 'TRA-' . str_pad($nuevoNumero, 5, '0', STR_PAD_LEFT);
            } else {
                $this->codigo = 'TRA-00001';
            }
        }

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

        public function set_MontoBase($montoBase) { 
            $this->montoBase = $montoBase; 
        }
        public function get_MontoBase() { 
            return $this->montoBase; 
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