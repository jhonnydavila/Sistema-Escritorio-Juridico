<?php
    require_once('conexion.php');

    class CasoModel extends Conexion {
        private $conex;
        private $codigoCaso;
        private $codigoExpediente;
        private $modalidad;
        private $descripcion;
        private $estatus;

        public function __construct(){
            $this->conex = new Conexion();
            $this->conex = $this->conex->Conex();
        }

        public function registrar_caso_model() {
            try {
                $this->generar_codigo_caso();
                $sqlCaso = "INSERT INTO tbl_casos (codigoCaso, estatusCaso, modalidadCaso, descripcionCaso, codigoExpediente) VALUES (:codigo, :estatus, :modalidad, :descripcion, :expediente)";
                $execCaso = $this->conex->prepare($sqlCaso);
                $execCaso->bindParam(':codigo', $this->codigoCaso);
                $execCaso->bindParam(':estatus', $this->estatus);
                $execCaso->bindParam(':modalidad', $this->modalidad);
                $execCaso->bindParam(':descripcion', $this->descripcion);
                $execCaso->bindParam(':expediente', $this->codigoExpediente);
                
                return $execCaso->execute();
            } catch (PDOException $e) {
                error_log('Error en registrar_caso_model(): ' . $e->getMessage());
                return false;
            }
        }

        public function consultar_caso_model() {
            try {
                if (isset($_SESSION['rolUsuario']) && $_SESSION['rolUsuario'] == 'abogado'){
                    $registro = "SELECT
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
                            WHERE 
                                tbl_casos.codigoCaso IN (SELECT codigoCaso FROM tbl_casosabogados WHERE cedulaAbogado = :cedula)
                            ";
                    $consulta = $this->conex->prepare($registro);
                    $consulta->bindParam(':cedula', $_SESSION['cedulaUsuario'], PDO::PARAM_INT);
                } else if (isset($_SESSION['rolUsuario']) && $_SESSION['rolUsuario'] === 'administrador') {
                    $registro = "SELECT
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
                    $consulta = $this->conex->prepare($registro);
                }

                $consulta->execute();
                return $consulta->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                error_log('Error en consultar_caso_model(): ' . $e->getMessage());
                return [];
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

        // Setters y Getters
        public function set_CodigoExpediente($codigoExpediente) { $this->codigoExpediente = $codigoExpediente; }
        public function get_CodigoExpediente() { return $this->codigoExpediente; }

        public function set_Modalidad($modalidad) { $this->modalidad = $modalidad; }
        public function get_Modalidad() { return $this->modalidad; }

        public function set_Descripcion($descripcion) { $this->descripcion = $descripcion; }
        public function get_Descripcion() { return $this->descripcion; }

        public function set_Estatus($estatus) { $this->estatus = $estatus; }
        public function get_Estatus() { return $this->estatus; }
    }
?>