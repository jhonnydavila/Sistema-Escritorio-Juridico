<?php
    require_once __DIR__ . '/../model/abogadoModel.php';

    class AbogadoController extends Abogado {

        public function create_abogado_controller() {
            $obj_abogado = new Abogado();

            $nombre = $_POST['NombreAbogado'];
            $apellido = $_POST['ApellidoAbogado'];
            $cedula = $_POST['CedulaAbogado'];
            $direccion = $_POST['DireccionAbogado'];
            $telefono = $_POST['TelefonoAbogado'];
            $correo = $_POST['CorreoAbogado'];

            $obj_abogado->set_Nombre($nombre);
            $obj_abogado->set_Apellido($apellido);
            $obj_abogado->set_Cedula($cedula);
            $obj_abogado->set_Direccion($direccion);
            $obj_abogado->set_Telefono($telefono);
            $obj_abogado->set_Correo($correo);
            $obj_abogado->set_Estatus("Activo");

            $result = $obj_abogado->create_abogado();
            if ($result == 1){
                return "<script>alert('Registrado con éxito')</script>";
            }else {
                return "<script>alert('No se pudo Registrar')</script>";
            }   
        }

        public function consultar_abogado_controller() {
            $obj_abogado = new Abogado();
            $lista_abogados = $obj_abogado->consultar_abogado();
            return $lista_abogados;
        }
    }

    if (isset($_POST['registrar'])) {
        $response = new AbogadoController();
        echo $response->create_abogado_controller();
    }
?>