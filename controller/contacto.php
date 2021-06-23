<?php 
    class Contacto extends Controller{
        function __construct()
        {
            parent::__construct();
        }

        function render(){
            $this->view->render("contacto/index");
        }

        public function renderForEmpleados(){
            $this->view->render("contacto/index_emp");
        }
    }

?>