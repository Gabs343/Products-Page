<?php require_once("head.php");
?>
<div class="container">
    <div class="row col-6 bg-light p-3 border">
        <div class="col-sm-4">
            <h3>Foto Perfil:</h3>
            <img src="img/perfil.png" alt="Foto De Perfil" width="304" height="206">
        </div>
        <div class="w-100"></div>
        <div class="col-sm-3">
            <h3>Nombre:
            </h3>
            <p><?php echo $_SESSION["Nombre"]?></p>
        </div>
        <div class="w-100"></div>
        <div class="col-sm-3">
            <h3>Apellido:</h3>
            <p><?php echo $_SESSION["Apellido"]?></p>
        </div>
        <div class="w-100"></div>
        <div class="col-sm-3">
            <h3>Correo:</h3>
            <p><?php echo $_SESSION["Correo"]?></p>
        </div>
        <div class="w-100"></div>
        <div class="col-sm-3">
            <h3>DNI:</h3>
            <p><?php echo $_SESSION["DNI"]?></p>
        </div>
        <div class="w-100"></div>
        <form action="index.php" method="POST">
            <input class="sendForm" type="submit" name="sendExit" value="Salir">
        </form>
    </div>
</div>