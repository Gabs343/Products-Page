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
            $this->view->enviar = $this->isSubmit("sendComment");
            $this->view->render("productDetails/index");
        }

        public function renderForEmpleados(){
            if(isset($_GET["id"])){
                $producto = $this->modelo->getProducto();
                $this->view->producto = $producto;
                $comentarios = $this->modelo->getComments();
                $this->view->comentarios = $comentarios;
            }
            $marcas = $this->modelo->getFiltro("marca");
            $categorias = $this->modelo->getFiltro("categoria");
            $condiciones = $this->modelo->getFiltro("condicion");
            $this->view->marcas = $marcas;
            $this->view->categorias = $categorias;
            $this->view->condiciones = $condiciones;
            $this->view->newProduct = !isset($_GET["id"]);
            $this->view->mostrarCom = $this->isSubmit("mostrarComment");
            $this->view->agregar = $this->isSubmit("agregar");
            $this->view->actualizar = $this->isSubmit("actualizar");
            $this->view->render("productDetails/index_emp");
        }

        private function sendComment(){
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

        public function mostrarComment(){
            if($_POST["mostrarComment"] == "Activar"){
                $estado = array(
                    "ID" => intval($_POST["date"]),
                    "Mostrar" => 1 
                );
            }else if($_POST["mostrarComment"] == "Desactivar"){
                $estado = array(
                    "ID" => intval($_POST["date"]),
                    "Mostrar" => 0
                );
            }
            $exito = $this->modelo->actualizarComentario($estado);
            
            if($exito){
                echo "<meta http-equiv='refresh' content='0'>";
            }
        }

        public function actualizar(){
            $datos = array(
                "nombre" => $_POST["nombre"],
                "descripcion" => $_POST["descripcion"],
                "precio" => intval($_POST["precio"]),
                "marca" => intval($_POST["changeMarca"]),
                "condicion"  => intval($_POST["changeCondicion"]),
                "categoria" => intval($_POST["changeCategoria"])
            );
            $exito = $this->modelo->actualizarProducto($datos);
            if($exito){
                //echo "Actualizado con exito";
            }else{
                //echo "error";
            }
        }
    //AGREGANDO AGREGAR
    public function agregar(){
        $nombrea = $_FILES["imagen"]["name"] ; 
        $nombrer = strtolower($nombrea);
        $cd=$_FILES["imagen"]["tmp_name"];
        for($i = 1; ;$i++){
            if(!is_dir("public/img/".$i."/")){
                mkdir("public/img/".$i."/");
                $ruta = "public/img/".$i."/".$nombrer;
                move_uploaded_file($cd, $ruta);
                $datos = array(
                    "nombre" => $_POST["nombre"],
                    "descripcion" => $_POST["descripcion"],
                    "precio" => intval($_POST["precio"]),
                    "marca" => intval($_POST["changeMarca"]),
                    "condicion"  => intval($_POST["changeCondicion"]),
                    "categoria" => intval($_POST["changeCategoria"]),
                    "id" => intval($i)
                );
                $insertar = $this->modelo->agregarProducto($datos);
                break;
            }
        }
    }
    
}

?>