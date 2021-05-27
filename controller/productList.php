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
    }

?>