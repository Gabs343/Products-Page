<?php require_once("head.php"); ?>

<section class="d-sm-flex product-info">

    <div class="product-description">
        <h1 class="display-3 text-center"><?php echo $a_productos[$_GET["id"]]["nombre"]; ?></h1>
        <hr>
        <p><?php TextDescription($a_productos[$_GET["id"]]["descripcion"]); ?></p>
    </div>

    <div class="product-img">
 
       <img src="<?php echo $a_productos[$_GET["id"]]["imagen"]; ?>" alt="" class="d-block w-100">

        <div class="shop-buttons">
            <h3>$ <?php echo $a_productos[$_GET["id"]]["precio"]; ?></h3>
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
                    <img src="<?php echo $a_productos[$_GET["id"]]["imagen"]; ?>" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="<?php echo $a_productos[$_GET["id"]]["imagen"]; ?>" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="<?php echo $a_productos[$_GET["id"]]["imagen"]; ?>" class="d-block w-100" alt="...">
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

        <form action="" class="container text-center">
            <div class="form-info d-flex">
                <div>
                    <label for="nombre">Nombre:</label>
                    <input type="text" placeholder="Nombre" id="nombre" name="nombre" required>
                </div>
                <div>
                    <label for="Mail">Email:</label>
                    <input type="email" placeholder="@example.com" id="Mail" name="id_correo" required>
                </div>
                <div>
                    <label for="Valoracion">Califica el producto:</label>
                    <?php
                        for ($i = 1; $i < 6; $i++) { ?>
                            <input type="radio" name="valoracion" id="Valoracion" value="<?php echo $i ?>" required><?php echo $i ?></input>
                        <?php } ?>
                
                </div>
            </div>
            <div class="form-comment">
                <label for="Comentario">Comentario:</label>
                <textarea name="comentario" id="Comentario" cols="50" rows="2" required></textarea>
                
            </div>
            <div>
                <input class="sendForm" type="submit" name="comentar" value="Enviar comentario">
            </div>
            
        </form>
    
    <div></div>
</section>

<?php require_once("footer.php"); ?>