<?php
require_once __DIR__ . '/conexion.php';

class Usuario extends Conexion {
    private $id;
    private $nombre;
    private $apellido;
    private $cedula;
    private $correo;
    private $passwordHash;
    private $fechaNacimiento;
    private $direccion;
    private $rolId;
    private $fraseSecretaHash;
    private $estatus;

    public function __construct() {
        $this->conexion = new Conexion();
        $this->conexion = $this->conexion->Conexion();
    }

    public function create_usuario() {
        try {
            $query = "INSERT INTO tbl_usuarios (nombreUsuario, apellidoUsuario, cedulaUsuario, correoUsuario, passwordHash, fechaNacimientoUsuario, direccionUsuario, idRol, fraseSecretaHash, estatusUsuario) VALUES (:nombre, :apellido, :cedula, :correo, :password, :fechaNacimiento, :direccion, :rolId, :fraseSecreta, :estatus)";
            $stmt = $this->conexion->prepare($query);
            $stmt->bindParam(':nombre', $this->nombre);
            $stmt->bindParam(':apellido', $this->apellido);
            $stmt->bindParam(':cedula', $this->cedula);
            $stmt->bindParam(':correo', $this->correo);
            $stmt->bindParam(':password', $this->passwordHash);
            $stmt->bindParam(':fechaNacimiento', $this->fechaNacimiento);
            $stmt->bindParam(':direccion', $this->direccion);
            $stmt->bindParam(':rolId', $this->rolId);
            $stmt->bindParam(':fraseSecreta', $this->fraseSecretaHash);
            $stmt->bindParam(':estatus', $this->estatus);
            return $stmt->execute() ? 1 : 0;
        } catch (PDOException $e) {
            error_log('Error en create_usuario(): ' . $e->getMessage());
            return 0;
        }
    }

    public function listar_usuarios() {
        try {
            $query = "SELECT u.idUsuario, u.nombreUsuario, u.apellidoUsuario, u.cedulaUsuario, u.correoUsuario, u.fechaNacimientoUsuario, u.direccionUsuario, u.estatusUsuario, r.nombreRol FROM tbl_usuarios u JOIN tbl_roles r ON u.idRol = r.idRol ORDER BY u.nombreUsuario";
            $stmt = $this->conexion->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC) ?: [];
        } catch (PDOException $e) {
            error_log('Error en listar_usuarios(): ' . $e->getMessage());
            return [];
        }
    }

    public function obtener_por_login($login) {
        try {
            $query = "SELECT u.*, r.nombreRol, r.permisosRol FROM tbl_usuarios u JOIN tbl_roles r ON u.idRol = r.idRol WHERE u.correoUsuario = :login OR u.cedulaUsuario = :login LIMIT 1";
            $stmt = $this->conexion->prepare($query);
            $stmt->bindParam(':login', $login);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC) ?: [];
        } catch (PDOException $e) {
            error_log('Error en obtener_por_login(): ' . $e->getMessage());
            return [];
        }
    }

    public function obtener_por_login_y_frase($login, $frase) {
        try {
            $query = "SELECT u.idUsuario, u.correoUsuario, u.cedulaUsuario, u.nombreUsuario, u.apellidoUsuario FROM tbl_usuarios u WHERE (u.correoUsuario = :login OR u.cedulaUsuario = :login) LIMIT 1";
            $stmt = $this->conexion->prepare($query);
            $stmt->bindParam(':login', $login);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if (!$user) {
                return [];
            }

            $query2 = "SELECT fraseSecretaHash FROM tbl_usuarios WHERE idUsuario = :idUsuario LIMIT 1";
            $stmt2 = $this->conexion->prepare($query2);
            $stmt2->bindParam(':idUsuario', $user['idUsuario']);
            $stmt2->execute();
            $data = $stmt2->fetch(PDO::FETCH_ASSOC);
            if ($data && password_verify($frase, $data['fraseSecretaHash'])) {
                return $user;
            }

            return [];
        } catch (PDOException $e) {
            error_log('Error en obtener_por_login_y_frase(): ' . $e->getMessage());
            return [];
        }
    }

    public function actualizar_password($idUsuario, $hash) {
        try {
            $query = "UPDATE tbl_usuarios SET passwordHash = :password, updatedAt = CURRENT_TIMESTAMP WHERE idUsuario = :idUsuario";
            $stmt = $this->conexion->prepare($query);
            $stmt->bindParam(':password', $hash);
            $stmt->bindParam(':idUsuario', $idUsuario);
            return $stmt->execute() ? 1 : 0;
        } catch (PDOException $e) {
            error_log('Error en actualizar_password(): ' . $e->getMessage());
            return 0;
        }
    }

    public function listar_roles() {
        try {
            $query = "SELECT idRol, nombreRol, descripcionRol FROM tbl_roles ORDER BY idRol";
            $stmt = $this->conexion->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC) ?: [];
        } catch (PDOException $e) {
            error_log('Error en listar_roles(): ' . $e->getMessage());
            return [];
        }
    }

    public function set_Nombre($nombre) { $this->nombre = $nombre; }
    public function get_Nombre() { return $this->nombre; }
    public function set_Apellido($apellido) { $this->apellido = $apellido; }
    public function get_Apellido() { return $this->apellido; }
    public function set_Cedula($cedula) { $this->cedula = $cedula; }
    public function get_Cedula() { return $this->cedula; }
    public function set_Correo($correo) { $this->correo = $correo; }
    public function get_Correo() { return $this->correo; }
    public function set_PasswordHash($hash) { $this->passwordHash = $hash; }
    public function set_FechaNacimiento($fechaNacimiento) { $this->fechaNacimiento = $fechaNacimiento; }
    public function get_FechaNacimiento() { return $this->fechaNacimiento; }
    public function set_Direccion($direccion) { $this->direccion = $direccion; }
    public function get_Direccion() { return $this->direccion; }
    public function set_RolId($rolId) { $this->rolId = $rolId; }
    public function get_RolId() { return $this->rolId; }
    public function set_FrasesSecretaHash($hash) { $this->fraseSecretaHash = $hash; }
    public function set_Estatus($estatus) { $this->estatus = $estatus; }
    public function get_Estatus() { return $this->estatus; }
}
?>