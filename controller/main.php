<?php 
    class Main extends Controller{
        public function __construct()
        {
            parent::__construct();
            $this->view->productos = "";
        }

        public function render(){
            $productosNuevos = $this->modelo->getProductos("Nuevo");
            $productosDestacados = $this->modelo->getProductos("Destacado");
            $banners = $this->modelo->getBanners();
            $this->view->productosNuevos = $productosNuevos;
            $this->view->productosDestacados = $productosDestacados;
            $this->view->banners = $banners;
            $this->view->render("main/index");
        }

        public function renderForEmpleados(){
            $clientes = $this->modelo->getClientes();
            $this->view->clientes = $clientes;
            $this->view->setPerfil = $this->isSubmit("setPerfil");
            $this->view->render("main/index_emp");
        }

        public function isSubmit($form){
            if(isset($_POST[$form])){
                $this->{$form}();
            }   
        }

        public function setPerfil(){
            $perfil = array(
                "key" => $_POST["key"],
                "perfil" => intval($_POST["perfil"]));
            $insertar =  $this->modelo->actualizarPerfil($perfil);
            if($insertar){
                echo "<meta http-equiv='refresh' content='0'>";
            }
        }
    }

?>