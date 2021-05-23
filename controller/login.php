<?php 
    class Login extends Controller{
        function __construct()
        {
            parent::__construct();
        }

        function render(){
            $this->view->render("login/index");
        }

        function buscarUsuario(){
            echo "buscar usuario";
        }

        function ingresarUsuario(){
            $this->render();
        }


    }

?>