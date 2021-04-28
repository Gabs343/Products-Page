<?php require_once("head.php"); ?>

<section class="d-sm-flex product-info">

    <div class="product-description">
        <h1 class="display-3 text-center"><?php $info = ProductInfo($_GET["id"]);  echo $info[0]["Nombre"]; ?></h1>
        <hr>
        <p><?php TextDescription($info[0]["Descripcion"]); ?></p>
    </div>

    <div class="product-img">
 
       <img src="<?php $imagen = ProductImages($_GET["id"]); echo $imagen[0]["ruta"]; ?>" alt="" class="d-block w-100">

        <div class="shop-buttons">
            <h3>$ <?php echo $info[0]["Precio"]; ?></h3>
            <a href="">Comprar</a>
            <a href="">Añadir al Carrito</a>
        </div>

    </div>

</section>

<section class="product-details container-fluid">
    <h2 class="display-4">Caracteristicas</h2>
    <hr>
    <div class="d-flex container-fluid">

        <div id="carouselProduct" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="<?php echo $imagen[0]["ruta"]; ?>" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="<?php echo $imagen[0]["ruta"]; ?>" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="<?php echo $imagen[0]["ruta"]; ?>" class="d-block w-100" alt="...">
                </div>
            </div>
        </div>

        <div class="details-list">
            <ul>
                <?php 
                    foreach($a_productos as $clave){
                        if($clave["id_producto"] == $_GET["id"]){
                           foreach($clave as $subclave){
                                if(is_array($subclave)) {
                                    foreach ($subclave as $subclave2 => $subvalor) { ?>
                                        <li><?php echo $subclave2, ": ", $subvalor ?></li>
                                    <?php }
                                } 
                            }
                        }   
                    }
                ?>
            </ul>
        </div>
    </div>

</section>

<section class="product-comments">
    <h2 class="display-4">Comentarios</h2>
    <hr>

    <form action="<?php $_PHP_SELF ?>" class="container text-center" method="POST">
        <div class="form-info d-flex">
            <div>
                <label for="nombre">Nombre:</label>
                <input type="text" placeholder="Nombre" id="nombre" name="nombre" required>
            </div>
            <div>
                <label for="Mail">Email:</label>
                <input type="email" placeholder="@example.com" id="Mail" name="correo" required>
            </div>
            <div>
                <label for="Valoracion">Califica el producto:</label>
                <?php
                    for ($i = 1; $i < 6; $i++) { ?>
                        <input type="radio" name="valoracion" id="Valoracion" value="<?php echo $i ?>" required><?php echo $i ?></input>
                        <i class="far fa-star"></i>
                    <?php } ?>
            </div>
        </div>
        <div class="form-comment">
            <label for="Comentario">Comentario:</label>
            <textarea name="comentario" id="Comentario" cols="50" rows="2" required></textarea>
                
        </div>
        <div>
            <input class="sendForm" type="submit" name="sendComment" value="Enviar comentario">
        </div>
        <?php 
            if(isset($_POST["sendComment"])){
                date_default_timezone_set("America/Argentina/Buenos_Aires");

                $key = intval(date("YmdHis"));
                $_POST["valoracion"] = intval($_POST["valoracion"]);
                $idProduct = intval($_GET["id"]);

                $query = "INSERT INTO comentario (ID, Comentario, Valoracion, Fecha, ID_Producto) VALUES
                ($key, '$_POST[comentario]', $_POST[valoracion], now(), $idProduct)";

                $com = $connection->exec($query);
            }
        
        ?>
    </form>

    <hr>
    <div class=" comments container">
        <div>
            <h1 class="points">
                <?php 
                    $comment = 0;
                    $sumValor = 0;
                    foreach($a_comentarios as $clave){
                        if($clave["id_producto"] == $_GET["id"]){
                            $comment++;
                            foreach($clave as $subclave => $subvalor){
                                if($subclave == "valoracion"){
                                    $sumValor += $subvalor;
                                }
                            }
                        } 
                    }
                    $comment == 0 ? $result = 0.0 : $result = $sumValor / $comment; 
                    $result = number_format($result, 1);
                    echo $result; 
                ?>
            </h1>
        </div>


        <div>
            <ul>
                <?php
                    foreach($a_comentarios as $clave){
                        if($clave["id_producto"] == $_GET["id"]){?>
                            <li>
                                <?php
                                    foreach($clave as $subclave => $subvalor){
                                        if($subclave == "id_producto" || $subclave == "correo"){
                                            continue;
                                        }else if($subclave == "valoracion"){ 
                                            echo $subclave, ": ";
                                            for($i = 0; $i < $subvalor; $i++){?>
                                                <i class="fas fa-star"></i>
                                            <?php } ?>
                                            <br>
                                        <?php }else{
                                            echo $subclave, ": ", $subvalor, "<br>";
                                        }
                                    }
                                ?>
                            </li>
                        <?php }
                    }
                ?>
            </ul>
        </div>
    </div>
    
</section><?php require_once("footer.php"); ?>