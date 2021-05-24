<?php 
    class Login extends Controller{
        public function __construct()
        {
            parent::__construct();
        }

        public function render(){
            $this->view->subs = $this->isSubmit("sendSubs");
            $this->view->render("login/index");
        }

        public function isSubmit($form){
            if(isset($_POST[$form])){
                $this->{$form}();
            }
        }

        public function sendSubs(){
            $datos = array(
                "DNI" => intval($_POST["pk"]),
                "Nombre" => $_POST["nombre"],
                "Apellido" => $_POST["apellido"],
                "Correo" => $_POST["correo"],
                "Pass" => password_hash($_POST["pwd"], PASSWORD_DEFAULT)
            );
            $insertar = $this->modelo->insertSubscriptor($datos);
            if (!$insertar){
                $mensaje = "no se pudo insertar el usuario";
            }else{
                $mensaje = "usuario insertado con exito"; 
            }
            $this->view->mensaje = $mensaje;
        }

    }

?>