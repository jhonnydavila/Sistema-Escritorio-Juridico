<?php
    require_once('model/representante-model.php');
    $objRepresentante = new Representante();

    if (isset($_POST['registrarRepresentante'])) {
        $objRepresentante->set_Cedula($_POST['cedulaRepresentante']);
        $objRepresentante->set_Nacionalidad($_POST['nacionalidadRepresentante']);
        $objRepresentante->set_Nombre($_POST['nombreRepresentante']);
        $objRepresentante->set_Apellido($_POST['apellidoRepresentante']);
        $objRepresentante->set_Telefono($_POST['telefonoRepresentante']);

        $response = $objRepresentante->registrar_representante_model();

        if ($response) {
            echo '
                <script>
                    Swal.fire({
                        title: "Representante Registrado",
                        icon: "success",
                        draggable: true
                    });
                </script>
            ';
        } else {
            echo '
                <script>
                    Swal.fire({
                        icon: "error",
                        title: "Error...",
                        text: "No se pudo registrar al representante"
                    });
                </script>
            ';
        }
    }
    else if (isset($_POST['consultarRepresentante'])) {
        $data = $objRepresentante->consultar_representantes_model();
        require_once('view/representanteConsultar-view.php');
    }
    else {
        $data = $objRepresentante->consultar_representantes_model();
        require_once('view/representanteConsultar-view.php');
    }
?>