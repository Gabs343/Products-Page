<?php
    class PerfilModelo extends Model{
        public function __construct()
        {
            parent::__construct();
        }

        public function getInfo(){
            $info = null;
            try{
                
                $query = "SELECT * FROM cliente WHERE DNI = $_SESSION[Key]";
                $con = $this->db->connect();
                $con = $con->query($query)->fetch(PDO::FETCH_ASSOC);

                $info = $con;

                return $info;
            }catch(PDOException $e){
                return $info;
            }
        }
    }

?>