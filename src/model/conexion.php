<?php
require_once __DIR__ . '/../config/config.php';

class Conexion extends PDO {
    protected $conexion;
        
        public function __construct(){
            $conexstring = "mysql:host="._DB_HOST_.";dbname="._DB_NAME_.";charset=utf8";
            try {
                $this->conexion = new PDO($conexstring, _DB_USER_, _DB_PASS_);
                $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            catch (PDOException $e) {
                die ("Conexión Fallida".$e->getMessage());
            }
        }

        protected function Conexion(){
            return  $this->conexion; 
        }
    }
?>