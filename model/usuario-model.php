<?php
    require_once('conexion.php');

    class UsuarioModel extends Conexion {
        private $conex;
        private $codigo;
        private $nombre;
        private $apellido;
        private $cedula;
        private $rol;
        private $clave;
        private $fechaRegistro;
        private $estatus;

        public function __construct(){
            $this->conex = new Conexion();
            $this->conex = $this->conex->Conex();
        }

        public function registrar_usuario_model() {
            try {
                $this->generar_codigo_usuario();

                $registro = "INSERT INTO tbl_usuarios (codigoUsuario, nombreUsuario, apellidoUsuario, cedulaUsuario, rolUsuario, claveUsuario, fechaRegistroUsuario, estatusUsuario) VALUES (:codigo, :nombre, :apellido, :cedula, :rol, :clave, :fechaRegistro, :estatus)";
                $strExec = $this->conex->prepare($registro);
                $strExec->bindParam(':codigo', $this->codigo);
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
                $consulta = $this->conex->prepare($registro);
                $consulta->execute();
                $datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
                return $datos;
            } catch (PDOException $e) {
                error_log('Error en consultar_usuario_model(): ' . $e->getMessage());
                exit();
            }
        }

        private function generar_codigo_usuario() {
            $sql = "SELECT codigoUsuario FROM tbl_usuarios ORDER BY codigoUsuario DESC LIMIT 1";
            $consulta = $this->conex->prepare($sql);
            $consulta->execute();
            $ultimo = $consulta->fetch(PDO::FETCH_ASSOC);
            if ($ultimo) {
                $partes = explode('-', $ultimo['codigoUsuario']);
                $nuevoNumero = (int)$partes[1] + 1;
                $this->codigo = 'USU-' . str_pad($nuevoNumero, 3, '0', STR_PAD_LEFT);
            } else {
                $this->codigo = 'USU-001';
            }
        }

        public function buscar_usuario_model($cedula) {
            try {
                $registro = "SELECT * FROM tbl_usuarios WHERE cedulaUsuario = :cedula";
                $consulta = $this->conex->prepare($registro);
                $consulta->bindParam(':cedula', $cedula);
                $consulta->execute();
                $datos = $consulta->fetch(PDO::FETCH_ASSOC);
                return $datos;
            } catch (PDOException $e) {
                error_log('Error en buscar_usuario_model(): ' . $e->getMessage());
                exit();
            }
        }

        public function set_Codigo($codigo) { 
            $this->codigo = $codigo; 
        }
        public function get_Codigo() { 
            return $this->codigo; 
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