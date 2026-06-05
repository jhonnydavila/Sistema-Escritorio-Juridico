<?php
    require_once('config/config.php');

    class Conexion extends PDO {
        private $conex;
        
        public function __construct(){
            try {
                $strConexion = "mysql:host="._DB_HOST_.";dbname="._DB_NAME_.";charset=utf8";
                $options = [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_EMULATE_PREPARES => false,
                ];
                $this->conex = new PDO($strConexion, _DB_USER_, _DB_PASS_, $options);
            }
            catch (PDOException $e) {
                error_log("Conexión Fallida".$e->getMessage());
                exit();
            }
        }

        protected function Conex(){
            return  $this->conex; 
        }
    }