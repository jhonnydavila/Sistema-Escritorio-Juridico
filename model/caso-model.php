<?php
    require_once('conexion.php');

    class CasoModel extends Conexion {
        private $conex;
        
        // Datos del Caso
        private $codigo;
        private $fechaRegistro;
        private $fechaInicio;
        private $fechaFin;
        private $modalidad;
        private $descripcion;
        private $estatus;
        
        // Datos del Expediente (Relación)
        private $codigoCliente;
        private $codigoArchivador;
        private $codigoExpediente;
        
        public function __construct(){
            $this->conex = new Conexion();
            $this->conex = $this->conex->Conex();
        }

        public function registrar_caso_model() {
            try {
                // Iniciar la transacción
                $this->conex->beginTransaction();

                // 1. Crear el Expediente
                $sqlExpediente = "INSERT INTO tbl_expedientes (codigoCliente, codigoArchivador) VALUES (:cliente, :archivador)";
                $stmtExp = $this->conex->prepare($sqlExpediente);
                $stmtExp->bindParam(':cliente', $this->codigoCliente);
                $stmtExp->bindParam(':archivador', $this->codigoArchivador);
                $stmtExp->execute();

                // Capturar el ID generado del expediente (Asumiendo que codigoExpediente es Auto-Incremental en tu BD)
                $this->codigoExpediente = $this->conex->lastInsertId();

                // 2. Crear el Caso usando el ID del expediente recién creado
                $sqlCaso = "INSERT INTO tbl_casos 
                        (codigoCaso, fechaRegistroCaso, fechaInicioCaso, fechaFinCaso, modalidadCaso, descripcionCaso, estatusCaso, codigoExpediente) 
                        VALUES (:codigo, :fechaRegistro, :fechaInicio, :fechaFin, :modalidad, :descripcion, :estatus, :expediente)";
                
                $stmtCaso = $this->conex->prepare($sqlCaso);
                $stmtCaso->bindParam(':codigo', $this->codigo);
                $stmtCaso->bindParam(':fechaRegistro', $this->fechaRegistro);
                $stmtCaso->bindParam(':fechaInicio', $this->fechaInicio);
                $stmtCaso->bindParam(':fechaFin', $this->fechaFin);
                $stmtCaso->bindParam(':modalidad', $this->modalidad);
                $stmtCaso->bindParam(':descripcion', $this->descripcion);
                $stmtCaso->bindParam(':estatus', $this->estatus);
                $stmtCaso->bindParam(':expediente', $this->codigoExpediente);
                $stmtCaso->execute();

                // Si ambos INSERT fueron exitosos, confirmamos los cambios en la BD
                $this->conex->commit();
                return true;

            } catch (PDOException $e) {
                // Si algo falla, revertimos todos los cambios (ni expediente ni caso se guardarán)
                $this->conex->rollBack();
                error_log('Error en registrar_caso_model: ' . $e->getMessage());
                return false;
            }
        }

        public function consultar_casos_model() {
            try {
                $sql = "SELECT * FROM tbl_casos";
                $consulta = $this->conex->prepare($sql);
                $consulta->execute();
                return $consulta->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                error_log('Error en consultar_caso_model: ' . $e->getMessage());
                return [];
            }
        }

        // --- Getters y Setters Caso ---
        public function set_Codigo($codigo) { $this->codigo = $codigo; }
        public function set_FechaRegistro($fechaRegistro) { $this->fechaRegistro = $fechaRegistro; }
        public function set_FechaInicio($fechaInicio) { $this->fechaInicio = $fechaInicio; }
        public function set_FechaFin($fechaFin) { $this->fechaFin = $fechaFin; }
        public function set_Modalidad($modalidad) { $this->modalidad = $modalidad; }
        public function set_Descripcion($descripcion) { $this->descripcion = $descripcion; }
        public function set_Estatus($estatus) { $this->estatus = $estatus; }

        // --- Getters y Setters Expediente ---
        public function set_CodigoCliente($codigoCliente) { $this->codigoCliente = $codigoCliente; }
        public function set_CodigoArchivador($codigoArchivador) { $this->codigoArchivador = $codigoArchivador; }
    }
?>