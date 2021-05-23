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
            $this->view->categorias = $categorias;
            $this->view->marcas = $marcas;
            $this->view->condiciones = $condiciones;
            $this->view->render("productList/index");
        } 
    }

?>