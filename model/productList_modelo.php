<?php
    require_once "model/Producto.php";
    class ProductListModelo extends Model{
        public function __construct(){
            parent::__construct();
        }

        public function getFiltros($nombre){
            $filtros = [];
            try{
                $query = $this->ConsultFiltro($nombre);
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

        private function ConsultFiltro($nombre){
            $filtro1 = $nombre;
            switch($nombre){
                case "categoria":
                    $filtro2 = "marca";
                    $filtro3 = "condicion";
                    $tabla1 = "rel_categoria_marca";
                    $tabla2 = "rel_categoria_condicion";
                    break;
                case "marca":
                    $filtro2 = "categoria";
                    $filtro3 = "condicion";
                    $tabla1 = "rel_categoria_marca";
                    $tabla2 = "rel_marca_condicion";
                    break;
                case "condicion":
                    $filtro2 = "marca";
                    $filtro3 = "categoria";
                    $tabla1 = "rel_marca_condicion";
                    $tabla2 = "rel_categoria_condicion";
                    break;
            }

            if($_GET[$filtro1] != 0 && $_GET[$filtro2] != 0 && $_GET[$filtro3] != 0){
                $query = "SELECT ID, Nombre FROM $filtro1
                        INNER JOIN $tabla1 ON ID = $tabla1.ID_$filtro1 AND $tabla1.ID_$filtro2 = $_GET[$filtro2]
                        INNER JOIN $tabla2 ON ID = $tabla2.ID_$filtro1 AND $tabla2.ID_$filtro3 = $_GET[$filtro3]
                        WHERE ID = $_GET[$filtro1]";
            }else if($_GET[$filtro1] != 0 && $_GET[$filtro2] != 0 && $_GET[$filtro3] == 0){
               $query = "SELECT ID, Nombre FROM $filtro1
                        INNER JOIN $tabla1 ON ID = $tabla1.ID_$filtro1 AND $tabla1.ID_$filtro2 = $_GET[$filtro2]
                        WHERE ID = $_GET[$filtro1]"; 
            }else if($_GET[$filtro1] != 0 && $_GET[$filtro3] != 0 && $_GET[$filtro2] == 0){
                $query = "SELECT ID, Nombre FROM $filtro1
                        INNER JOIN $tabla2 ON ID = $tabla2.ID_$filtro1 AND $tabla2.ID_$filtro3 = $_GET[$filtro3]
                        WHERE ID = $_GET[$filtro1]"; 
            }else if($_GET[$filtro2] != 0 && $_GET[$filtro3] != 0 && $_GET[$filtro1] == 0){
                $query = "SELECT ID, Nombre FROM $filtro1
                        INNER JOIN $tabla1 ON ID = $tabla1.ID_$filtro1 AND $tabla1.ID_$filtro2 = $_GET[$filtro2]
                        INNER JOIN $tabla2 ON ID = $tabla2.ID_$filtro1 AND $tabla2.ID_$filtro3 = $_GET[$filtro3]";
            }else if($_GET[$filtro2] != 0 && $_GET[$filtro1] == 0 && $_GET[$filtro3] == 0){
                $query = "SELECT * FROM $filtro1 INNER JOIN $tabla1 ON ID = $tabla1.ID_$filtro1 AND $tabla1.ID_$filtro2 = $_GET[$filtro2]";
            }else if($_GET[$filtro3] != 0 && $_GET[$filtro2] == 0 && $_GET[$filtro1] == 0){
                $query = "SELECT * FROM $filtro1 INNER JOIN $tabla2 ON ID = $tabla2.ID_$filtro1 AND $tabla2.ID_$filtro3 = $_GET[$filtro3]";
            }else if($_GET[$filtro1] != 0 && $_GET[$filtro3] == 0 && $_GET[$filtro2] == 0){
                $query = "SELECT * FROM $filtro1 WHERE ID = $_GET[$filtro1]";
            }else{
                $query = "SELECT * FROM $filtro1";
            }
            return $query;
        }

        public function getProductos(){
            $productos = [];
            try{
                if($_GET["orden"] == "ASC" || $_GET["orden"] == "DESC"){
                    $query = "SELECT producto.ID, Nombre, ID_Marca, ID_Categoria, ID_Condicion, Precio, ruta 
                    FROM producto inner join imagen on producto.ID = imagen.ID_Producto
                    ORDER BY Nombre $_GET[orden]";
                }else{
                    $query = "SELECT producto.ID, Nombre, ID_Marca, ID_Categoria, ID_Condicion, Precio, ruta 
                    FROM producto inner join imagen on producto.ID = imagen.ID_Producto ";
                }

                $con = $this->db->connect();
                $con = $con->query($query);

                while($row = $con->fetch()){
                    $producto = new Producto();
                    $producto->id = $row["ID"];
                    $producto->nombre = $row["Nombre"];
                    $producto->idMarca = $row["ID_Marca"];
                    $producto->idCategoria = $row["ID_Categoria"];
                    $producto->idCondicion = $row["ID_Condicion"];
                    $producto->precio = $row["Precio"];
                    $producto->imagen = $row["ruta"];
                    array_push($productos, $producto);
                }
                return $productos;
            }catch(PDOException $e){
                return [];
            }
        }
    }
?>