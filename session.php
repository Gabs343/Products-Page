<?php
    if(!empty($_SESSION)){
        $log = $_SESSION["Nombre"];
        $logPage = "perfil";
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
        $logPage = "login";
    }

?>