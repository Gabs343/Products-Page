<?php 
    session_start();
    if(isset($_SESSION["Correo"])){
        $log = $_SESSION["Nombre"];
        $logPage = "perfil.php";
        if(isset($_POST["sendExit"])){
            echo "
            <script text-type=javascript>
            alert('Cerraste Sesión');
            window.location='index.php';
            </script>
            ";
            session_destroy();
        }
    }else{
        $perfil = "Nombre";
        $perfilPage = "";
        $log = "Ingresar";
        $logPage = "login.php";
    }

?>