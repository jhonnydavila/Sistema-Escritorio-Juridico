<?php
    require_once('conexion.php');

    class ClienteJuridicoModel extends Conexion {
        private $conex;
        
        // Datos Empresa
        private $codigoCliente;
        private $razonSocial;
        private $tipoRif;
        private $rif;
        private $fechaConstitucion;
        
        // Datos Representante
        private $cedulaRepresentante;
        private $rolRepresentante;


        public function __construct(){
            $this->conex = new Conexion();
            $this->conex = $this->conex->Conex();
        }

        public function registrar_cliente_juridico_model() {
            try {
                $sql = "INSERT INTO tbl_clientesjuridicos (codigoCliente, razonSocialClienteJuridico, tipoRifClienteJuridico, rifClienteJuridico, fechaConstitucionClienteJuridico) VALUES (:codigo, :razonSocial, :tipoRif, :rif, :fechaConstitucion)";
                
                $stmt = $this->conex->prepare($sql);
                $stmt->bindParam(':codigo', $this->codigoCliente);
                $stmt->bindParam(':razonSocial', $this->razonSocial);
                $stmt->bindParam(':tipoRif', $this->tipoRif);
                $stmt->bindParam(':rif', $this->rif);
                $stmt->bindParam(':fechaConstitucion', $this->fechaConstitucion);
                $stmt->execute();

                $sqlRep = "INSERT INTO tbl_representantesjuridicos (codigoCliente, cedulaRepresentante, rolRepresentanteJuridico) VALUES (:codigo, :cedula, :rol)";
                $stmtRep = $this->conex->prepare($sqlRep);
                $stmtRep->bindParam(':codigo', $this->codigoCliente);
                $stmtRep->bindParam(':cedula', $this->cedulaRepresentante);
                $stmtRep->bindParam(':rol', $this->rolRepresentante);
                return $stmtRep->execute();
            } catch (PDOException $e) {
                error_log('Error en registrar_cliente_juridico_model: ' . $e->getMessage());
                return false;
            }
        }

        // Getters y Setters
        public function set_CodigoCliente($codigo) { $this->codigoCliente = $codigo; }
        public function set_RazonSocial($razon) { $this->razonSocial = $razon; }
        public function set_TipoRif($tipo) { $this->tipoRif = $tipo; }
        public function set_Rif($rif) { $this->rif = $rif; }
        public function set_FechaConstitucion($fecha) { $this->fechaConstitucion = $fecha; }
        
        public function set_CedulaRepresentante($cedula) { $this->cedulaRepresentante = $cedula; }
        public function set_RolRepresentante($rol) { $this->rolRepresentante = $rol; }
    }
?>