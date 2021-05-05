<?php 

require_once("head.php");

?>

<section class="mt-5">
    <div class="container perfil bg-light">
        <div class="row pt-3 pb-5">
            <div class="col">
                <h3 class="mb-3">Foto Perfil:</h3>
                <img src="img/kali-uchis-meme.jpg" alt="Foto De Perfil" width="304" height="206">
            </div>
            <div class="col mt-5">
                <div>
                    <h3>Nombre:</h3>
                    <p><?php echo $_SESSION["Nombre"]?></p>
                </div>
                <div>
                    <h3>Apellido:</h3>
                    <p><?php echo $_SESSION["Apellido"]?></p>
                </div>
            </div>
            <div class="col mt-5">
                <div>
                    <h3>Correo:</h3>
                    <p><?php echo $_SESSION["Correo"]?></p>
                </div>
                <div>
                    <h3>DNI:</h3>
                    <p><?php echo $_SESSION["DNI"]?></p>
                </div>
            </div>
        </div>
        <div class="salir-perfil">
            <form action="index.php" method="POST">
                <input class="sendForm" type="submit" name="sendExit" value="Salir">
            </form>
        </div>
    </div>
</section>

<?php 

require_once("footer.php")

?>