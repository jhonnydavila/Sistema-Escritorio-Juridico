<?php
    require_once('conexion.php');
    
    class HonorarioModel extends Conexion {
        private $conex;
        private $codigo;
        private $monto;
        private $estatus;
        private $codigoCaso;

        public function __construct(){
            $this->conex = new Conexion();
            $this->conex = $this->conex->Conex();
        }

        public function registrar_honorario_model() {
            try {
                $this->generar_codigo_honorario();
                $registro = "INSERT INTO tbl_honorarios (codigoHonorario, montoInicialHonorario, estatusHonorario, codigoCaso) VALUES (:codigo, :monto, :estatus, :caso)";
                
                $strExec = $this->conex->prepare($registro);
                $strExec->bindParam(':codigo', $this->codigo);
                $strExec->bindParam(':monto', $this->monto);
                $strExec->bindParam(':estatus', $this->estatus);
                $strExec->bindParam(':caso', $this->codigoCaso);
                
                return $strExec->execute();
            } catch (PDOException $e) {
                error_log('Error en registrar_honorario_model(): ' . $e->getMessage());
                return false;
            }
        }

        public function consultar_honorarios_model() {
            try {
                if (isset($_SESSION['rolUsuario']) && $_SESSION['rolUsuario'] === 'abogado') {
                    $registro = "SELECT 
                                honorario.codigoHonorario, 
                                honorario.codigoCaso, 
                                honorario.montoInicialHonorario, 
                                honorario.fechaAcuerdoHonorario, 
                                honorario.estatusHonorario,
                                COALESCE(SUM(pago.montoPago), 0) AS montoPagado, 
                                (honorario.montoInicialHonorario - COALESCE(SUM(pago.montoPago), 0)) AS montoRestante
                            FROM 
                                tbl_honorarios honorario 
                            LEFT JOIN 
                                tbl_honorariopagos pago 
                            ON 
                                honorario.codigoHonorario = pago.codigoHonorario 
                            WHERE 
                                honorario.codigoCaso IN 
                                    (SELECT codigoCaso FROM tbl_casosabogados WHERE cedulaAbogado = :cedula)
                            GROUP BY 
                                honorario.codigoHonorario, 
                                honorario.codigoCaso, 
                                honorario.montoInicialHonorario, 
                                honorario.fechaAcuerdoHonorario, 
                                honorario.estatusHonorario
                        ";
                    $consulta = $this->conex->prepare($registro);

                    $consulta->bindParam(':cedula', $_SESSION['cedulaUsuario'], PDO::PARAM_INT);
                } else if (isset($_SESSION['rolUsuario']) && $_SESSION['rolUsuario'] === 'administrador') {
                    $registro = "SELECT 
                                honorario.codigoHonorario, 
                                honorario.codigoCaso, 
                                honorario.montoInicialHonorario, 
                                honorario.fechaAcuerdoHonorario, 
                                honorario.estatusHonorario,
                                COALESCE(SUM(pago.montoPago), 0) AS montoPagado, 
                                (honorario.montoInicialHonorario - COALESCE(SUM(pago.montoPago), 0)) AS montoRestante
                            FROM 
                                tbl_honorarios honorario 
                            LEFT JOIN 
                                tbl_honorariopagos pago 
                            ON 
                                honorario.codigoHonorario = pago.codigoHonorario 
                            GROUP BY 
                                honorario.codigoHonorario, 
                                honorario.codigoCaso, 
                                honorario.montoInicialHonorario, 
                                honorario.fechaAcuerdoHonorario, 
                                honorario.estatusHonorario
                            ";
                    $consulta = $this->conex->prepare($registro);
                }
                
                $consulta->execute();
                return $consulta->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                error_log('Error en consultar_honorario_model(): ' . $e->getMessage());
                return [];
            }
        }

        private function generar_codigo_honorario() {
            $registro = "SELECT codigoHonorario FROM tbl_honorarios ORDER BY codigoHonorario DESC LIMIT 1";
            $consulta = $this->conex->prepare($registro);
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