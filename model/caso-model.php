<?php
    require_once('conexion.php');

    class CasoModel extends Conexion {
        private $conex;
        private $codigo;
        private $fechaRegistro;
        private $fechaInicio;
        private $fechaFin;
        private $modalidad;
        
        private $nacionalidad;
        private $correo;
        private $estatus;

        public function __construct(){
            $this->conex = new Conexion();
            $this->conex = $this->conex->Conex();
        }

        public function registrar_caso_model() {
            try {
                $registro = "INSERT INTO tbl_casos (codigoCaso, fechaRegistroCaso, fechaInicioCaso, fechaFinCaso, modalidadCaso, nacionalidadCaso, correoCaso, estatusCaso) VALUES (:codigo, :fechaRegistro, :fechaInicio, :fechaFin, :modalidad, :nacionalidad, :correo, :estatus)";
                $strExec = $this->conex->prepare($registro);
                $strExec->bindParam(':codigo', $this->codigo);
                $strExec->bindParam(':fechaRegistro', $this->fechaRegistro);
                $strExec->bindParam(':fechaInicio', $this->fechaInicio);
                $strExec->bindParam(':fechaFin', $this->fechaFin);
                $strExec->bindParam(':modalidad', $this->modalidad);
                $strExec->bindParam(':nacionalidad', $this->nacionalidad);
                $strExec->bindParam(':correo', $this->correo);
                $strExec->bindParam(':estatus', $this->estatus);
                return $strExec->execute();
            } catch (PDOException $e) {
                error_log('Error en registrar_abogado_model(): ' . $e->getMessage());
                exit();
            }
        }

        public function consultar_caso_model() {
            try {
                $registro = "SELECT * FROM tbl_casos";
                $consulta = $this->conex->prepare($registro);
                $consulta->execute();
                $datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
                return $datos;
            } catch (PDOException $e) {
                error_log('Error en consultar_caso_model(): ' . $e->getMessage());
                exit();
            }
        }

        public function set_Codigo($codigo) { 
            $this->codigo = $codigo; 
        }
        public function get_Codigo() { 
            return $this->codigo; 
        }

        public function set_FechaRegistro($fechaRegistro) { 
            $this->fechaRegistro = $fechaRegistro; 
        }
        public function get_FechaRegistro() { 
            return $this->fechaRegistro; 
        }

        public function set_FechaInicio($fechaInicio) { 
            $this->fechaInicio = $fechaInicio; 
        }
        public function get_FechaInicio() { 
            return $this->fechaInicio; 
        }

        public function set_FechaFin($fechaFin) { 
            $this->fechaFin = $fechaFin; 
        }
        public function get_FechaFin() { 
            return $this->fechaFin; 
        }

        public function set_Modalidad($modalidad) { 
            $this->modalidad = $modalidad; 
        }
        public function get_Modalidad() { 
            return $this->modalidad; 
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