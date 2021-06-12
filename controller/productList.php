<?php
    class ProductList extends Controller{
        public function __construct()
        {
            parent::__construct();
        }

        public function render(){
            $categorias = $this->modelo->getFiltros("categoria");
            $marcas = $this->modelo->getFiltros("marca");
            $condiciones = $this->modelo->getFiltros("condicion");
            $productos = $this->modelo->getProductos();
            $this->view->categorias = $categorias;
            $this->view->marcas = $marcas;
            $this->view->condiciones = $condiciones;
            $this->view->productos = $productos;
            $this->view->render("productList/index");
        }

        public function renderForEmpleados(){ //unir con la funcion de render
            $categorias = $this->modelo->getFiltros("categoria");
            $marcas = $this->modelo->getFiltros("marca");
            $condiciones = $this->modelo->getFiltros("condicion");
            $productos = $this->modelo->getProductos();
            $this->view->categorias = $categorias;
            $this->view->marcas = $marcas;
            $this->view->condiciones = $condiciones;
            $this->view->productos = $productos;
            $this->view->mostrar = $this->isSubmit("mostrarProducto");
            $this->view->editar = $this->isSubmit("editarProducto");
            $this->view->render("productList/index_emp");
        }

        public function isSubmit($form){
            if(isset($_POST[$form])){
                $this->{$form}();
            }
        }

        public function mostrarProducto(){
            
            if($_POST["mostrarProducto"] == "Activar"){
                $estado = array(
                    "ID" => intval($_POST["ID"]),
                    "Activo" => 1 
                );
            }else if($_POST["mostrarProducto"] == "Desactivar"){
                $estado = array(
                    "ID" => intval($_POST["ID"]),
                    "Activo" => 0 
                );
            }
            $exito = $this->modelo->actualizarProducto($estado);

            if($exito){
                //echo "EXITO";
                echo "<meta http-equiv='refresh' content='0'>";
            }
        }

        public function editarProducto(){
            echo "editar";
        }

    }

?>