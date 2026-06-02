<?php
    require_once('conexion.php');

    class PagoModel extends Conexion {
        private $codigo;
        private $metodo;
        private $estatus;
        private $monto;
        private $concepto;
        private $observaciones;
        private $codigoHonorario;

        public function __construct(){
            $this->conexion = new Conexion();
            $this->conexion = $this->conexion->Conexion();
        }

        public function registrar_pago_model() {
            try {
                $this->generar_codigo_pago();

                $registro = "INSERT INTO tbl_honorariopagos (codigoPago, conceptoPago, metodoPago, montoPago, observacionesPago, estatusPago, codigoHonorario) VALUES (:codigoPago, :concepto, :metodo, :monto, :observaciones, :estatus, :codigoHonorario)";
                $strExec = $this->conexion->prepare($registro);
                $strExec->bindParam(':codigoPago', $this->codigo);
                $strExec->bindParam(':concepto', $this->concepto);
                $strExec->bindParam(':monto', $this->monto);
                $strExec->bindParam(':metodo', $this->metodo);
                $strExec->bindParam(':observaciones', $this->observaciones);
                $strExec->bindParam(':estatus', $this->estatus);
                $strExec->bindParam(':codigoHonorario', $this->codigoHonorario);
                return $strExec->execute();
            } catch (PDOException $e) {
                return false;
            }
        }

        public function consultar_pago_model() {
            try {
                $sql = "SELECT * FROM tbl_honorariopagos";
                $consulta = $this->conexion->prepare($sql);
                $consulta->execute();
                return $consulta->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                return [];
            }
        }

        private function generar_codigo_pago() {
            $sql = "SELECT codigoPago FROM tbl_honorariopagos ORDER BY codigoPago DESC LIMIT 1";
            $consulta = $this->conexion->prepare($sql);
            $consulta->execute();
            $ultimo = $consulta->fetch(PDO::FETCH_ASSOC);
            if ($ultimo) {
                $partes = explode('-', $ultimo['codigoPago']);
                $nuevoNumero = (int)$partes[1] + 1;
                $this->codigo = 'PAG-' . str_pad($nuevoNumero, 5, '0', STR_PAD_LEFT);
            } else {
                $this->codigo = 'PAG-00001';
            }
        }
        
        public function set_Codigo($codigoPago) { 
            $this->codigo = $codigoPago; 
        }
        public function get_Codigo() { 
            return $this->codigo; 
        }

        public function set_CodigoHonorario($codigoHonorario) { 
            $this->codigoHonorario = $codigoHonorario; 
        }
        public function get_CodigoHonorario() { 
            return $this->codigoHonorario; 
        }

        public function set_Metodo($metodoPago) { 
            $this->metodo = $metodoPago; 
        }
        public function get_Metodo() { 
            return $this->metodo; 
        }

        public function set_Estatus($estatus) { 
            $this->estatus = $estatus;
        }
        public function get_Estatus() { 
            return $this->estatus; 
        }

        public function set_Monto($monto) { 
            $this->monto = $monto; 
        }
        public function get_Monto() { 
            return $this->monto; 
        }

        public function set_Concepto($concepto) { 
            $this->concepto = $concepto; 
        }
        public function get_Concepto() { 
            return $this->concepto; 
        }

        public function set_Observaciones($observaciones) { 
            $this->observaciones = $observaciones; 
        }
        public function get_Observaciones() { 
            return $this->observaciones; 
        }
    }