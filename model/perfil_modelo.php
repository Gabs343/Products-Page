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
        public function chanImagen($nombrer){
            $query = "UPDATE cliente SET 
            Imagen_Perfil='$nombrer' WHERE DNI = $_SESSION[Key]";
                $con = $this->db->connect();
                $con = $con->query($query)->fetch();
                $pagina = "view/perfil/index.php";
                header("Location: perfil");
        }
    }

?>