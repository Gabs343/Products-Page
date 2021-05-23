<?php 
    class Controller{
        function __construct()
        {
            $this->view = new View();
        }

        function loadModel($modelo){
            $url = "model/".$modelo."_modelo.php";
            if(file_exists($url)){
                require $url;
                $modelName = $modelo."Modelo";
                $this->modelo = new $modelName();
            }
        }
    }

?>