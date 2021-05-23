<?php 
    class ProductDetails extends Controller{
        public function __construct()
        {
            parent::__construct();
        }

        public function render(){
            $producto = $this->modelo->getProducto($_GET["id"]);
            $comentarios = $this->modelo->getComments($_GET["id"]);
            $puntuarProducto = $this->puntuarProducto($comentarios);
            $this->view->producto = $producto;
            $this->view->comentarios = $comentarios;
            $this->view->puntos = $puntuarProducto;
            $this->view->render("productDetails/index");
        }

        public function Insertar(){
            $datos = array(
                "ID" => intval(date("YmdHis")),
                "Comentario" => $_POST["comentario"],
                "Valoracion" => intval($_POST["valoracion"]),
                "ID_Producto" => 1,
                "ID_Cliente" => 343
               
            );
            var_dump($datos);
            $insertar = $this->modelo->InsertComment($datos);
            $mensaje = '';
            if (!$insertar){
                $mensaje = "no se pudo insertar el comentario";
            }else{
                $mensaje = "comentario insertado con exito"; 
            }
            $this->view->mensaje = $mensaje;
            $this->render();
        }

        public function puntuarProducto($comentarios){
            $numeroComentarios = count($comentarios);
            $sumValor = 0;
            foreach($comentarios as $clave){
                foreach ($clave as $subclave => $subvalor) {
                    if ($subclave == "Valoracion") {
                        $sumValor += $subvalor;
                    }
                } 
            }
            $numeroComentarios == 0 ? $result = 0.0 : $result = $sumValor / $numeroComentarios;
            $result = number_format($result, 1);
            return $result;   
        }
    }

?>