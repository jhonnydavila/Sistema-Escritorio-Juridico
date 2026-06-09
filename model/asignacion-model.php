<?php
    require_once('conexion.php');

    class AsignacionModel extends Conexion {
        private $conex;
        private $cedulaAbogado;
        private $codigoCaso;
        private $fechaAsignacion;
        private $estatus;

        public function __construct(){
            $this->conex = new Conexion();
            $this->conex = $this->conex->Conex();
        }

        public function registrar_asignacion_model() {
            try {
                $this->fechaAsignacion = date('Y-m-d');
                $registro = "INSERT INTO tbl_casosabogados (cedulaAbogado, codigoCaso, fechaAsignacionCasoAbogado, estatusAsignacionCasoAbogado) VALUES (:cedula, :caso, :fecha, :estatus)";
                $strExec = $this->conex->prepare($registro);
                $strExec->bindParam(':cedula', $this->cedulaAbogado);
                $strExec->bindParam(':caso', $this->codigoCaso);
                $strExec->bindParam(':fecha', $this->fechaAsignacion);
                $strExec->bindParam(':estatus', $this->estatus);
                return $strExec->execute();
            } catch (PDOException $e) {
                error_log('Error en registrar_asignacion_model(): ' . $e->getMessage());
                return false;
            }
        }

        public function consultar_asignacion_model() {
            try {
                $sql = "SELECT
                            tbl_casosabogados.codigoCaso,
                            tbl_casosabogados.cedulaAbogado,
                            tbl_casosabogados.fechaAsignacionCasoAbogado,
                            tbl_casosabogados.fechaCierreCasoAbogado,
                            tbl_casosabogados.estatusAsignacionCasoAbogado,
                            CONCAT(tbl_abogados.nombreAbogado, ' ', tbl_abogados.apellidoAbogado) AS nombreAbogado,
                            tbl_casos.descripcionCaso,
                            tbl_casos.modalidadCaso
                        FROM
                            tbl_casosabogados
                        INNER JOIN
                            tbl_abogados
                        ON
                            tbl_casosabogados.cedulaAbogado = tbl_abogados.cedulaAbogado
                        INNER JOIN
                            tbl_casos
                        ON
                            tbl_casosabogados.codigoCaso = tbl_casos.codigoCaso
                        ";
                $consulta = $this->conex->prepare($sql);
                $consulta->execute();
                return $consulta->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                error_log('Error en consultar_asignacion_model(): ' . $e->getMessage());
                return [];
            }
        }

        public function set_CedulaAbogado($cedulaAbogado) {
            $this->cedulaAbogado = $cedulaAbogado;
        }
        public function get_CedulaAbogado() {
            return $this->cedulaAbogado;
        }

        public function set_CodigoCaso($codigoCaso) {
            $this->codigoCaso = $codigoCaso;
        }
        public function get_CodigoCaso() {
            return $this->codigoCaso;
        }

        public function set_Estatus($estatus) {
            $this->estatus = $estatus;
        }
        public function get_Estatus() {
            return $this->estatus;
        }
    }
