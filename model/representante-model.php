<?php
    require_once('conexion.php');

    class Representante extends Conexion {
        private $conex;
        private $cedula;
        private $nacionalidad;
        private $nombre;
        private $apellido;
        private $telefono;

        public function __construct(){
            $this->conex = new Conexion();
            $this->conex = $this->conex->Conex();
        }

        public function registrar_representante_model() {
            try {
                $sql = "INSERT INTO tbl_representantes (cedulaRepresentante, nacionalidadRepresentante, nombreRepresentante, apellidoRepresentante, telefonoRepresentante) 
                        VALUES (:cedula, :nacionalidad, :nombre, :apellido, :telefono)";
                
                $stmt = $this->conex->prepare($sql);
                $stmt->bindParam(':cedula', $this->cedula);
                $stmt->bindParam(':nacionalidad', $this->nacionalidad);
                $stmt->bindParam(':nombre', $this->nombre);
                $stmt->bindParam(':apellido', $this->apellido);
                $stmt->bindParam(':telefono', $this->telefono);
                
                return $stmt->execute();
            } catch (PDOException $e) {
                error_log('Error en registrar_representante_model: ' . $e->getMessage());
                return false;
            }
        }

        public function consultar_representantes_model() {
            try {
                $sql = "SELECT * FROM tbl_representantes";
                $consulta = $this->conex->prepare($sql);
                $consulta->execute();
                return $consulta->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                error_log('Error en consultar_representantes_model: ' . $e->getMessage());
                return [];
            }
        }

        // Getters y Setters
        public function set_Cedula($cedula) { $this->cedula = $cedula; }
        public function set_Nacionalidad($nacionalidad) { $this->nacionalidad = $nacionalidad; }
        public function set_Nombre($nombre) { $this->nombre = $nombre; }
        public function set_Apellido($apellido) { $this->apellido = $apellido; }
        public function set_Telefono($telefono) { $this->telefono = $telefono; }
    }
?>