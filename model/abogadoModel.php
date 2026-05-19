<?php
    require_once 'conexion.php';
	class Abogado extends Conexion {
		// atributos
		private $nombre;
		private $apellido;
		private $cedula;
		private $direccion;
		private $telefono;
		private $correo;
		private $estatus;
		
		// constructor
		public function __construct(){
			$this->conexion = new Conexion();
			$this->conexion = $this->conexion->Conexion();
		}

		// métodos CRUD
		public function create_abogado(){

			$registro = "INSERT INTO tbl_abogados(nombreAbogado,apellidoAbogado,cedulaAbogado,direccionAbogado,telefonoAbogado,correoAbogado,estatusAbogado) VALUES (:nombre,:apellido,:cedula,:direccion,:telefono,:correo,:estatus)";

				$sql = $this->conexion->prepare($registro);
				$sql->bindParam(':nombre', $this->nombre);
				$sql->bindParam(':apellido', $this->apellido);
				$sql->bindParam(':cedula', $this->cedula);
				$sql->bindParam(':direccion', $this->direccion);
				$sql->bindParam(':telefono', $this->telefono);
				$sql->bindParam(':correo', $this->correo);
				$sql->bindParam(':estatus', $this->estatus);
				$resul= $sql->execute();
				if ($resul) {
					$response = 1;
				}else{
					$response = 0;
				}
				return $response;
		}

		public function consultar_abogado(){
			$registro = "SELECT * FROM tbl_abogados";
			$consulta = $this->conexion->prepare($registro);
			$resul = $consulta->execute();
			
			$datos=$consulta->fetchAll(PDO::FETCH_ASSOC);
			if ($resul) {
				return $datos;
			}
		}

		//metodos Getter y Setter
		public function get_Nombre(){
			return $this->nombre;
		}
		public function set_Nombre($nombre){
			$this->nombre=$nombre;
		}

		public function get_Apellido(){
			return $this->apellido;
		}
		public function set_Apellido($apellido){
			$this->apellido=$apellido;
		}

		public function get_Cedula(){
			return $this->cedula;
		}
		public function set_Cedula($cedula){
			$this->cedula=$cedula;
		}

		public function get_Direccion(){
			return $this->direccion;
		}
		public function set_Direccion($direccion){
			$this->direccion=$direccion;
		}
		
		public function get_Telefono(){
			return $this->telefono;
		}
		public function set_Telefono($telefono){
			$this->telefono=$telefono;
		}

		public function get_Correo(){
			return $this->correo;
		}
		public function set_Correo($correo){
			$this->correo=$correo;
		}

		public function get_Estatus(){
			return $this->estatus;
		}
		public function set_Estatus($estatus){
			$this->estatus=$estatus;
		}
	}