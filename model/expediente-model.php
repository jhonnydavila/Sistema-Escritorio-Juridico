<?php
    require_once('conexion.php');

    class ExpedienteModel extends Conexion {
        private $conex;
        private $codigo;
        private $numero;
        private $origen;
        private $codigoCliente;
        private $codigoArchivador;

        public function __construct(){
            $this->conex = new Conexion();
            $this->conex = $this->conex->Conex();
        }

        public function registrar_expediente_model() {
            try {
                $this->generar_codigo_expediente();

                $registro = "INSERT INTO tbl_expedientes (codigoExpediente, numeroExpediente, codigoCliente, codigoArchivador) VALUES (:codigo, :numero, :origen, :caso, :archivador)";
                $strExec = $this->conex->prepare($registro);
                $strExec->bindParam(':codigo', $this->codigo);
                $strExec->bindParam(':numero', $this->numero);
                $strExec->bindParam(':origen', $this->origen);
                $strExec->bindParam(':cliente', $this->codigoCliente);
                $strExec->bindParam(':archivador', $this->codigoArchivador);
                return $strExec->execute();
            } catch (PDOException $e) {
                error_log('Error en registrar_expediente_model(): ' . $e->getMessage());
                exit();
            }
        }

        public function  consultar_expediente_model() {
            try {
                $registro = "SELECT * FROM tbl_expedientes";
                $consulta = $this->conex->prepare($registro);
                $consulta->execute();
                $datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
                return $datos;
            } catch (PDOException $e) {
                error_log('Error en consultar_expediente_model(): ' . $e->getMessage());
                exit();
            }
        }

        private function generar_codigo_expediente() {
            $sql = "SELECT codigoExpediente FROM tbl_expedientes ORDER BY codigoExpediente DESC LIMIT 1";
            $consulta = $this->conex->prepare($sql);
            $consulta->execute();
            $ultimo = $consulta->fetch(PDO::FETCH_ASSOC);
            if ($ultimo) {
                $partes = explode('-', $ultimo['codigoExpediente']);
                $nuevoNumero = (int)$partes[1] + 1;
                $this->codigo = 'EXP-' . str_pad($nuevoNumero, 5, '0', STR_PAD_LEFT);
            } else {
                $this->codigo = 'EXP-00001';
            }
        }

        public function set_Codigo($codigo) { 
            $this->codigo = $codigo; 
        }
        public function get_Codigo() { 
            return $this->codigo; 
        }

        public function set_Origen($origen) { 
            $this->origen = $origen; 
        }
        public function get_Origen() { 
            return $this->origen; 
        }

        public function set_CodigoCliente($codigoCliente) { 
            $this->codigoCliente = $codigoCliente; 
        }
        public function get_CodigoCliente() { 
            return $this->codigoCliente; 
        }

        public function set_CodigoArchivador($codigoArchivador) { 
            $this->codigoArchivador = $codigoArchivador; 
        }
        public function get_CodigoArchivador() { 
            return $this->codigoArchivador; 
        }
    }