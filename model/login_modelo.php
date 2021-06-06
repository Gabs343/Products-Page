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

        public function findUsuario($datos){
            $existe = false;
            try{
                $query = "SELECT COUNT(*) as existe FROM cliente 
                        WHERE Correo = '$datos[Correo]'";
                $con = $this->db->connect();
                $con = $con->query($query)->fetch();
                if(intval($con["existe"])){
                    $query = "SELECT DNI, Nombre, Contraseña FROM cliente WHERE Correo = '$datos[Correo]'";
                    $con = $this->db->connect();
                    $array = $con->query($query)->fetchAll(PDO::FETCH_ASSOC);
                    foreach($array as $clave){
                        if(password_verify($datos["Pass"], $clave["Contraseña"])){      
                            $existe = true;
                            $_SESSION["Key"] = $clave["DNI"];
                            $_SESSION["Nombre"] = $clave["Nombre"];
                            header("location: perfil");
                        }    
                    }    
                }
                return $existe;
            }catch(PDOException $e){
                return $existe;
            }
        }
    }
?>