<?php
    require_once('conexion.php');

    class AbogadoModel extends Conexion {
        private $conex;
        private $nombre;
        private $apellido;
        private $cedula;
        private $direccion;
        private $telefono;
        private $nacionalidad;
        private $correo;
        private $estatus;

        public function __construct(){
            $this->conex = new Conexion();
            $this->conex = $this->conex->Conex();
        }

        public function registrar_abogado_model() {
            try {
                $registro = "INSERT INTO tbl_abogados (nombreAbogado, apellidoAbogado, cedulaAbogado, direccionAbogado, telefonoAbogado, nacionalidadAbogado, correoAbogado, estatusAbogado) VALUES (:nombre, :apellido, :cedula, :direccion, :telefono, :nacionalidad, :correo, :estatus)";
                $strExec = $this->conex->prepare($registro);
                $strExec->bindParam(':nombre', $this->nombre);
                $strExec->bindParam(':apellido', $this->apellido);
                $strExec->bindParam(':cedula', $this->cedula);
                $strExec->bindParam(':direccion', $this->direccion);
                $strExec->bindParam(':telefono', $this->telefono);
                $strExec->bindParam(':nacionalidad', $this->nacionalidad);
                $strExec->bindParam(':correo', $this->correo);
                $strExec->bindParam(':estatus', $this->estatus);
                return $strExec->execute();
                
            } catch (PDOException $e) {
                error_log('Error en registrar_abogado_model(): ' . $e->getMessage());
                return false;
            }
        }

        public function consultar_abogado_model() {
            try {
                $registro = "SELECT 
                                tbl_abogados.cedulaAbogado, 
                                tbl_abogados.nombreAbogado, 
                                tbl_abogados.apellidoAbogado, 
                                tbl_abogados.direccionAbogado, 
                                tbl_abogados.telefonoAbogado, 
                                tbl_abogados.nacionalidadAbogado, 
                                tbl_abogados.correoAbogado, 
                                tbl_abogados.estatusAbogado, 
                                COUNT(tbl_casosabogados.codigoCaso) AS totalCasos 
                            FROM 
                                tbl_abogados 
                            LEFT JOIN 
                                tbl_casosabogados 
                            ON 
                                tbl_abogados.cedulaAbogado = tbl_casosabogados.cedulaAbogado
                            GROUP BY 
                                tbl_abogados.cedulaAbogado, 
                                tbl_abogados.nombreAbogado, 
                                tbl_abogados.apellidoAbogado, 
                                tbl_abogados.direccionAbogado, 
                                tbl_abogados.telefonoAbogado, 
                                tbl_abogados.nacionalidadAbogado, 
                                tbl_abogados.correoAbogado, 
                                tbl_abogados.estatusAbogado
                            ";
                $consulta = $this->conex->prepare($registro);
                $consulta->execute();
                $datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
                return $datos;
            } catch (PDOException $e) {
                error_log('Error en consultar_abogado_model(): ' . $e->getMessage());
                return [];
            }
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

        public function set_Cedula($cedula) { 
            $this->cedula = $cedula; 
        }
        public function get_Cedula() { 
            return $this->cedula; 
        }

        public function set_Direccion($direccion) { 
            $this->direccion = $direccion; 
        }
        public function get_Direccion() { 
            return $this->direccion; 
        }

        public function set_Telefono($telefono) { 
            $this->telefono = $telefono; 
        }
        public function get_Telefono() { 
            return $this->telefono; 
        }
        
        public function set_Correo($correo) { 
            $this->correo = $correo; 
        }
        public function get_Correo() { 
            return $this->correo; 
        }
    
        public function set_Estatus($estatus) { 
            $this->estatus = $estatus; 
        }
        public function get_Estatus() { 
            return $this->estatus; 
        }

        public function set_Nacionalidad($nacionalidad) { 
            $this->nacionalidad = $nacionalidad; 
        }
        public function get_Nacionalidad() { 
            return $this->nacionalidad; 
        }
    }