<?php
    require_once('conexion.php');

    class EventoModel extends Conexion {
        private $codigo;
        private $titulo;
        private $tipo;
        private $descripcion;
        private $estatus;
        private $fecha;
        private $caso;

        public function __construct(){
            $this->conexion = new Conexion();
            $this->conexion = $this->conexion->Conexion();
        }

        public function registrar_evento_model() {
            try {
                $this->codigo = conexion::generarCodigoAleatorio("EVE");
                $registro = "INSERT INTO tbl_eventos (codigoEvento, tituloEvento, tipoEvento, descripcionEvento, estatusEvento, fechaEvento, codigoCaso) VALUES (:codigo, :titulo, :tipo, :descripcion, :estatus, :fecha, :caso)";
                $strExec = $this->conexion->prepare($registro);
                $strExec->bindParam(':codigo', $this->codigo);
                $strExec->bindParam(':titulo', $this->titulo);
                $strExec->bindParam(':tipo', $this->tipo);
                $strExec->bindParam(':descripcion', $this->descripcion);
                $strExec->bindParam(':estatus', $this->estatus);
                $strExec->bindParam(':fecha', $this->fecha);
                $strExec->bindParam(':caso', $this->caso);
                return $strExec->execute();
            } catch (PDOException $e) {
                error_log('Error en registrar_evento_model(): ' . $e->getMessage());
                exit();
            }
        }

        public function  consultar_evento_model() {
            try {
                $registro = "SELECT * FROM tbl_eventos";
                $consulta = $this->conexion->prepare($registro);
                $consulta->execute();
                $datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
                return $datos;
            } catch (PDOException $e) {
                error_log('Error en consultar_evento_model(): ' . $e->getMessage());
                exit();
            }
        }

        public function set_Codigo($codigo) { 
            $this->codigo = $codigo; 
        }
        public function get_Codigo() { 
            return $this->codigo; 
        }

        public function set_Titulo($titulo) { 
            $this->titulo = $titulo; 
        }
        public function get_Titulo() { 
            return $this->titulo; 
        }

        public function set_Tipo($tipo) { 
            $this->tipo = $tipo; 
        }
        public function get_Tipo() { 
            return $this->tipo; 
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

        public function set_fecha($fecha) { 
            $this->fecha = $fecha; 
        }
        public function get_fecha() { 
            return $this->fecha; 
        }

        public function set_Caso($caso) { 
            $this->caso = $caso; 
        }
        public function get_Caso() { 
            return $this->caso; 
        }
    }