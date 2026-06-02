<?php
    require_once('conexion.php');

    class HonorarioModel extends Conexion {
        private $codigo;
        private $monto;
        private $estatus;
        private $codigoCaso;

        public function __construct(){
            $this->conexion = new Conexion();
            $this->conexion = $this->conexion->Conexion();
        }

        public function registrar_honorario_model() {
            try {
                $this->generar_codigo_honorario();
                $sql = "INSERT INTO tbl_honorarios (codigoHonorario, montoInicialHonorario, estatusHonorario, codigoCaso) VALUES (:codigo, :monto, :estatus, :caso)";
                
                $strExec = $this->conexion->prepare($sql);
                $strExec->bindParam(':codigo', $this->codigo);
                $strExec->bindParam(':monto', $this->monto);
                $strExec->bindParam(':estatus', $this->estatus);
                $strExec->bindParam(':caso', $this->codigoCaso);
                
                return $strExec->execute();
            } catch (PDOException $e) {
                return false;
            }
        }

        public function consultar_honorarios_model() {
            try {
                $sql = "
                        SELECT 
                            h.codigoHonorario, 
                            h.codigoCaso, 
                            h.fechaAcuerdoHonorario, 
                            h.montoInicialHonorario AS montoTotalPactado, 
                            COALESCE(SUM(p.montoPago), 0) AS montoPagado, 
                            (h.montoInicialHonorario - COALESCE(SUM(p.montoPago), 0)) AS montoRestante, 
                            h.estatusHonorario 
                        FROM 
                            tbl_honorarios h 
                        LEFT JOIN 
                            tbl_honorariopagos p ON h.codigoHonorario = p.codigoHonorario 
                        GROUP BY 
                            h.codigoHonorario, 
                            h.codigoCaso, 
                            h.montoInicialHonorario, 
                            h.estatusHonorario
                        ORDER BY 
                            h.codigoHonorario DESC
                    ";
                $consulta = $this->conexion->prepare($sql);
                $consulta->execute();
                return $consulta->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                return [];
            }
        }

        private function generar_codigo_honorario() {
            $sql = "SELECT codigoHonorario FROM tbl_honorarios ORDER BY codigoHonorario DESC LIMIT 1";
            $consulta = $this->conexion->prepare($sql);
            $consulta->execute();
            $ultimo = $consulta->fetch(PDO::FETCH_ASSOC);
            if ($ultimo) {
                $partes = explode('-', $ultimo['codigoHonorario']);
                $nuevoNumero = (int)$partes[1] + 1;
                $this->codigo = 'HON-' . str_pad($nuevoNumero, 5, '0', STR_PAD_LEFT);
            } else {
                $this->codigo = 'HON-00001';
            }
        }

        public function set_Codigo($codigo) { 
            $this->codigo = $codigo; 
        }
        public function get_Codigo() { 
            return $this->codigo; 
        }

        public function set_Monto($monto) { 
            $this->monto = $monto; 
        }
        public function get_Monto() { 
            return $this->monto; 
        }

        public function set_Estatus($estatus) { 
            $this->estatus = $estatus; 
        }
        public function get_Estatus() { 
            return $this->estatus; 
        }

        public function set_CodigoCaso($codigoCaso) { 
            $this->codigoCaso = $codigoCaso;
        }
        public function get_CodigoCaso() { 
            return $this->codigoCaso; 
        }
    }
?>