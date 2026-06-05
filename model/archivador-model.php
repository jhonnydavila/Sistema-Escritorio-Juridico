<?php
    require_once('conexion.php');
    
    class ArchivadorModel extends Conexion {
        private $conex;
        private $codigo;
        private $nombre;
        private $descripcion;
        private $estatus;

        public function __construct(){
            $this->conex = new Conexion();
            $this->conex = $this->conex->Conex();
        }

        public function registrar_archivador_model() {
            try {
                $this->generar_codigo_archivador();
                
                $registro = "INSERT INTO tbl_archivadores (codigoArchivador, nombreArchivador, descripcionArchivador, estatusArchivador) VALUES (:codigo, :nombre, :descripcion, :estatus)";
                $strExec = $this->conex->prepare($registro);
                $strExec->bindParam(':codigo', $this->codigo);
                $strExec->bindParam(':nombre', $this->nombre);
                $strExec->bindParam(':descripcion', $this->descripcion);
                $strExec->bindParam(':estatus', $this->estatus);
                return $strExec->execute();
            } catch (PDOException $e) {
                error_log('Error en registrar_archivador_model(): ' . $e->getMessage());
                exit();
            }
        }

        public function consultar_archivador_model() {
            try {
                $registro = "SELECT 
                                tbl_archivadores.codigoArchivador, 
                                tbl_archivadores.nombreArchivador, 
                                tbl_archivadores.descripcionArchivador, 
                                tbl_archivadores.estatusArchivador, 
                                COUNT(tbl_expedientes.codigoExpediente) AS totalExpedientes 
                            FROM 
                                tbl_archivadores 
                            LEFT JOIN 
                                tbl_expedientes 
                            ON 
                                tbl_archivadores.codigoArchivador = tbl_expedientes.codigoArchivador 
                            GROUP BY 
                                tbl_archivadores.codigoArchivador, 
                                tbl_archivadores.nombreArchivador, 
                                tbl_archivadores.descripcionArchivador, 
                                tbl_archivadores.estatusArchivador
                            ";
                $consulta = $this->conex->prepare($registro);
                $consulta->execute();
                $datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
                return $datos;
            } catch (PDOException $e) {
                error_log('Error en consultar_archivador_model(): ' . $e->getMessage());
                exit();
            }
        }

        private function generar_codigo_archivador() {
            $sql = "SELECT codigoArchivador FROM tbl_archivadores ORDER BY codigoArchivador DESC LIMIT 1";
            $consulta = $this->conex->prepare($sql);
            $consulta->execute();
            $ultimo = $consulta->fetch(PDO::FETCH_ASSOC);
            if ($ultimo) {
                $partes = explode('-', $ultimo['codigoArchivador']);
                $nuevoNumero = (int)$partes[1] + 1;
                $this->codigo = 'ARC-' . str_pad($nuevoNumero, 5, '0', STR_PAD_LEFT);
            } else {
                $this->codigo = 'ARC-00001';
            }
        }

        public function set_Codigo($codigo) { 
            $this->codigo = $codigo; 
        }
        public function get_Codigo() { 
            return $this->codigo; 
        }

        public function set_Nombre($nombre) { 
            $this->nombre = $nombre; 
        }
        public function get_Nombre() { 
            return $this->nombre; 
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
    }