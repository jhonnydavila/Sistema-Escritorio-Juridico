<?php
require_once __DIR__ . '/../model/eventoModel.php';

class EventoController extends Evento {
    public function create_evento_controller() {
        $this->codigoEvento = trim($_POST['codigoEvento'] ?? uniqid('EVE-'));
        $this->tituloEvento = trim($_POST['nombreEvento'] ?? '');
        $this->fechaEvento = trim($_POST['fechaEvento'] ?? date('Y-m-d'));
        $this->descripcionEvento = trim($_POST['descripcionEvento'] ?? '');
        $this->estatusEvento = 'Programado';
        $this->tipoEvento = trim($_POST['tipoEvento'] ?? 'General');
        $this->codigoCaso = trim($_POST['codigoCaso'] ?? '');

        if (empty($this->tituloEvento)) {
            return "<script>alert('Faltan datos obligatorios para registrar el evento.'); history.back();</script>";
        }

        $result = $this->create_evento();
        return $result === 1
            ? "<script>alert('Evento registrado con éxito.'); window.location='../../index.php?pagina=eventoRegistrar';</script>"
            : "<script>alert('No se pudo registrar el evento.'); history.back();</script>";
    }

    public function consultar_eventos_controller() {
        return $this->consultar_eventos();
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $response = new EventoController();
    echo $response->create_evento_controller();
}
