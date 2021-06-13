<?php 
    class ProductDetails extends Controller{
        public function __construct()
        {
            parent::__construct();
        }

        public function render(){
            $producto = $this->modelo->getProducto();
            $comentarios = $this->modelo->getComments();
            $puntuarProducto = $this->puntuarProducto($comentarios);
            $this->view->producto = $producto;
            $this->view->comentarios = $comentarios;
            $this->view->puntos = $puntuarProducto;
            $this->view->enviar = $this->isSubmit();
            $this->view->render("productDetails/index");
        }

        public function renderForEmpleados(){
            $producto = $this->modelo->getProducto();
            $comentarios = $this->modelo->getComments();
            $this->view->producto = $producto;
            $this->view->comentarios = $comentarios;
            $this->view->render("productDetails/index_emp");
        }

        public function isSubmit(){
            if(isset($_POST["sendComment"])){
                $this->Insertar();
            }   
        }

        private function Insertar(){
            $datos = array(
                "ID" => intval(date("YmdHis")),
                "Comentario" => $_POST["comentario"],
                "Valoracion" => intval($_POST["valoracion"]),
                "ID_Producto" => $_GET["id"],
                "ID_Cliente" => empty($_SESSION) ? 0 : $_SESSION["Key"],
                "Ip" => gethostbyname(php_uname("n"))
               
            );
            $insertar = $this->modelo->InsertComment($datos);
            $mensaje = '';
            if (!$insertar){
                $mensaje = "no se pudo insertar el comentario";
            }else{
                $mensaje = "comentario insertado con exito"; 
            }
            $this->view->mensaje = $mensaje;
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