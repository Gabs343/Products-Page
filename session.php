<?php 
    session_start();
    if(isset($_SESSION["Correo"])){
        $perfil = $_SESSION["Nombre"];
        $perfilPage = "perfil.php";
        $log = "Salir";
        $logPage = "exit.php";
        if(isset($_POST["sendExit"])){
            session_destroy();
        }
    }else{
        $perfil = "Nombre";
        $perfilPage = "";
        $log = "Ingresar";
        $logPage = "login.php";
    }

?>