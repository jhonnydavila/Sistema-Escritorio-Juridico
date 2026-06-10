<?php
    require_once('conexion.php');

    class RepresentanteModel extends Conexion {
        private $conex;
        private $cedula;
        private $nacionalidad;
        private $nombre;
        private $apellido;
        private $telefono;
        private $estatus;

        public function __construct(){
            $this->conex = new Conexion();
            $this->conex = $this->conex->Conex();
        }

        public function registrar_representante_model() {
            try {
                $registro = "INSERT INTO tbl_representantes (cedulaRepresentante, nacionalidadRepresentante, nombreRepresentante, apellidoRepresentante, telefonoRepresentante, estatusRepresentante) VALUES (:cedula, :nacionalidad, :nombre, :apellido, :telefono, :estatus)";
                $strExec = $this->conex->prepare($registro);
                $strExec->bindParam(':cedula', $this->cedula);
                $strExec->bindParam(':nacionalidad', $this->nacionalidad);
                $strExec->bindParam(':nombre', $this->nombre);
                $strExec->bindParam(':apellido', $this->apellido);
                $strExec->bindParam(':telefono', $this->telefono);
                $strExec->bindParam(':estatus', $this->estatus);
                return $strExec->execute();
            } catch (PDOException $e) {
                error_log('Error en registrar_representante_model(): ' . $e->getMessage());
                return false;
            }
        }

        public function consultar_representantes_model() {
            try {
                $registro = "SELECT
                                tbl_representantes.*,
                                COUNT(tbl_representantesjuridicos.codigoCliente) AS totalClientes
                            FROM
                                tbl_representantes
                            LEFT JOIN
                                tbl_representantesjuridicos
                            ON
                                tbl_representantes.cedulaRepresentante = tbl_representantesjuridicos.cedulaRepresentante
                            GROUP BY
                                tbl_representantes.cedulaRepresentante,
                                tbl_representantes.nacionalidadRepresentante,
                                tbl_representantes.nombreRepresentante,
                                tbl_representantes.apellidoRepresentante,
                                tbl_representantes.telefonoRepresentante
                            ";
                $consulta = $this->conex->prepare($registro);
                $consulta->execute();
                $datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
                return $datos;
            } catch (PDOException $e) {
                error_log('Error en consultar_representante_model(): ' . $e->getMessage());
                return [];
            }
        }

        public function set_Cedula($cedula) {
            $this->cedula = $cedula;
        }
        public function get_Cedula() {
            return $this->cedula;
        }

        public function set_Nacionalidad($nacionalidad) {
            $this->nacionalidad = $nacionalidad;
        }
        public function get_Nacionalidad() {
            return $this->nacionalidad;
        }

        public function set_Nombre($nombre) {
            $this->nombre = $nombre;
        }
        public function get_Nombre() {
            return $this->nombre;
        }

        public function set_Apellido($apellido) {
            $this->apellido = $apellido;
        }
        public function get_Apellido() {
            return $this->apellido;
        }

        public function set_Telefono($telefono) {
            $this->telefono = $telefono;
        }
        public function get_Telefono() {
            return $this->telefono;
        }

        public function set_Estatus($estatus) {
            $this->estatus = $estatus;
        }
        public function get_Estatus() {
            return $this->estatus;
        }
    }
