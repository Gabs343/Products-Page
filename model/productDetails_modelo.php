<?php
    require_once "model/Producto.php";
    class ProductDetailsModelo extends Model
    {
        public function __construct()
        {
            parent::__construct();
        }

        public function getProducto($id){
            $producto = null;
            try{
                $query = "SELECT producto.ID, producto.Nombre, Precio, producto.Descripcion, Ruta
                            FROM producto
                            inner join imagen on producto.ID = imagen.ID_Producto
                            WHERE producto.ID = $id";
                $con = $this->db->connect();
                $con = $con->query($query)->fetch();
                
                $producto = new Producto();
                $producto->id = $con["ID"];
                $producto->nombre = $con["Nombre"];
                $producto->precio = $con["Precio"];
                $producto->descripcion = $con["Descripcion"];
                $producto->imagen = $con["Ruta"];

                $especificaciones = array();

                $query = "SELECT especificacion.Nombre, esp_descripcion.Descripcion FROM esp_descripcion
                INNER JOIN especificacion ON especificacion.ID = ID_Especificacion 
                WHERE ID_Producto = $id";

                $con = $this->db->connect();
                $con = $con->query($query);   
                
                while($row = $con->fetch()){
                    array_push($especificaciones, $row);
                }

                $producto->especificaciones = $especificaciones;

                return $producto;
            }catch(PDOException $e){
                return $producto;
            }
        }

        public function InsertComment($datos){
            $query = "INSERT INTO comentario (ID, Comentario, Valoracion, Fecha, ID_Producto, ID_Cliente) VALUES
                        (:ID, :Comentario, :Valoracion, now(), :ID_Producto, :ID_Cliente)";
            $con = $this->db->connect();
            $con = $con->prepare($query);

            if($con->execute($datos)){
                return true;
            }else{
                return false;
            }
        }

        public function getComments($id){
            $comentarios = [];
            try{
                $query = "SELECT cliente.Nombre, Comentario, Valoracion, Fecha FROM comentario
                        INNER JOIN cliente ON ID_Cliente = cliente.DNI 
                        WHERE ID_Producto = $id";
                $con = $this->db->connect();
                $con = $con->query($query);

                while($row = $con->fetch(PDO::FETCH_ASSOC)){
                    array_push($comentarios, $row);
                }
                return $comentarios;
            }catch(PDOException $e){
                return [];
            }

        }
    }
?>