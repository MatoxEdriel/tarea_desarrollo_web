<?php
require_once __DIR__ . '/config.php';

class Conexion {
    public static function getConexion() {
        try {
            $host = DB_HOST; 
            $dbname = DBNAME;
            $user = DB_USER;
            $pass = DB_PASS;
           
            $port = 3306; 

            $dsn = "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8";
            
            $con = new PDO($dsn, $user, $pass);
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $con;
            
        } catch (PDOException $e) {
            die("Error crítico de conexión: " . $e->getMessage());
        }
    }
}
?>