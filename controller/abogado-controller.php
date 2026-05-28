<?php
    require_once('model/abogado-model.php');
    
    class AbogadoController extends AbogadoModel {

        public function registrar_abogado_controller() {

            $strNombre = $_POST['nombreAbogado'];
            $strApellido = $_POST['apellidoAbogado'];
            $strCedula = $_POST['cedulaAbogado'];
            $strDireccion = $_POST['direccionAbogado'];
            $strTelefono = $_POST['telefonoAbogado'];
            $strNacionalidad = $_POST['nacionalidadAbogado'];
            $strCorreo = $_POST['correoAbogado'];
            
            AbogadoModel::set_Nombre($strNombre);
            AbogadoModel::set_Apellido($strApellido);
            AbogadoModel::set_Cedula($strCedula);
            AbogadoModel::set_Direccion($strDireccion);
            AbogadoModel::set_Telefono($strTelefono);
            AbogadoModel::set_Nacionalidad($strNacionalidad);
            AbogadoModel::set_Correo($strCorreo);
            AbogadoModel::set_Estatus("Activo");

            $response = AbogadoModel::registrar_abogado_model();
            if ($response){
                return '
                    <script>
                        Swal.fire({
                            title: "Abogado Registrado Exitosamente",
                            icon: "success",
                            draggable: true
                        });
                    </script>
                ';
            }else {
                return '
                    <script>
                        Swal.fire({
                        icon: "error",
                        title: "Error...",
                        text: "No se pudo registrar el Abogado"
                    });
                    </script>
                ';
            }   
        }

        public function consultar_abogado_controller() {
            $response = AbogadoModel::consultar_abogado_model();
            return $response;
        }
    }
