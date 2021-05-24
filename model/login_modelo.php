<?php
    class LoginModelo extends Model{
        public function __construct()
        {
            parent::__construct();
        }

        public function insertSubscriptor($datos){
            $query = "INSERT INTO cliente (DNI, Nombre, Apellido, Correo, Contraseña) VALUES
            (:DNI, :Nombre, :Apellido, :Correo, :Pass)";
            $con = $this->db->connect();
            $con = $con->prepare($query);

            if($con->execute($datos)){
                return true;
            }else{
                return false;
            }
        }
    }
?>