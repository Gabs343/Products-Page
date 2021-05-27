<?php 
    class Main extends Controller{
        function __construct()
        {
            parent::__construct();
            $this->view->productos = "";
        }

        function render(){
            $productosNuevos = $this->modelo->getProductos("Nuevo");
            $productosDestacados = $this->modelo->getProductos("Destacado");
            $banners = $this->modelo->getBanners();
            $this->view->productosNuevos = $productosNuevos;
            $this->view->productosDestacados = $productosDestacados;
            $this->view->banners = $banners;
            $this->view->render("main/index");
        }
    }

?>