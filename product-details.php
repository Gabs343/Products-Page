<?php require_once("head.php"); ?>

<section class="d-sm-flex product-info">

    <div class="product-description">
        <h1 class="display-3 text-center"><?php $info = ProductInfo($_GET["id"]);  echo $info[0]["Nombre"]; ?></h1>
        <hr class="linea">
        <p><?php TextDescription($info[0]["Descripcion"]); ?></p>
    </div>

    <div class="product-img">

        <img src="<?php $imagen = ProductImages($_GET["id"]); echo $imagen[0]["ruta"]; ?>" alt="" class="d-block w-100">

        <div class="shop-buttons mt-5">
            <h3>$ <?php echo $info[0]["Precio"]; ?></h3>
            <div class="ml-5">
                <a href="">Comprar</a>
                <a href="">Añadir al Carrito</a>
            </div>
        </div>

    </div>

</section>

<section class="product-details container-fluid">
    <h2 class="display-4">Características</h2>
    <hr class="linea">
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
                    $query_esp = "SELECT especificacion.Nombre, esp_descripcion.Descripcion FROM esp_descripcion
                                INNER JOIN especificacion ON especificacion.ID = ID_Especificacion 
                                WHERE ID_Producto = $_GET[id]";
                    
                    $especificaciones = ConsultDB($query_esp);

                    foreach($especificaciones as $clave){?>
                <li><?php echo $clave["Nombre"], ": ", $clave["Descripcion"] ?></li>
                <?php }
                ?>
            </ul>
        </div>
    </div>

</section>

<section class="product-comments pb-5">
    <div class="container">
        <div class="row">
            <div class="col">
                <h2 class="display-4 comen-m">Comentarios</h2>
                <hr class="linea">

                <form action="<?php $_PHP_SELF ?>" class="row container" method="POST">
                    <div class="form-info">
                        <div>
                            <label class="form-label" for="Valoracion">Califica el producto:</label>
                            <?php
                        for ($i = 1; $i < 6; $i++) { ?>
                            <input type="radio" class="ml-3" name="valoracion" id="Valoracion" value="<?php echo $i ?>"
                                required><?php echo $i ?></input>
                            <i class="far fa-star"></i>
                            <?php } ?>
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="Comentario" class="form-label">Comentario:</label>
                        <textarea name="comentario" class="form-control" id="Comentario" cols="50" rows="2"
                            required></textarea>
                    </div>

                    <div>
                        <input class="btn btn-primary ml-3 mt-4" type="submit" name="sendComment"
                            value="Enviar comentario">
                    </div>

                    <?php 

                    if(isset($_POST["sendComment"])){
                        if(isset($_SESSION["Clave"])){
                            $key = intval(date("YmdHis"));
                            $_POST["valoracion"] = intval($_POST["valoracion"]);
                            $idProduct = intval($_GET["id"]);

                            $query = "INSERT INTO comentario (ID, Comentario, Valoracion, Fecha, ID_Producto, ID_Cliente) VALUES
                            ($key, '$_POST[comentario]', $_POST[valoracion], now(), $idProduct, $_SESSION[Clave])";

                            InsertDB($query);    
                        }else{
                            consulta("Debe iniciar sesión o suscribirse para dejar un comentario.");
                        }
  
                    }
        
                ?>
                </form>
            </div>
            <div class="col">
                <div>
                    <h1 class="points">
                        <?php 
                    $query = "SELECT cliente.Nombre, Comentario, Valoracion, Fecha FROM comentario
                    INNER JOIN cliente ON ID_Cliente = cliente.DNI 
                    WHERE ID_Producto = '$_GET[id]'";
                    $a_comentarios = ConsultDB($query);
                    $comment = 0;
                    $sumValor = 0;
                    foreach($a_comentarios as $clave){
                        
                        $comment++;
                        foreach ($clave as $subclave => $subvalor) {
                            if ($subclave == "Valoracion") {
                                $sumValor += $subvalor;
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
                        ?>
                        <li class="comen-muestra">
                            <?php
                                    foreach($clave as $subclave => $subvalor){
                                        if($subclave == "Valoracion"){ 
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
                        <?php 
                        }
                    ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once("footer.php"); ?>