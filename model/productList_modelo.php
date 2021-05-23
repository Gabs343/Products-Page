<?php
    class ProductListModelo extends Model{
        public function __construct(){
            parent::__construct();
        }

        public function getFiltros($nombre){
            $filtros = [];
            try{
                $query = "SELECT * FROM $nombre";
                $con = $this->db->connect();
                $con = $con->query($query);

                while($row = $con->fetch(PDO::FETCH_ASSOC)){
                    array_push($filtros, $row);
                }
                return $filtros;
            }catch(PDOException $e){
                return [];
            }
        }   
    }
?>