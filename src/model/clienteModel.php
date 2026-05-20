<?php
require_once __DIR__ . '/conexion.php';

class Cliente extends Conexion {
    private $codigoCliente;
    private $correoCliente;
    private $direccionCliente;
    private $estatusCliente;
    private $fechaRegistroCliente;
    private $tipoCliente;

    public function __construct(){
        $this->conexion = new Conexion();
        $this->conexion = $this->conexion->Conexion();
    }

    public function create_cliente(){
        try {
            $registro = "INSERT INTO tbl_clientes(codigoCliente, correoCliente, direccionCliente, estatusCliente, fechaRegistroCliente, tipoCliente) VALUES (:codigo, :correo, :direccion, :estatus, :fecha, :tipo)";
            $sql = $this->conexion->prepare($registro);
            $sql->bindParam(':codigo', $this->codigoCliente);
            $sql->bindParam(':correo', $this->correoCliente);
            $sql->bindParam(':direccion', $this->direccionCliente);
            $sql->bindParam(':estatus', $this->estatusCliente);
            $sql->bindParam(':fecha', $this->fechaRegistroCliente);
            $sql->bindParam(':tipo', $this->tipoCliente);
            return $sql->execute() ? 1 : 0;
        } catch (PDOException $e) {
            error_log('Error en create_cliente(): ' . $e->getMessage());
            return 0;
        }
    }

    public function create_cliente_natural($codigoCliente, $nombreCliente, $apellidoCliente, $cedulaCliente, $nacionalidadCliente, $fechaNacimientoCliente, $estadoCivilCliente){
        try {
            $registro = "INSERT INTO tbl_clientesnaturales(codigoCliente, nombreClienteNatural, apellidoClienteNatural, cedulaClienteNatural, nacionalidadClienteNatural, fechaNacimientoClienteNatural, estadoCivilClienteNatural) VALUES (:codigo, :nombre, :apellido, :cedula, :nacionalidad, :fecha, :estado)";
            $sql = $this->conexion->prepare($registro);
            $sql->execute([
                ':codigo' => $codigoCliente,
                ':nombre' => $nombreCliente,
                ':apellido' => $apellidoCliente,
                ':cedula' => $cedulaCliente,
                ':nacionalidad' => $nacionalidadCliente,
                ':fecha' => $fechaNacimientoCliente,
                ':estado' => $estadoCivilCliente,
            ]);
            return 1;
        } catch (PDOException $e) {
            error_log('Error en create_cliente_natural(): ' . $e->getMessage());
            return 0;
        }
    }

    public function create_cliente_juridico($codigoCliente, $cedulaRepresentante, $razonSocialClienteJuridico, $fechaConstitucionClienteJuridico, $rifClienteJuridico){
        try {
            $registro = "INSERT INTO tbl_clientesjuridicos(codigoCliente, cedulaRepresentante, razonSocialClienteJuridico, fechaConstitucionClienteJuridico, rtfClienteJuridico) VALUES (:codigo, :cedulaRepresentante, :razonSocial, :fechaConstitucion, :rif)";
            $sql = $this->conexion->prepare($registro);
            $sql->execute([
                ':codigo' => $codigoCliente,
                ':cedulaRepresentante' => $cedulaRepresentante,
                ':razonSocial' => $razonSocialClienteJuridico,
                ':fechaConstitucion' => $fechaConstitucionClienteJuridico,
                ':rif' => $rifClienteJuridico,
            ]);
            return 1;
        } catch (PDOException $e) {
            error_log('Error en create_cliente_juridico(): ' . $e->getMessage());
            return 0;
        }
    }

    public function create_cliente_telefono($codigoCliente, $numeroClienteTelefono){
        try {
            $registro = "INSERT INTO tbl_clientestelefonos(codigoCliente, numeroClienteTelefono) VALUES (:codigo, :telefono)";
            $sql = $this->conexion->prepare($registro);
            $sql->execute([
                ':codigo' => $codigoCliente,
                ':telefono' => $numeroClienteTelefono,
            ]);
            return 1;
        } catch (PDOException $e) {
            error_log('Error en create_cliente_telefono(): ' . $e->getMessage());
            return 0;
        }
    }

    public function create_representante($cedulaRepresentante, $nombreRepresentante, $apellidoRepresentante){
        try {
            $registro = "INSERT INTO tbl_representantes(cedulaRepresentante, nombreRepresentante, apellidoRepresentante) VALUES (:cedula, :nombre, :apellido)";
            $sql = $this->conexion->prepare($registro);
            $sql->execute([
                ':cedula' => $cedulaRepresentante,
                ':nombre' => $nombreRepresentante,
                ':apellido' => $apellidoRepresentante,
            ]);
            return 1;
        } catch (PDOException $e) {
            error_log('Error en create_representante(): ' . $e->getMessage());
            return 0;
        }
    }

    public function consultar_clientes(){
        try {
            $registro = "SELECT * FROM tbl_clientes";
            $consulta = $this->conexion->prepare($registro);
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log('Error en consultar_clientes(): ' . $e->getMessage());
            return [];
        }
    }
}
