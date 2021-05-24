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
                    $query = "SELECT Nombre, Correo, Contraseña FROM cliente WHERE Correo = '$datos[Correo]'";
                    $con = $this->db->connect();
                    $usuario = $con->query($query)->fetchAll(PDO::FETCH_ASSOC);
                    foreach($usuario as $clave){
                        if(password_verify($datos["Pass"], $clave["Contraseña"])){
                            $existe = true;
                            return $existe;
                        }else{
                            return $existe;
                        }
                    }
                }else{
                    return $existe;
                }
            }catch(PDOException $e){
                return $existe;
            }
        }
    }
?>