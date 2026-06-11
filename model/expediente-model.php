<?php
    require_once('conexion.php');

    class ExpedienteModel extends Conexion {
        private $conex;
        private $codigoExpediente;
        private $numeroExpediente;
        private $origenExpediente;
        private $codigoCliente;
        private $codigoArchivador;

        public function __construct(){
            $this->conex = new Conexion();
            $this->conex = $this->conex->Conex();
        }

        public function registrar_expediente_model() {
            try {
                $this->generar_codigo_expediente();
                $numero = ($this->numeroExpediente === '' || $this->numeroExpediente === null) ? null : $this->numeroExpediente;
                $archivador = ($this->codigoArchivador === '' || $this->codigoArchivador === null) ? null : $this->codigoArchivador;

                $sqlExpediente = "INSERT INTO tbl_expedientes (codigoExpediente, numeroExpediente, origenExpediente, codigoCliente, codigoArchivador) VALUES (:codigo, :numero, :origen, :cliente, :archivador)";
                $execExpediente = $this->conex->prepare($sqlExpediente);
                $execExpediente->bindParam(':codigo', $this->codigoExpediente);
                $execExpediente->bindParam(':numero', $numero);
                $execExpediente->bindParam(':origen', $this->origenExpediente);
                $execExpediente->bindParam(':cliente', $this->codigoCliente);
                $execExpediente->bindParam(':archivador', $archivador);
                
                if ($execExpediente->execute()) {
                    return $this->codigoExpediente;
                }
                return false;
            } catch (PDOException $e) {
                error_log('Error en registrar_expediente_model(): ' . $e->getMessage());
                return false;
            }
        }

        public function consultar_expedientes_model() {
            try {
                $sql = "SELECT
                            tbl_expedientes.codigoExpediente,
                            tbl_expedientes.numeroExpediente,
                            tbl_expedientes.origenExpediente,
                            tbl_casos.codigoCaso,
                            tbl_expedientes.codigoCliente,
                            tbl_expedientes.codigoArchivador,
                            tbl_archivadores.nombreArchivador,
                            CASE
                                WHEN tbl_clientes.tipoCliente = 'Natural'
                                THEN CONCAT(tbl_clientesnaturales.nombreClienteNatural, ' ', tbl_clientesnaturales.apellidoClienteNatural)
                                ELSE tbl_clientesjuridicos.razonSocialClienteJuridico
                            END AS nombreCliente
                        FROM
                            tbl_expedientes
                        INNER JOIN
                            tbl_clientes
                        ON
                            tbl_expedientes.codigoCliente = tbl_clientes.codigoCliente
                        LEFT JOIN
                            tbl_clientesnaturales
                        ON
                            tbl_clientes.codigoCliente = tbl_clientesnaturales.codigoCliente
                        LEFT JOIN
                            tbl_clientesjuridicos
                        ON
                            tbl_clientes.codigoCliente = tbl_clientesjuridicos.codigoCliente
                        LEFT JOIN
                            tbl_archivadores
                        ON
                            tbl_expedientes.codigoArchivador = tbl_archivadores.codigoArchivador
                        LEFT JOIN
                            tbl_casos
                        ON
                            tbl_expedientes.codigoExpediente = tbl_casos.codigoExpediente
                        ";
                $consulta = $this->conex->prepare($sql);
                $consulta->execute();
                return $consulta->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                error_log('Error en consultar_expediente_model(): ' . $e->getMessage());
                return [];
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
                $this->codigoExpediente = 'EXP-' . str_pad($nuevoNumero, 5, '0', STR_PAD_LEFT);
            } else {
                $this->codigoExpediente = 'EXP-00001';
            }
        }

        // Setters y Getters
        public function set_CodigoCliente($codigoCliente) { $this->codigoCliente = $codigoCliente; }
        public function get_CodigoCliente() { return $this->codigoCliente; }

        public function set_OrigenExpediente($origenExpediente) { $this->origenExpediente = $origenExpediente; }
        public function get_OrigenExpediente() { return $this->origenExpediente; }

        public function set_NumeroExpediente($numeroExpediente) { $this->numeroExpediente = $numeroExpediente; }
        public function get_NumeroExpediente() { return $this->numeroExpediente; }

        public function set_CodigoArchivador($codigoArchivador) { $this->codigoArchivador = $codigoArchivador; }
        public function get_CodigoArchivador() { return $this->codigoArchivador; }
    }
?>