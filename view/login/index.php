<?php require "view/header.php"; echo $this->mensaje; ?>
<section class="container">
    <div class="container mt-5 mb-5 loguearse">
        <div class="row bg-light">
            <div class="col">
                <div>
                    <h2>Ingresar</h1>
                        <hr class="linea">
                </div>
                <div>
                    <form action="<?php $_PHP_SELF;?>" method="POST">
                        <div class="ml-5 mr-5">
                            <div class="mb-3">
                                <label for="Mail" class="form-label">Email:</label>
                                <input type="email" class="form-control" placeholder="@correo.com" id="Mail"
                                    name="correo" required>
                            </div>
                            <div>
                                <label for="pwd" class="form-label">Contraseña:</label>
                                <input type="password" class="form-control boton-mover" placeholder="Contraseña"
                                    id="pwd" name="pwd" required>
                            </div>
                        </div>

                        <div class="boton-loguearse">
                            <input class="sendForm" type="submit" name="sendLog" value="Ingresar">
                        </div>
                    </form>
                </div>
            </div>
            <div class="vertical"></div>
            <div class="col">
                <div>
                    <h2>Subscribete</h1>
                        <hr class="linea">
                </div>

                <div class="ml-5 mr-5">
                    <form action="<?php $_PHP_SELF;?>" method="POST" enctype="multipart/form-data">
                        <div>
                            <label for="pk" class="form-label">DNI:</label>
                            <input type="tel" class="form-control" placeholder="DNI" id="pk" name="pk" required>
                        </div>
                        <div class="mt-3">
                            <label for="nombre" class="form-label">Nombre:</label>
                            <input type="text" class="form-control" placeholder="Nombre" id="nombre" name="nombre"
                                required>
                        </div>
                        <div class="mt-3">
                            <label for="apellido" class="form-label">Apellido:</label>
                            <input type="text" class="form-control" placeholder="Apellido" id="apellido" name="apellido"
                                required>
                        </div>
                        <div class="mt-3">
                            <label for="correo" class="form-label">Email:</label>
                            <input type="email" class="form-control" placeholder="@correo.com" id="correo" name="correo"
                                required>
                        </div>
                        <div class="mt-3">
                            <label for="img" class="form-label">Foto De Perfil:</label>
                            <input type="file" class="form-control" placeholder="img" id="img" name="img"
                                required>
                        </div>
                        <div class="mt-3">
                            <label for="pwd" class="form-label">Contraseña:</label>
                            <input type="password" class="form-control" placeholder="Contraseña" id="pwd" name="pwd"
                                required>
                        </div>
                        <div class="boton-suscribirse">
                            <input class="sendForm" type="submit" name="sendSubs" value="Subscribirse">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?php require "view/footer.php"; ?>
</body>