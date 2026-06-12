<?php
    require_once('conexion.php');

    class EventoModel extends Conexion {
        private $conex;
        private $codigo;
        private $titulo;
        private $tipo;
        private $descripcion;
        private $estatus;
        private $dia;
        private $hora;
        private $codigoCaso;

        public function __construct(){
            $this->conex = new Conexion();
            $this->conex = $this->conex->Conex();
        }

        public function registrar_evento_model() {
            try {
                $this->generar_codigo_evento();

                $registro = "INSERT INTO tbl_casoeventos (codigoEvento, tituloEvento, tipoEvento, descripcionEvento, estatusEvento, diaEvento, horaEvento, codigoCaso) VALUES (:codigo, :titulo, :tipo, :descripcion, :estatus, :dia, :hora, :caso)";
                $strExec = $this->conex->prepare($registro);
                $strExec->bindParam(':codigo', $this->codigo);
                $strExec->bindParam(':titulo', $this->titulo);
                $strExec->bindParam(':tipo', $this->tipo);
                $strExec->bindParam(':descripcion', $this->descripcion);
                $strExec->bindParam(':estatus', $this->estatus);
                $strExec->bindParam(':dia', $this->dia);
                $strExec->bindParam(':hora', $this->hora);
                $strExec->bindParam(':caso', $this->codigoCaso);
                return $strExec->execute();
            } catch (PDOException $e) {
                error_log('Error en registrar_evento_model(): ' . $e->getMessage());
                exit();
            }
        }

        public function  consultar_evento_model() {
            try {
                if (isset($_SESSION['rolUsuario']) && $_SESSION['rolUsuario'] === 'abogado') {
                    $registro = "SELECT * 
                            FROM 
                                tbl_casoeventos
                            WHERE 
                                codigoCaso IN 
                                    (SELECT codigoCaso FROM tbl_casosabogados WHERE cedulaAbogado = :cedula)
                        ";
                    $consulta = $this->conex->prepare($registro);
                    $consulta->bindParam(':cedula', $_SESSION['cedulaUsuario'], PDO::PARAM_INT);

                } else if (isset($_SESSION['rolUsuario']) && $_SESSION['rolUsuario'] === 'administrador') {
                    $registro = "SELECT * 
                                FROM 
                                    tbl_casoeventos
                        ";
                    $consulta = $this->conex->prepare($registro);
                }
                $consulta->execute();
                $datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
                return $datos;
            } catch (PDOException $e) {
                error_log('Error en consultar_evento_model(): ' . $e->getMessage());
                exit();
            }
        }

        private function generar_codigo_evento() {
            $sql = "SELECT codigoEvento FROM tbl_casoeventos ORDER BY codigoEvento DESC LIMIT 1";
            $consulta = $this->conex->prepare($sql);
            $consulta->execute();
            $ultimo = $consulta->fetch(PDO::FETCH_ASSOC);
            if ($ultimo) {
                $partes = explode('-', $ultimo['codigoEvento']);
                $nuevoNumero = (int)$partes[1] + 1;
                $this->codigo = 'EVE-' . str_pad($nuevoNumero, 5, '0', STR_PAD_LEFT);
            } else {
                $this->codigo = 'EVE-00001';
            }
        }

        public function set_Codigo($codigo) { 
            $this->codigo = $codigo; 
        }
        public function get_Codigo() { 
            return $this->codigo; 
        }

        public function set_Titulo($titulo) { 
            $this->titulo = $titulo; 
        }
        public function get_Titulo() { 
            return $this->titulo; 
        }

        public function set_Tipo($tipo) { 
            $this->tipo = $tipo; 
        }
        public function get_Tipo() { 
            return $this->tipo; 
        }

        public function set_Descripcion($descripcion) { 
            $this->descripcion = $descripcion; 
        }
        public function get_Descripcion() { 
            return $this->descripcion; 
        }
    
        public function set_Estatus($estatus) { 
            $this->estatus = $estatus; 
        }
        public function get_Estatus() { 
            return $this->estatus; 
        }

        public function set_Dia($dia) { 
            $this->dia = $dia; 
        }
        public function get_Dia() { 
            return $this->dia; 
        }

        public function set_Hora($hora) { 
            $this->hora = $hora; 
        }
        public function get_Hora() { 
            return $this->hora; 
        }

        public function set_CodigoCaso($codigoCaso) { 
            $this->codigoCaso = $codigoCaso; 
        }
        public function get_CodigoCaso() { 
            return $this->codigoCaso; 
        }
    }