<?php 
    class Model{
        public function __construct()
        {
            $this->db = new Database();
        }

        public function getPerfil(){
            $perfil = null;
            try{
                $query = "SELECT ID_Perfil FROM cliente WHERE DNI = $_SESSION[Key]";
                $con = $this->db->connect();
                $con = $con->query($query)->fetch(PDO::FETCH_ASSOC);
                $perfil = $con;
                return $perfil;
            }catch(PDOException $e){
                return $perfil;
            }
            
        }

    }

?>