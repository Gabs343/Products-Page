<?php 
    class View{
        function __construct()
        {
            
        }

        function render($nombre){
            require "view/".$nombre.".php";
        }

        public function tienePermiso($permiso){
            $doIt = false;
            foreach($_SESSION["Permisos"] as $clave){
                if($clave["Code"] == $permiso){
                    $doIt = true;
                    break;
                }
            }

            return $doIt;
        }
    }

?>