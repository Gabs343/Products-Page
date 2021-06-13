<?php require "view/header.php"; ?>
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
                    <p><?php echo $this->info["Nombre"]; ?></p>
                </div>
                <div>
                    <h3>Apellido:</h3>
                    <p><?php echo $this->info["Apellido"]; ?></p>
                </div>
            </div>
            <div class="col mt-5">
                <div>
                    <h3>Correo:</h3>
                    <p><?php echo $this->info["Correo"]; ?></p>
                </div>
                <div>
                    <h3>DNI:</h3>
                    <p><?php echo $this->info["DNI"]; ?></p>
                </div>
            </div>
        </div>
        <div class="salir-perfil">
            <form action="main" method="POST">
                <input class="sendForm" type="submit" name="sendExit" value="Salir">
            </form>
        </div>
    </div>
</section>
</div>
<?php require "view/footer.php"; ?>