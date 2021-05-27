<?php
    require_once "model/Producto.php";
    class MainModelo extends Model{
        public function __construct(){
            parent::__construct();
        }

        public function getProductos($condicion){
            $productos = [];
            try{
                $query = "SELECT producto.ID, producto.Nombre, Precio, ruta FROM producto
                inner join imagen on producto.ID = imagen.ID_Producto
                inner join condicion ON ID_Condicion = condicion.ID
                WHERE condicion.Nombre = '$condicion'";
                $con = $this->db->connect();
                $con = $con->query($query);
                
                while($row = $con->fetch()){
                    $producto = new Producto();
                    $producto->id = $row["ID"];
                    $producto->nombre = $row["Nombre"];
                    $producto->precio = $row["Precio"];
                    $producto->imagen = $row["ruta"];
                    array_push($productos, $producto);

                }
                return $productos;
            }catch(PDOException $e){
                return [];
            }
        }

        public function getBanners(){
            $banners = [];
            try{
                $query = "SELECT ruta FROM banners";
                $con = $this->db->connect();
                $con = $con->query($query);
                while($row = $con->fetch()){
                    $banner = $row["ruta"];
                    array_push($banners, $banner);
                }
                return $banners;
            }catch(PDOException $e){
                return [];
            }
        }
    }

?>