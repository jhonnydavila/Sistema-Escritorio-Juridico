<?php
    require_once('conexion.php');

    class UsuarioModel extends Conexion {
        private $nombre;
        private $apellido;
        private $cedula;
        private $rol;
        private $clave;
        private $fechaRegistro;
        private $estatus;

        public function __construct(){
            $this->conexion = new Conexion();
            $this->conexion = $this->conexion->Conexion();
        }

        public function registrar_usuario_model() {
            try {
                $registro = "INSERT INTO tbl_usuarios (nombreUsuario, apellidoUsuario, cedulaUsuario, rolUsuario, claveUsuario, fechaRegistroUsuario, estatusUsuario) VALUES (:nombre, :apellido, :cedula, :rol, :clave, :fechaRegistro, :estatus)";
                $strExec = $this->conexion->prepare($registro);
                $strExec->bindParam(':nombre', $this->nombre);
                $strExec->bindParam(':apellido', $this->apellido);
                $strExec->bindParam(':cedula', $this->cedula);
                $strExec->bindParam(':rol', $this->rol);
                $strExec->bindParam(':clave', $this->clave);
                $strExec->bindParam(':fechaRegistro', $this->fechaRegistro);
                $strExec->bindParam(':estatus', $this->estatus);
                return $strExec->execute();
            } catch (PDOException $e) {
                error_log('Error en registrar_usuario_model(): ' . $e->getMessage());
                exit();
            }
        }

        public function consultar_usuario_model() {
            try {
                $registro = "SELECT * FROM tbl_usuarios";
                $consulta = $this->conexion->prepare($registro);
                $consulta->execute();
                $datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
                return $datos;
            } catch (PDOException $e) {
                error_log('Error en consultar_usuario_model(): ' . $e->getMessage());
                exit();
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

        public function set_Rol($rol) { 
            $this->rol = $rol; 
        }
        public function get_Rol() { 
            return $this->rol; 
        }
        
        public function set_Clave($clave) { 
            $this->clave = $clave; 
        }
        public function get_Clave() { 
            return $this->clave; 
        }
        
        public function set_FechaRegistro($fechaRegistro) { 
            $this->fechaRegistro = $fechaRegistro; 
        }
        public function get_FechaRegistro() { 
            return $this->fechaRegistro; 
        }
    
        public function set_Estatus($estatus) { 
            $this->estatus = $estatus; 
        }
        public function get_Estatus() { 
            return $this->estatus; 
        }
    }