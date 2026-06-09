<?php
    require_once('conexion.php');

    class ExpedienteModel extends Conexion {
        private $conex;

        public function __construct(){
            $this->conex = new Conexion();
            $this->conex = $this->conex->Conex();
        }

        public function consultar_expediente_model() {
            try {
                $sql = "SELECT
                            tbl_expedientes.codigoExpediente,
                            tbl_expedientes.numeroExpediente,
                            tbl_expedientes.origenExpediente,
                            tbl_expedientes.fechaAperturaExpediente,
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
                        ";
                $consulta = $this->conex->prepare($sql);
                $consulta->execute();
                return $consulta->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                error_log('Error en consultar_expediente_model(): ' . $e->getMessage());
                return [];
            }
        }
    }
