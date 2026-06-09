<?php
    require_once('conexion.php');

    class CasoModel extends Conexion {
        private $conex;
        private $codigoCaso;
        private $codigoExpediente;
        private $codigoCliente;
        private $modalidad;
        private $descripcion;
        private $estatus;
        private $origenExpediente;
        private $numeroExpediente;
        private $codigoArchivador;

        public function __construct(){
            $this->conex = new Conexion();
            $this->conex = $this->conex->Conex();
        }

        public function registrar_caso_model() {
            try {
                $this->conex->beginTransaction();

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
                $execExpediente->execute();

                $this->generar_codigo_caso();
                $sqlCaso = "INSERT INTO tbl_casos (codigoCaso, estatusCaso, modalidadCaso, descripcionCaso, codigoExpediente) VALUES (:codigo, :estatus, :modalidad, :descripcion, :expediente)";
                $execCaso = $this->conex->prepare($sqlCaso);
                $execCaso->bindParam(':codigo', $this->codigoCaso);
                $execCaso->bindParam(':estatus', $this->estatus);
                $execCaso->bindParam(':modalidad', $this->modalidad);
                $execCaso->bindParam(':descripcion', $this->descripcion);
                $execCaso->bindParam(':expediente', $this->codigoExpediente);
                $execCaso->execute();

                $this->conex->commit();
                return true;
            } catch (PDOException $e) {
                if ($this->conex->inTransaction()) {
                    $this->conex->rollBack();
                }
                error_log('Error en registrar_caso_model(): ' . $e->getMessage());
                return false;
            }
        }

        public function consultar_caso_model() {
            try {
                $sql = "SELECT
                            tbl_casos.codigoCaso,
                            tbl_casos.fechaRegistroCaso,
                            tbl_casos.estatusCaso,
                            tbl_casos.modalidadCaso,
                            tbl_casos.descripcionCaso,
                            tbl_casos.codigoExpediente,
                            tbl_expedientes.numeroExpediente,
                            tbl_clientes.codigoCliente,
                            CASE
                                WHEN tbl_clientes.tipoCliente = 'Natural'
                                THEN CONCAT(tbl_clientesnaturales.nombreClienteNatural, ' ', tbl_clientesnaturales.apellidoClienteNatural)
                                ELSE tbl_clientesjuridicos.razonSocialClienteJuridico
                            END AS nombreCliente
                        FROM
                            tbl_casos
                        INNER JOIN
                            tbl_expedientes
                        ON
                            tbl_casos.codigoExpediente = tbl_expedientes.codigoExpediente
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
                        ";
                $consulta = $this->conex->prepare($sql);
                $consulta->execute();
                $datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
                return $datos;
            } catch (PDOException $e) {
                error_log('Error en consultar_caso_model(): ' . $e->getMessage());
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

        private function generar_codigo_caso() {
            $sql = "SELECT codigoCaso FROM tbl_casos ORDER BY codigoCaso DESC LIMIT 1";
            $consulta = $this->conex->prepare($sql);
            $consulta->execute();
            $ultimo = $consulta->fetch(PDO::FETCH_ASSOC);
            if ($ultimo) {
                $partes = explode('-', $ultimo['codigoCaso']);
                $nuevoNumero = (int)$partes[1] + 1;
                $this->codigoCaso = 'CAS-' . str_pad($nuevoNumero, 5, '0', STR_PAD_LEFT);
            } else {
                $this->codigoCaso = 'CAS-00001';
            }
        }

        public function set_CodigoCliente($codigoCliente) {
            $this->codigoCliente = $codigoCliente;
        }
        public function get_CodigoCliente() {
            return $this->codigoCliente;
        }

        public function set_Modalidad($modalidad) {
            $this->modalidad = $modalidad;
        }
        public function get_Modalidad() {
            return $this->modalidad;
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

        public function set_OrigenExpediente($origenExpediente) {
            $this->origenExpediente = $origenExpediente;
        }
        public function get_OrigenExpediente() {
            return $this->origenExpediente;
        }

        public function set_NumeroExpediente($numeroExpediente) {
            $this->numeroExpediente = $numeroExpediente;
        }
        public function get_NumeroExpediente() {
            return $this->numeroExpediente;
        }

        public function set_CodigoArchivador($codigoArchivador) {
            $this->codigoArchivador = $codigoArchivador;
        }
        public function get_CodigoArchivador() {
            return $this->codigoArchivador;
        }
    }
