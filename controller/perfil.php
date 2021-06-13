<?php 
    class Perfil extends Controller{
        public function __construct()
        {
            parent::__construct();
        }

        public function render(){
            $info = $this->modelo->getInfo();
            $this->view->info = $info;
            $this->view->render("perfil/index");
        }

        public function renderForEmpleados(){
            $info = $this->modelo->getInfo();
            $this->view->info = $info;
            $this->view->render("perfil/index_emp");
        }
    }

?>