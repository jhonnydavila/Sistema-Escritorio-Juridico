<?php
    require_once('conexion.php');

    class ClienteModel extends Conexion {
        private $conexion;

        // Propiedades de tbl_clientes
        private $codigoCliente;
        private $correoCliente;
        private $direccionCliente;
        private $estatusCliente;
        private $fechaRegistroCliente;
        private $tipoCliente;

        // Propiedades de tbl_clientestelefonos
        private $telefonoCliente;

        // Propiedades de tbl_clientesnaturales
        private $nombreClienteNatural;
        private $apellidoClienteNatural;
        private $cedulaClienteNatural;
        private $nacionalidadClienteNatural;
        private $fechaNacimientoClienteNatural;
        private $estadoCivilClienteNatural;

        // Propiedades de tbl_clientesjuridicos y tbl_representantes
        private $cedulaRepresentante;
        private $nombreRepresentante;
        private $apellidoRepresentante;
        private $razonSocialClienteJuridico;
        private $fechaConstitucionClienteJuridico;
        private $rifClienteJuridico;

        public function __construct() {
            $this->conexion = new Conexion();
            $this->conexion = $this->conexion->Conexion();
        }

        public function registrar_cliente_model() {
            try {
                // Iniciar transacción de base de datos
                $this->conexion->beginTransaction();

                // 1. Generar código de cliente
                $this->codigoCliente = $this->generarCodigoAleatorio('CLI');
                $this->fechaRegistroCliente = date('Y-m-d');
                $this->estatusCliente = 'Activo';

                // Capitalizar el tipo de cliente para la base de datos (Natural / Juridico)
                $tipoFormateado = ucfirst(trim($this->tipoCliente));
                if ($tipoFormateado === 'Juridico') {
                    // Mantener consistencia con el seed sin tilde
                    $tipoFormateado = 'Juridico'; 
                }

                // 2. Insertar en tbl_clientes
                $sqlCliente = "INSERT INTO tbl_clientes (codigoCliente, correoCliente, direccionCliente, estatusCliente, fechaRegistroCliente, tipoCliente) 
                               VALUES (:codigo, :correo, :direccion, :estatus, :fecha, :tipo)";
                $stmtCliente = $this->conexion->prepare($sqlCliente);
                $stmtCliente->bindParam(':codigo', $this->codigoCliente);
                $stmtCliente->bindParam(':correo', $this->correoCliente);
                $stmtCliente->bindParam(':direccion', $this->direccionCliente);
                $stmtCliente->bindParam(':estatus', $this->estatusCliente);
                $stmtCliente->bindParam(':fecha', $this->fechaRegistroCliente);
                $stmtCliente->bindParam(':tipo', $tipoFormateado);
                $stmtCliente->execute();

                // 3. Insertar en tbl_clientestelefonos
                $sqlTelefono = "INSERT INTO tbl_clientestelefonos (codigoCliente, numeroClienteTelefono) 
                                VALUES (:codigo, :telefono)";
                $stmtTelefono = $this->conexion->prepare($sqlTelefono);
                $stmtTelefono->bindParam(':codigo', $this->codigoCliente);
                $stmtTelefono->bindParam(':telefono', $this->telefonoCliente);
                $stmtTelefono->execute();

                // 4. Inserciones condicionales según tipo de cliente
                if ($tipoFormateado === 'Natural') {
                    // Capitalizar el estado civil
                    $estadoCivilFormateado = ucfirst(trim($this->estadoCivilClienteNatural));

                    $sqlNatural = "INSERT INTO tbl_clientesnaturales (codigoCliente, nombreClienteNatural, apellidoClienteNatural, cedulaClienteNatural, nacionalidadClienteNatural, fechaNacimientoClienteNatural, estadoCivilClienteNatural) 
                                   VALUES (:codigo, :nombre, :apellido, :cedula, :nacionalidad, :fechaNac, :estadoCivil)";
                    $stmtNatural = $this->conexion->prepare($sqlNatural);
                    $stmtNatural->bindParam(':codigo', $this->codigoCliente);
                    $stmtNatural->bindParam(':nombre', $this->nombreClienteNatural);
                    $stmtNatural->bindParam(':apellido', $this->apellidoClienteNatural);
                    $stmtNatural->bindParam(':cedula', $this->cedulaClienteNatural, PDO::PARAM_INT);
                    $stmtNatural->bindParam(':nacionalidad', $this->nacionalidadClienteNatural);
                    $stmtNatural->bindParam(':fechaNac', $this->fechaNacimientoClienteNatural);
                    $stmtNatural->bindParam(':estadoCivil', $estadoCivilFormateado);
                    $stmtNatural->execute();

                } else if ($tipoFormateado === 'Juridico') {
                    // A. Insertar o actualizar Representante
                    $sqlRepresentante = "INSERT INTO tbl_representantes (cedulaRepresentante, nombreRepresentante, apellidoRepresentante) 
                                         VALUES (:cedula, :nombre, :apellido)
                                         ON DUPLICATE KEY UPDATE nombreRepresentante = :nombre, apellidoRepresentante = :apellido";
                    $stmtRepresentante = $this->conexion->prepare($sqlRepresentante);
                    $stmtRepresentante->bindParam(':cedula', $this->cedulaRepresentante, PDO::PARAM_INT);
                    $stmtRepresentante->bindParam(':nombre', $this->nombreRepresentante);
                    $stmtRepresentante->bindParam(':apellido', $this->apellidoRepresentante);
                    $stmtRepresentante->execute();

                    // B. Insertar en tbl_clientesjuridicos
                    $sqlJuridico = "INSERT INTO tbl_clientesjuridicos (codigoCliente, cedulaRepresentante, razonSocialClienteJuridico, fechaConstitucionClienteJuridico, rifClienteJuridico) 
                                    VALUES (:codigo, :cedulaRep, :razonSocial, :fechaConst, :rif)";
                    $stmtJuridico = $this->conexion->prepare($sqlJuridico);
                    $stmtJuridico->bindParam(':codigo', $this->codigoCliente);
                    $stmtJuridico->bindParam(':cedulaRep', $this->cedulaRepresentante, PDO::PARAM_INT);
                    $stmtJuridico->bindParam(':razonSocial', $this->razonSocialClienteJuridico);
                    $stmtJuridico->bindParam(':fechaConst', $this->fechaConstitucionClienteJuridico);
                    $stmtJuridico->bindParam(':rif', $this->rifClienteJuridico, PDO::PARAM_INT);
                    $stmtJuridico->execute();
                }

                // Confirmar transacción
                $this->conexion->commit();
                return true;

            } catch (PDOException $e) {
                // Revertir en caso de error
                $this->conexion->rollBack();
                error_log('Error en registrar_cliente_model(): ' . $e->getMessage());
                return false;
            }
        }

        public function consultar_cliente_model() {
            try {
                $sql = "SELECT 
                            c.codigoCliente,
                            c.correoCliente,
                            c.direccionCliente,
                            c.estatusCliente,
                            c.fechaRegistroCliente,
                            c.tipoCliente,
                            cn.nombreClienteNatural,
                            cn.apellidoClienteNatural,
                            cn.cedulaClienteNatural,
                            cn.nacionalidadClienteNatural,
                            cn.fechaNacimientoClienteNatural,
                            cn.estadoCivilClienteNatural,
                            cj.razonSocialClienteJuridico,
                            cj.fechaConstitucionClienteJuridico,
                            cj.rifClienteJuridico,
                            cj.cedulaRepresentante,
                            r.nombreRepresentante,
                            r.apellidoRepresentante,
                            GROUP_CONCAT(t.numeroClienteTelefono SEPARATOR ', ') AS telefonos
                        FROM tbl_clientes c
                        LEFT JOIN tbl_clientesnaturales cn ON c.codigoCliente = cn.codigoCliente
                        LEFT JOIN tbl_clientesjuridicos cj ON c.codigoCliente = cj.codigoCliente
                        LEFT JOIN tbl_representantes r ON cj.cedulaRepresentante = r.cedulaRepresentante
                        LEFT JOIN tbl_clientestelefonos t ON c.codigoCliente = t.codigoCliente
                        GROUP BY c.codigoCliente
                        ORDER BY c.fechaRegistroCliente DESC";
                $consulta = $this->conexion->prepare($sql);
                $consulta->execute();
                return $consulta->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                error_log('Error en consultar_cliente_model(): ' . $e->getMessage());
                exit();
            }
        }

        // Getters y Setters
        public function set_CodigoCliente($codigoCliente) { $this->codigoCliente = $codigoCliente; }
        public function get_CodigoCliente() { return $this->codigoCliente; }

        public function set_CorreoCliente($correoCliente) { $this->correoCliente = $correoCliente; }
        public function get_CorreoCliente() { return $this->correoCliente; }

        public function set_DireccionCliente($direccionCliente) { $this->direccionCliente = $direccionCliente; }
        public function get_DireccionCliente() { return $this->direccionCliente; }

        public function set_EstatusCliente($estatusCliente) { $this->estatusCliente = $estatusCliente; }
        public function get_EstatusCliente() { return $this->estatusCliente; }

        public function set_FechaRegistroCliente($fechaRegistroCliente) { $this->fechaRegistroCliente = $fechaRegistroCliente; }
        public function get_FechaRegistroCliente() { return $this->fechaRegistroCliente; }

        public function set_TipoCliente($tipoCliente) { $this->tipoCliente = $tipoCliente; }
        public function get_TipoCliente() { return $this->tipoCliente; }

        public function set_TelefonoCliente($telefonoCliente) { $this->telefonoCliente = $telefonoCliente; }
        public function get_TelefonoCliente() { return $this->telefonoCliente; }

        public function set_NombreClienteNatural($nombreClienteNatural) { $this->nombreClienteNatural = $nombreClienteNatural; }
        public function get_NombreClienteNatural() { return $this->nombreClienteNatural; }

        public function set_ApellidoClienteNatural($apellidoClienteNatural) { $this->apellidoClienteNatural = $apellidoClienteNatural; }
        public function get_ApellidoClienteNatural() { return $this->apellidoClienteNatural; }

        public function set_CedulaClienteNatural($cedulaClienteNatural) { $this->cedulaClienteNatural = $cedulaClienteNatural; }
        public function get_CedulaClienteNatural() { return $this->cedulaClienteNatural; }

        public function set_NacionalidadClienteNatural($nacionalidadClienteNatural) { $this->nacionalidadClienteNatural = $nacionalidadClienteNatural; }
        public function get_NacionalidadClienteNatural() { return $this->nacionalidadClienteNatural; }

        public function set_FechaNacimientoClienteNatural($fechaNacimientoClienteNatural) { $this->fechaNacimientoClienteNatural = $fechaNacimientoClienteNatural; }
        public function get_FechaNacimientoClienteNatural() { return $this->fechaNacimientoClienteNatural; }

        public function set_EstadoCivilClienteNatural($estadoCivilClienteNatural) { $this->estadoCivilClienteNatural = $estadoCivilClienteNatural; }
        public function get_EstadoCivilClienteNatural() { return $this->estadoCivilClienteNatural; }

        public function set_CedulaRepresentante($cedulaRepresentante) { $this->cedulaRepresentante = $cedulaRepresentante; }
        public function get_CedulaRepresentante() { return $this->cedulaRepresentante; }

        public function set_NombreRepresentante($nombreRepresentante) { $this->nombreRepresentante = $nombreRepresentante; }
        public function get_NombreRepresentante() { return $this->nombreRepresentante; }

        public function set_ApellidoRepresentante($apellidoRepresentante) { $this->apellidoRepresentante = $apellidoRepresentante; }
        public function get_ApellidoRepresentante() { return $this->apellidoRepresentante; }

        public function set_RazonSocialClienteJuridico($razonSocialClienteJuridico) { $this->razonSocialClienteJuridico = $razonSocialClienteJuridico; }
        public function get_RazonSocialClienteJuridico() { return $this->razonSocialClienteJuridico; }

        public function set_FechaConstitucionClienteJuridico($fechaConstitucionClienteJuridico) { $this->fechaConstitucionClienteJuridico = $fechaConstitucionClienteJuridico; }
        public function get_FechaConstitucionClienteJuridico() { return $this->fechaConstitucionClienteJuridico; }

        public function set_RifClienteJuridico($rifClienteJuridico) { $this->rifClienteJuridico = $rifClienteJuridico; }
        public function get_RifClienteJuridico() { return $this->rifClienteJuridico; }
    }
?>
