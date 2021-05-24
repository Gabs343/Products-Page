<?php require "view/header.php"; ?>
<section class="container">
    <div class="container mt-5 mb-5 loguearse">
        <div class="row bg-light">
            <div class="col">
                <div>
                    <h2>Ingresar</h1>
                        <hr class="linea">
                </div>
                <div>
                    <form action="<?php echo constant("URL"); ?>login/buscarUsuario" method="POST">
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
                            <input class="sendForm" type="submit" name="sendIng" value="Ingresar">
                        </div>
                        <?php 
                    /*if (isset($_POST["sendIng"])) {
                        $query = "SELECT COUNT(*) FROM cliente WHERE Correo = '$_POST[correo]'";
                        $client = ConsultDB($query);
                        if(intval($client[0]["COUNT(*)"])){
                            $query = "SELECT * FROM cliente WHERE Correo = '$_POST[correo]'";
                            $client = ConsultDB($query);
                            foreach($client as $clave){
                                if(password_verify($_POST["pwd"], $clave["Contraseña"])){  
                                    $_SESSION = $clave;
                                    echo "
                                    <script text-type=javascript>
                                    alert('Bienvenido!');
                                    window.location='perfil.php';
                                    </script>
                                    ";
                                }else{
                                    echo "intenta otra vez";
                                }
                            }
                        }else{
                            echo "error en el correo";
                        }
                    }*/
                ?>
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
                    <form action="<?php $_PHP_SELF;?>" method="POST">
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