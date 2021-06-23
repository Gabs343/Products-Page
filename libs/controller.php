<?php 
    class Controller{
        public function __construct()
        {
            session_start();
            $this->view = new View();
        }

        public function loadModel($modelo){
            $url = "model/".$modelo."_modelo.php";
            if(file_exists($url)){
                require $url;
                $modelName = $modelo."Modelo";
                $this->modelo = new $modelName();
            }
        }

        public function getPerfil(){
            $perfil = null;
            if(!empty($_SESSION)){
                $perfil = $this->modelo->getperfil();
            }
            return $perfil;
        }
    }

?>