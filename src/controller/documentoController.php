<?php
require_once __DIR__ . '/../model/documentoModel.php';

class DocumentoController extends Documento {
    public function create_documento_controller() {
        $this->codigoDocumento = trim($_POST['codigoDocumento'] ?? uniqid('DOC-'));
        $this->nombreDocumento = trim($_POST['NombreDocumento'] ?? '');
        $this->tipoDocumento = trim($_POST['TipoDocumento'] ?? 'documento');
        $this->descripcionDocumento = trim($_POST['DescripcionDocumento'] ?? '');
        $this->estatusDocumento = 'Activo';

        if (empty($this->nombreDocumento)) {
            return "<script>alert('Faltan datos obligatorios para registrar el documento.'); history.back();</script>";
        }

        $result = $this->create_documento();
        if ($result === 1 && !empty($_POST['ExpedienteDocumento'])) {
            $this->create_expediente_documento($this->codigoDocumento, trim($_POST['ExpedienteDocumento']));
        }

        return $result === 1
            ? "<script>alert('Documento registrado con éxito.'); window.location='../../index.php?pagina=documentoRegistrar';</script>"
            : "<script>alert('No se pudo registrar el documento.'); history.back();</script>";
    }

    public function consultar_documentos_controller() {
        return $this->consultar_documentos();
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $response = new DocumentoController();
    echo $response->create_documento_controller();
}
