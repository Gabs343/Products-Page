<?php require "view/header.php"; ?>
<section class="mt-5">
    <div class="container perfil bg-light">
        <div class="row pt-3 pb-5">
            <div class="col">
                <h3 class="mb-3">Foto Perfil:</h3>
<<<<<<< HEAD
                <img src="public/img/avatar/<?php echo $this->info["Imagen_Perfil"]?>" alt="Foto De Perfil" width="304" height="206">
            <form action="<?php $_PHP_SELF;?>" method="POST" enctype="multipart/form-data">
                <input type="file" class="form-control" placeholder="img" id="img" name="img">
                <input class="sendForm" type="submit" name="sendImg" value="Cambiar Imagen">
            </form>
=======
                <img src="img/kali-uchis-meme.jpg" alt="Foto De Perfil" width="304" height="206">
>>>>>>> main
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
<?php require "view/footer.php"; ?> 
</body>