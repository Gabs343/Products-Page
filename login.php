<?php require_once("head.php") ?>

<section class="container">
    <div class="text-center">
        <div>
            <h1 class="display-2">Ingresar</h1>
            <hr>
        </div>
        <div>
            <form action="<?php $_PHP_SELF ?>" method="POST">
                <div class="d-flex">
                    <div>
                        <label for="Mail">Email:</label>
                        <input type="email" placeholder="@example.com" id="Mail" name="correo" required>
                    </div>
                    <div>
                        <label for="pwd">Password:</label>
                        <input type="password" placeholder="Password" id="pwd" name="pwd" required>
                    </div>
                </div>

                <div>
                    <input class="sendForm" type="submit" name="sendIng" value="Ingresar">
                </div>
                <?php 
                    if (isset($_POST["sendIng"])) {
                        $query = "SELECT DNI, Correo, Contraseña FROM cliente";
                        $client = $connection->query($query);
                        
                        foreach($client as $clave){
                            if($clave["Correo"] == $_POST["correo"] && password_verify($_POST["pwd"], $clave["Contraseña"])){
                                echo "bienvenido";
                            }else{
                                echo "intenta otra vez";
                            }
                        }

                    }
                ?>
            </form>
        </div>
    </div>
    <div>
        <div>
            <h1 class="display-2">Subscribete</h1>
            <hr>
        </div>

        <div>
            <form action="<?php $_PHP_SELF ?>" method="POST">
                <div>
                    <label for="pk">DNI:</label>
                    <input type="number" placeholder="DNI" id="pk" name="pk" required>
                </div>
                <div>
                    <label for="nombre">Nombre:</label>
                    <input type="text" placeholder="Nombre" id="nombre" name="nombre" required>
                </div>
                <div>
                    <label for="apellido">Apellido:</label>
                    <input type="text" placeholder="Apellido" id="apellido" name="apellido" required>
                </div>
                <div>
                    <label for="correo">Email:</label>
                    <input type="email" placeholder="@example.com" id="correo" name="correo" required>
                </div>
                <div>
                    <label for="pwd">Password:</label>
                    <input type="password" placeholder="Password" id="pwd" name="pwd" required>
                </div>
                <div>
                    <input class="sendForm" type="submit" name="sendSubs" value="Subscribirse">
                </div>
                <?php 
                    if(isset($_POST["sendSubs"])){
                        $_POST["pwd"] = password_hash($_POST["pwd"], PASSWORD_DEFAULT);
                        $query = "INSERT INTO cliente (DNI, Nombre, Apellido, Correo, Contraseña) VALUES
                        ($_POST[pk], '$_POST[nombre]', '$_POST[apellido]', '$_POST[correo]', '$_POST[pwd]')";

                        $subs = $connection->exec($query);
                    }

                ?>
            </form>
        </div>
    </div>

</section>

<?php require_once("footer.php") ?>