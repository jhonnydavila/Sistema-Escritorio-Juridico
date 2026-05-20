<?php
require_once __DIR__ . '/../model/clienteModel.php';

class ClienteController extends Cliente {
    public function create_cliente_controller() {
        $this->codigoCliente = trim($_POST['codigoCliente'] ?? '');
        $this->correoCliente = trim($_POST['CorreoCliente'] ?? '');
        $this->direccionCliente = trim($_POST['DireccionCliente'] ?? '');
        $this->estatusCliente = 'Activo';
        $this->fechaRegistroCliente = date('Y-m-d');
        $this->tipoCliente = strtolower(trim($_POST['TipoCliente'] ?? 'natural'));

        if (empty($this->codigoCliente) || empty($this->correoCliente) || empty($this->direccionCliente)) {
            return "<script>alert('Faltan datos obligatorios para registrar el cliente.'); history.back();</script>";
        }

        $result = $this->create_cliente();
        if ($result === 1) {
            if ($this->tipoCliente === 'natural') {
                $this->create_cliente_natural(
                    $this->codigoCliente,
                    trim($_POST['NombreCliente'] ?? ''),
                    trim($_POST['ApellidoCliente'] ?? ''),
                    trim($_POST['CedulaCliente'] ?? ''),
                    trim($_POST['NacionalidadCliente'] ?? ''),
                    trim($_POST['FechaNacimientoCliente'] ?? ''),
                    trim($_POST['EstadoCivilCliente'] ?? '')
                );
            } elseif ($this->tipoCliente === 'juridico') {
                $this->create_representante(
                    trim($_POST['CedulaRepresentanteCliente'] ?? ''),
                    trim($_POST['NombreRepresentanteCliente'] ?? ''),
                    trim($_POST['ApellidoRepresentanteCliente'] ?? '')
                );
                $this->create_cliente_juridico(
                    $this->codigoCliente,
                    trim($_POST['CedulaRepresentanteCliente'] ?? ''),
                    trim($_POST['RazonSocialCliente'] ?? ''),
                    trim($_POST['FechaConstitucionCliente'] ?? date('Y-m-d')),
                    trim($_POST['RifCliente'] ?? '')
                );
            }

            if (!empty($_POST['TelefonoCliente'])) {
                $this->create_cliente_telefono($this->codigoCliente, trim($_POST['TelefonoCliente']));
            }

            return "<script>alert('Cliente registrado con éxito.'); window.location='../../index.php?pagina=clienteConsultar';</script>";
        }

        return "<script>alert('No se pudo registrar el cliente.'); history.back();</script>";
    }

    public function consultar_clientes_controller() {
        return $this->consultar_clientes();
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $response = new ClienteController();
    echo $response->create_cliente_controller();
}
