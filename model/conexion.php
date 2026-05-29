<?php
    require_once ('config/config.php');

    class Conexion extends PDO {
        private $conexion;
        
        public function __construct(){
            try {
                $strConexion = "mysql:host="._DB_HOST_.";dbname="._DB_NAME_.";charset=utf8";
                $options = [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_EMULATE_PREPARES => false,
                ];
                $this->conexion = new PDO($strConexion, _DB_USER_, _DB_PASS_, $options);
            }
            catch (PDOException $e) {
                error_log("Conexión Fallida".$e->getMessage());
                exit();
            }
        }

        protected function Conexion(){
            return  $this->conexion; 
        }

        protected function generarCodigoAleatorio(string $letras) {
            $prefijo = strtoupper(substr(trim($letras), 0, 3));
            
            try {
                $numeroAleatorio = random_int(0, 999999);
            } catch (\Exception $e) {
                $numeroAleatorio = mt_rand(0, 999999);
            }
            
            $numeroFormateado = str_pad($numeroAleatorio, 5, "0", STR_PAD_LEFT);
            
            return "{$prefijo}-{$numeroFormateado}";
        }
    }