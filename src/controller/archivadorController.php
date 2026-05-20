<?php
require_once __DIR__ . '/../model/archivadorModel.php';

class ArchivadorController extends Archivador {
    public function create_archivador_controller() {
        $this->numeroArchivador = trim($_POST['codigoArchivador'] ?? '');
        $this->descripcionArchivador = trim($_POST['descripcionArchivador'] ?? '');
        $this->estatusArchivador = 'Activo';

        if (empty($this->numeroArchivador) || empty($this->descripcionArchivador)) {
            return "<script>alert('Faltan datos obligatorios para registrar el archivador.'); history.back();</script>";
        }

        $result = $this->create_archivador();
        return $result === 1
            ? "<script>alert('Archivador registrado con éxito.'); window.location='../../index.php?pagina=archivadorRegistrar';</script>"
            : "<script>alert('No se pudo registrar el archivador.'); history.back();</script>";
    }

    public function consultar_archivadores_controller() {
        return $this->consultar_archivadores();
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $response = new ArchivadorController();
    echo $response->create_archivador_controller();
}
