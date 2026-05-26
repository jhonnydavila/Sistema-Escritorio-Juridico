<?php
    require_once('model/abogado-model.php');

    class AbogadoController extends AbogadoModel {

        public function registrar_abogado_controller() {
            $objAbogado = new AbogadoModel();

            $strNombre = $_POST['nombreAbogado'];
            $strApellido = $_POST['apellidoAbogado'];
            $strCedula = $_POST['cedulaAbogado'];
            $strDireccion = $_POST['direccionAbogado'];
            $strTelefono = $_POST['telefonoAbogado'];
            $strNacionalidad = $_POST['nacionalidadAbogado'];
            $strCorreo = $_POST['correoAbogado'];

            $objAbogado->set_Nombre($strNombre);
            $objAbogado->set_Apellido($strApellido);
            $objAbogado->set_Cedula($strCedula);
            $objAbogado->set_Direccion($strDireccion);
            $objAbogado->set_Telefono($strTelefono);
            $objAbogado->set_Nacionalidad($strNacionalidad);
            $objAbogado->set_Correo($strCorreo);
            $objAbogado->set_Estatus("Activo");

            $response = $objAbogado->registrar_abogado_model();
            if ($response){
                return '
                    <script>
                        Swal.fire({
                            title: "Abogado Registrado Exitosamente",
                            icon: "success",
                            draggable: true
                        });
                    </script>';
            }else {
                return '
                    <script>
                        Swal.fire({
                        icon: "error",
                        title: "Error...",
                        text: "No se pudo registrar el Abogado"
                    });
                    </script>';
            }   
        }

        public function consultar_abogado_controller() {
            $objAbogado = new AbogadoModel();
            $response = $objAbogado->consultar_abogado_model();
            return $response;
        }
    }
