<?php
require_once __DIR__ . '/conexion.php';

class Abogado extends Conexion {
    private $nombre;
    private $apellido;
    private $cedula;
    private $direccion;
    private $telefono;
    private $correo;
    private $estatus;

    public function __construct(){
        $this->conexion = new Conexion();
        $this->conexion = $this->conexion->Conexion();
    }

    public function create_abogado() {
        try {
            $sql = "INSERT INTO tbl_abogados (nombreAbogado, apellidoAbogado, cedulaAbogado, direccionAbogado, telefonoAbogado, correoAbogado, estatusAbogado) VALUES (:nombre, :apellido, :cedula, :direccion, :telefono, :correo, :estatus)";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bindParam(':nombre', $this->nombre);
            $stmt->bindParam(':apellido', $this->apellido);
            $stmt->bindParam(':cedula', $this->cedula);
            $stmt->bindParam(':direccion', $this->direccion);
            $stmt->bindParam(':telefono', $this->telefono);
            $stmt->bindParam(':correo', $this->correo);
            $stmt->bindParam(':estatus', $this->estatus);
            return $stmt->execute() ? 1 : 0;
        } catch (PDOException $e) {
            error_log('Error en create_abogado(): ' . $e->getMessage());
            return 0;
        }
    }

    public function consultar_abogado() {
        try {
            $registro = "SELECT * FROM tbl_abogados";
            $consulta = $this->conexion->prepare($registro);
            $resul = $consulta->execute();
            $datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
            return $resul ? $datos : [];
        } catch (PDOException $e) {
            error_log('Error en consultar_abogado(): ' . $e->getMessage());
            return [];
        }
    }

    public function obtener_abogado($cedula){
        try {
            $registro = "SELECT * FROM tbl_abogados WHERE cedulaAbogado = :cedula LIMIT 1";
            $consulta = $this->conexion->prepare($registro);
            $consulta->bindParam(':cedula', $cedula);
            $consulta->execute();
            return $consulta->fetch(PDO::FETCH_ASSOC) ?: [];
        } catch (PDOException $e) {
            error_log('Error en obtener_abogado(): ' . $e->getMessage());
            return [];
        }
    }

    public function update_abogado(){
        try {
            $registro = "UPDATE tbl_abogados SET nombreAbogado = :nombre, apellidoAbogado = :apellido, direccionAbogado = :direccion, telefonoAbogado = :telefono, correoAbogado = :correo, estatusAbogado = :estatus WHERE cedulaAbogado = :cedula";
            $sql = $this->conexion->prepare($registro);
            $sql->bindParam(':nombre', $this->nombre);
            $sql->bindParam(':apellido', $this->apellido);
            $sql->bindParam(':direccion', $this->direccion);
            $sql->bindParam(':telefono', $this->telefono);
            $sql->bindParam(':correo', $this->correo);
            $sql->bindParam(':estatus', $this->estatus);
            $sql->bindParam(':cedula', $this->cedula);
            return $sql->execute() ? 1 : 0;
        } catch (PDOException $e) {
            error_log('Error en update_abogado(): ' . $e->getMessage());
            return 0;
        }
    }

    public function delete_abogado(){
        try {
            $registro = "DELETE FROM tbl_abogados WHERE cedulaAbogado = :cedula";
            $sql = $this->conexion->prepare($registro);
            $sql->bindParam(':cedula', $this->cedula);
            return $sql->execute() ? 1 : 0;
        } catch (PDOException $e) {
            error_log('Error en delete_abogado(): ' . $e->getMessage());
            return 0;
        }
    }

    public function set_Nombre($nombre) { $this->nombre = $nombre; }
    public function get_Nombre() { return $this->nombre; }
    public function set_Apellido($apellido) { $this->apellido = $apellido; }
    public function get_Apellido() { return $this->apellido; }
    public function set_Cedula($cedula) { $this->cedula = $cedula; }
    public function get_Cedula() { return $this->cedula; }
    public function set_Direccion($direccion) { $this->direccion = $direccion; }
    public function get_Direccion() { return $this->direccion; }
    public function set_Telefono($telefono) { $this->telefono = $telefono; }
    public function get_Telefono() { return $this->telefono; }
    public function set_Correo($correo) { $this->correo = $correo; }
    public function get_Correo() { return $this->correo; }
    public function set_Estatus($estatus) { $this->estatus = $estatus; }
    public function get_Estatus() { return $this->estatus; }
}
