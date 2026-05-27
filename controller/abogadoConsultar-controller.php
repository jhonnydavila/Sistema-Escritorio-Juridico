<?php
    $page = 'abogadoConsultar';
    if(is_file('view/'.$page.'-view.php')){ 
        require_once('controller/abogado-controller.php');

        $objAbogado = new AbogadoController();
        $data = $objAbogado->consultar_abogado_controller();

        require_once('view/'.$page.'-view.php');
    }else{
        echo '
            <script>
                Swal.fire({
                    icon: "error",
                    title: "Error...",
                    text: "No se pudo acceder a la página"
                });
            </script>';
    }