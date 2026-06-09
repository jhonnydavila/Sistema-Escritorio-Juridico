<?php
    require_once('conexion.php');

    class ClienteModel extends Conexion {
        private $conex;
        private $codigo;
        private $tipo;
        private $correo;
        private $direccion;
        private $telefono;
        private $estatus;

        private $nombre;
        private $apellido;
        private $nacionalidad;
        private $cedula;
        private $fechaNacimiento;
        private $estadoCivil;

        private $razonSocial;
        private $tipoRif;
        private $rif;
        private $fechaConstitucion;
        private $representantes;

        public function __construct(){
            $this->conex = new Conexion();
            $this->conex = $this->conex->Conex();
            $this->representantes = [];
        }

        public function registrar_cliente_model() {
            try {
                $this->conex->beginTransaction();
                $this->generar_codigo_cliente();

                $sqlCliente = "INSERT INTO tbl_clientes (codigoCliente, correoCliente, direccionCliente, tipoCliente, estatusCliente) VALUES (:codigo, :correo, :direccion, :tipo, :estatus)";
                $execCliente = $this->conex->prepare($sqlCliente);
                $execCliente->bindParam(':codigo', $this->codigo);
                $execCliente->bindParam(':correo', $this->correo);
                $execCliente->bindParam(':direccion', $this->direccion);
                $execCliente->bindParam(':tipo', $this->tipo);
                $execCliente->bindParam(':estatus', $this->estatus);
                $execCliente->execute();

                if ($this->tipo === 'Natural') {
                    $this->registrar_cliente_natural();
                } else {
                    $this->registrar_cliente_juridico();
                }

                $sqlTelefono = "INSERT INTO tbl_clientestelefonos (codigoCliente, numeroClienteTelefono) VALUES (:codigo, :telefono)";
                $execTelefono = $this->conex->prepare($sqlTelefono);
                $execTelefono->bindParam(':codigo', $this->codigo);
                $execTelefono->bindParam(':telefono', $this->telefono);
                $execTelefono->execute();

                $this->conex->commit();
                return true;
            } catch (PDOException $e) {
                if ($this->conex->inTransaction()) {
                    $this->conex->rollBack();
                }
                error_log('Error en registrar_cliente_model(): ' . $e->getMessage());
                return false;
            }
        }

        private function registrar_cliente_natural() {
            $sql = "INSERT INTO tbl_clientesnaturales (codigoCliente, nombreClienteNatural, apellidoClienteNatural, nacionalidadClienteNatural, cedulaClienteNatural, fechaNacimientoClienteNatural, estadoCivilClienteNatural) VALUES (:codigo, :nombre, :apellido, :nacionalidad, :cedula, :fechaNacimiento, :estadoCivil)";
            $exec = $this->conex->prepare($sql);
            $exec->bindParam(':codigo', $this->codigo);
            $exec->bindParam(':nombre', $this->nombre);
            $exec->bindParam(':apellido', $this->apellido);
            $exec->bindParam(':nacionalidad', $this->nacionalidad);
            $exec->bindParam(':cedula', $this->cedula);
            $exec->bindParam(':fechaNacimiento', $this->fechaNacimiento);
            $exec->bindParam(':estadoCivil', $this->estadoCivil);
            $exec->execute();
        }

        private function registrar_cliente_juridico() {
            $sqlJuridico = "INSERT INTO tbl_clientesjuridicos (codigoCliente, fechaConstitucionClienteJuridico, razonSocialClienteJuridico, tipoRifClienteJuridico, rifClienteJuridico) VALUES (:codigo, :fechaConstitucion, :razonSocial, :tipoRif, :rif)";
            $execJuridico = $this->conex->prepare($sqlJuridico);
            $execJuridico->bindParam(':codigo', $this->codigo);
            $execJuridico->bindParam(':fechaConstitucion', $this->fechaConstitucion);
            $execJuridico->bindParam(':razonSocial', $this->razonSocial);
            $execJuridico->bindParam(':tipoRif', $this->tipoRif);
            $execJuridico->bindParam(':rif', $this->rif);
            $execJuridico->execute();

            $sqlVinculo = "INSERT INTO tbl_representantesjuridicos (codigoCliente, cedulaRepresentante, rolRepresentanteJuridico) VALUES (:codigo, :cedula, :rol)";
            $execVinculo = $this->conex->prepare($sqlVinculo);

            $cedulasAsociadas = [];
            foreach ($this->representantes as $representante) {
                $cedula = $representante['cedula'];
                $rol = $representante['rol'];

                if ($cedula === '' || in_array($cedula, $cedulasAsociadas, true)) {
                    continue;
                }
                $cedulasAsociadas[] = $cedula;

                $execVinculo->bindParam(':codigo', $this->codigo);
                $execVinculo->bindParam(':cedula', $cedula);
                $execVinculo->bindParam(':rol', $rol);
                $execVinculo->execute();
            }

            if (empty($cedulasAsociadas)) {
                throw new PDOException('Un cliente juridico requiere al menos un representante asociado.');
            }
        }

        public function consultar_cliente_model() {
            try {
                $sql = "SELECT
                            tbl_clientes.codigoCliente,
                            tbl_clientes.correoCliente,
                            tbl_clientes.direccionCliente,
                            tbl_clientes.tipoCliente,
                            tbl_clientes.estatusCliente,
                            CASE
                                WHEN tbl_clientes.tipoCliente = 'Natural'
                                THEN CONCAT(tbl_clientesnaturales.nombreClienteNatural, ' ', tbl_clientesnaturales.apellidoClienteNatural)
                                ELSE tbl_clientesjuridicos.razonSocialClienteJuridico
                            END AS nombreCliente,
                            CASE
                                WHEN tbl_clientes.tipoCliente = 'Natural'
                                THEN CONCAT(tbl_clientesnaturales.nacionalidadClienteNatural, '-', tbl_clientesnaturales.cedulaClienteNatural)
                                ELSE CONCAT(tbl_clientesjuridicos.tipoRifClienteJuridico, '-', tbl_clientesjuridicos.rifClienteJuridico)
                            END AS documentoCliente,
                            tbl_clientestelefonos.numeroClienteTelefono
                        FROM
                            tbl_clientes
                        LEFT JOIN
                            tbl_clientesnaturales
                        ON
                            tbl_clientes.codigoCliente = tbl_clientesnaturales.codigoCliente
                        LEFT JOIN
                            tbl_clientesjuridicos
                        ON
                            tbl_clientes.codigoCliente = tbl_clientesjuridicos.codigoCliente
                        LEFT JOIN
                            tbl_clientestelefonos
                        ON
                            tbl_clientes.codigoCliente = tbl_clientestelefonos.codigoCliente
                        ";
                $consulta = $this->conex->prepare($sql);
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

        public function set_Codigo($codigo) {
            $this->codigo = $codigo;
        }
        public function get_Codigo() {
            return $this->codigo;
        }

        public function set_Tipo($tipo) {
            $this->tipo = ucfirst(strtolower($tipo));
        }
        public function get_Tipo() {
            return $this->tipo;
        }

        public function set_Correo($correo) {
            $this->correo = $correo;
        }
        public function get_Correo() {
            return $this->correo;
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

        public function set_Estatus($estatus) {
            $this->estatus = $estatus;
        }
        public function get_Estatus() {
            return $this->estatus;
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

        public function set_Nacionalidad($nacionalidad) {
            $this->nacionalidad = $nacionalidad;
        }
        public function get_Nacionalidad() {
            return $this->nacionalidad;
        }

        public function set_Cedula($cedula) {
            $this->cedula = $cedula;
        }
        public function get_Cedula() {
            return $this->cedula;
        }

        public function set_FechaNacimiento($fechaNacimiento) {
            $this->fechaNacimiento = $fechaNacimiento;
        }
        public function get_FechaNacimiento() {
            return $this->fechaNacimiento;
        }

        public function set_EstadoCivil($estadoCivil) {
            $this->estadoCivil = $estadoCivil;
        }
        public function get_EstadoCivil() {
            return $this->estadoCivil;
        }

        public function set_RazonSocial($razonSocial) {
            $this->razonSocial = $razonSocial;
        }
        public function get_RazonSocial() {
            return $this->razonSocial;
        }

        public function set_TipoRif($tipoRif) {
            $this->tipoRif = $tipoRif;
        }
        public function get_TipoRif() {
            return $this->tipoRif;
        }

        public function set_Rif($rif) {
            $this->rif = $rif;
        }
        public function get_Rif() {
            return $this->rif;
        }

        public function set_FechaConstitucion($fechaConstitucion) {
            $this->fechaConstitucion = $fechaConstitucion;
        }
        public function get_FechaConstitucion() {
            return $this->fechaConstitucion;
        }

        public function set_Representantes($representantes) {
            $this->representantes = $representantes;
        }
        public function get_Representantes() {
            return $this->representantes;
        }
    }
