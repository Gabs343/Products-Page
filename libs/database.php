<?php 
    class Database{
        private $host;
        private $db;
        private $user;
        private $pass;
        private $port;

        function __construct()
        {
            $this->host = constant("HOST");
            $this->db = constant("DB");
            $this->user = constant("USER");
            $this->pass = constant("PASS");
            $this->port = constant("PORT");
        }

        function connect(){
            try{
                $connection = "mysql:host=".$this->host.";port=".$this->port.";dbname=".$this->db;
                $options = [
                    PDO::ATTR_ERRMODE           => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_EMULATE_PREPARES  => false,
                ];
                $pdo = new PDO($connection, $this->user, $this->pass, $options);
                return $pdo;
            }catch(PDOException $e){
                print_r('Error en Conexion : '. $e->getMessage());
            }   
        }  
    }

?>