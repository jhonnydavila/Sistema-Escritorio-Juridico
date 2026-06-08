<?php
    require_once('conexion.php');

    class ClienteNaturalModel extends Conexion {
        private $conex;
        private $codigoCliente;
        private $nombre;
        private $apellido;
        private $nacionalidad;
        private $cedula;
        private $fechaNacimiento;
        private $estadoCivil;

        public function __construct(){
            $this->conex = new Conexion();
            $this->conex = $this->conex->Conex();
        }

        public function registrar_cliente_natural_model() {
            try {
                $sql = "INSERT INTO tbl_clientesnaturales (codigoCliente, nombreClienteNatural, apellidoClienteNatural, nacionalidadClienteNatural, cedulaClienteNatural, fechaNacimientoClienteNatural, estadoCivilClienteNatural) 
                        VALUES (:codigo, :nombre, :apellido, :nacionalidad, :cedula, :fechaNacimiento, :estadoCivil)";
                
                $stmt = $this->conex->prepare($sql);
                $stmt->bindParam(':codigo', $this->codigoCliente);
                $stmt->bindParam(':nombre', $this->nombre);
                $stmt->bindParam(':apellido', $this->apellido);
                $stmt->bindParam(':nacionalidad', $this->nacionalidad);
                $stmt->bindParam(':cedula', $this->cedula);
                $stmt->bindParam(':fechaNacimiento', $this->fechaNacimiento);
                $stmt->bindParam(':estadoCivil', $this->estadoCivil);
                return $stmt->execute();
            } catch (PDOException $e) {
                error_log('Error en registrar_cliente_natural_model: ' . $e->getMessage());
                return false;
            }
        }

        // Getters y Setters
        public function set_CodigoCliente($codigo) { $this->codigoCliente = $codigo; }
        public function set_Nombre($nombre) { $this->nombre = $nombre; }
        public function set_Apellido($apellido) { $this->apellido = $apellido; }
        public function set_Nacionalidad($nacionalidad) { $this->nacionalidad = $nacionalidad; }
        public function set_Cedula($cedula) { $this->cedula = $cedula; }
        public function set_FechaNacimiento($fecha) { $this->fechaNacimiento = $fecha; }
        public function set_EstadoCivil($estado) { $this->estadoCivil = $estado; }
    }
?>