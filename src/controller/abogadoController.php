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
        try {
            $obj_abogado = new Abogado();
            $lista_abogados = $obj_abogado->consultar_abogado();
            return is_array($lista_abogados) ? $lista_abogados : [];
        } catch (Exception $e) {
            error_log('Error en consultar_abogado_controller(): ' . $e->getMessage());
            return [];
        }
    }

    public function obtener_abogado_controller($cedula) {
        try {
            $obj_abogado = new Abogado();
            return $obj_abogado->obtener_abogado($cedula);
        } catch (Exception $e) {
            error_log('Error en obtener_abogado_controller(): ' . $e->getMessage());
            return [];
        }
    }

    public function update_abogado_controller() {
        $obj_abogado = new Abogado();
        $obj_abogado->set_Nombre(trim($_POST['NombreAbogado'] ?? ''));
        $obj_abogado->set_Apellido(trim($_POST['ApellidoAbogado'] ?? ''));
        $obj_abogado->set_Direccion(trim($_POST['DireccionAbogado'] ?? ''));
        $obj_abogado->set_Telefono(trim($_POST['TelefonoAbogado'] ?? ''));
        $obj_abogado->set_Correo(trim($_POST['CorreoAbogado'] ?? ''));
        $obj_abogado->set_Estatus(trim($_POST['EstatusAbogado'] ?? 'Activo'));
        $obj_abogado->set_Cedula(trim($_POST['CedulaAbogado'] ?? ''));

        if (empty($obj_abogado->get_Cedula())) {
            return "<script>alert('Cédula es requerida para actualizar.'); history.back();</script>";
        }

        $result = $obj_abogado->update_abogado();
        return $result === 1
            ? "<script>alert('Abogado actualizado con éxito.'); window.location='../../index.php?pagina=abogadoConsultar';</script>"
            : "<script>alert('No se pudo actualizar el abogado.'); history.back();</script>";
    }

    public function delete_abogado_controller() {
        $obj_abogado = new Abogado();
        $obj_abogado->set_Cedula(trim($_POST['CedulaAbogado'] ?? ''));

        if (empty($obj_abogado->get_Cedula())) {
            return "<script>alert('Cédula es requerida para eliminar.'); history.back();</script>";
        }

        $result = $obj_abogado->delete_abogado();
        return $result === 1
            ? "<script>alert('Abogado eliminado con éxito.'); window.location='../../index.php?pagina=abogadoConsultar';</script>"
            : "<script>alert('No se pudo eliminar el abogado.'); history.back();</script>";
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $response = new AbogadoController();
    if (isset($_POST['registrarAbogado'])) {
        echo $response->create_abogado_controller();
    } elseif (isset($_POST['actualizarAbogado'])) {
        echo $response->update_abogado_controller();
    } elseif (isset($_POST['eliminarAbogado'])) {
        echo $response->delete_abogado_controller();
    }
}
?>