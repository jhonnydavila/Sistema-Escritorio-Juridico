<?php
    require_once('model/archivador-model.php');

    class ArchivadorController {
        
        public function listar() {
            $model = new ArchivadorModel();
            return $model->consultar_archivador_model();
        }
        
    }