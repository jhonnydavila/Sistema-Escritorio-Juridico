<?php
    require_once('conexion.php');

    class ClienteModel extends Conexion {
        private $conex;
        private $codigo;
        private $correo;
        private $direccion;
        private $tipo;
        private $fechaRegistro;
        private $estatus;
        
        private $telefono;
        
        public function __construct(){
            $this->conex = new Conexion();
            $this->conex = $this->conex->Conex();
        }

        public function registrar_cliente_model() {
            try {
                $this->generar_codigo_cliente();

                // Se corrigió :fechaRegistro que le faltaba los dos puntos
                $registro = "INSERT INTO tbl_clientes (codigoCliente, correoCliente, direccionCliente, tipoCliente, fechaRegistroCliente, estatusCliente) VALUES (:codigo, :correo, :direccion, :tipo, :fechaRegistro, :estatus)";
                
                $strExec = $this->conex->prepare($registro);
                $strExec->bindParam(':codigo', $this->codigo);
                $strExec->bindParam(':correo', $this->correo);
                $strExec->bindParam(':direccion', $this->direccion);
                $strExec->bindParam(':tipo', $this->tipo);
                $strExec->bindParam(':fechaRegistro', $this->fechaRegistro);
                $strExec->bindParam(':estatus', $this->estatus);
                $strExec->execute();

                // Inserción en la tabla de teléfonos
                if (!empty($this->telefono)) {
                    $this->registrar_telefono_model();
                }

                return true;
                
            } catch (PDOException $e) {
                error_log('Error en registrar_cliente_model(): ' . $e->getMessage());
                return false;
            }
        }

        private function registrar_telefono_model() {
            try {
                $sql = "INSERT INTO tbl_clientestelefonos (codigoCliente, numeroClienteTelefono) VALUES (:codigo, :telefono)";
                $stmt = $this->conex->prepare($sql);
                $stmt->bindParam(':codigo', $this->codigo);
                $stmt->bindParam(':telefono', $this->telefono);
                $stmt->execute();
            } catch (PDOException $e) {
                error_log('Error en registrar_telefono_model(): ' . $e->getMessage());
            }
        }

        public function consultar_cliente_model() {
            try {
                $registro = "SELECT c.*, 
                                    n.nombreClienteNatural, n.apellidoClienteNatural, 
                                    j.razonSocialClienteJuridico, 
                                    t.numeroClienteTelefono 
                            FROM tbl_clientes c
                            LEFT JOIN tbl_clientesnaturales n ON c.codigoCliente = n.codigoCliente
                            LEFT JOIN tbl_clientesjuridicos j ON c.codigoCliente = j.codigoCliente
                            LEFT JOIN tbl_clientestelefonos t ON c.codigoCliente = t.codigoCliente";
                $consulta = $this->conex->prepare($registro);
                $consulta->execute();
                $datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
                return $datos;
            } catch (PDOException $e) {
                error_log('Error en consultar_cliente_model(): ' . $e->getMessage());
                return [];
            }
        }

        private function generar_codigo_cliente() {
            $sql = "SELECT codigoCliente FROM tbl_clientes ORDER BY codigoCliente DESC LIMIT 1";
            $consulta = $this->conex->prepare($sql);
            $consulta->execute();
            $ultimo = $consulta->fetch(PDO::FETCH_ASSOC);
            if ($ultimo) {
                $partes = explode('-', $ultimo['codigoCliente']);
                $nuevoNumero = (int)$partes[1] + 1;
                $this->codigo = 'CLI-' . str_pad($nuevoNumero, 5, '0', STR_PAD_LEFT);
            } else {
                $this->codigo = 'CLI-00001';
            }
        }

        // Getters y Setters
        public function set_Telefono($telefono) { $this->telefono = $telefono; }
        public function get_Telefono() { return $this->telefono; }
        public function set_Codigo($codigo) { $this->codigo = $codigo; }
        public function get_Codigo() { return $this->codigo; }
        public function set_Correo($correo) { $this->correo = $correo; }
        public function get_Correo() { return $this->correo; }
        public function set_Direccion($direccion) { $this->direccion = $direccion; }
        public function get_Direccion() { return $this->direccion; }
        public function set_FechaRegistro($fechaRegistro) { $this->fechaRegistro = $fechaRegistro; }
        public function get_FechaRegistro() { return $this->fechaRegistro; }
        public function set_Tipo($tipo) { $this->tipo = $tipo; }
        public function get_Tipo() { return $this->tipo; }
        public function set_Estatus($estatus) { $this->estatus = $estatus; }
        public function get_Estatus() { return $this->estatus; }
    }
?>