<?php
    require_once "controller/errores.php";
    
    class App{
        function __construct(){ 
            $url = isset($_GET["url"]) ? $_GET["url"] : null;
            $url = rtrim($url, "/");
            $url = explode("/", $url);
            $ruta = empty($url[0]) ? "main" : $url[0];

            $archivoControlador = "controller/".$ruta.".php";
            
            if(file_exists($archivoControlador)){
                require_once $archivoControlador;
                $controlador = new $ruta;
                $controlador->loadModel($ruta);

                if($controlador->getPerfil() > 2){
                    $controlador->renderForEmpleados();
                }else{
                    $controlador->render();
                }
            }else{
                $controlador = new Errores();
            }

        }
    }


?>