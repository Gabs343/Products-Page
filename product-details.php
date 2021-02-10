<?php
require_once("head.php");
?>

<section class="d-flex product-info">

    <div>
        <h1 class="display-3 text-center"><?php echo $a_productos[1]["nombre"]; ?></h1>
        <hr>
        <p>
            Lorem ipsum, dolor sit amet consectetur adipisicing elit.
            Possimus earum ratione praesentium fugiat iure dignissimos odio quis saepe nesciunt nobis
            eligendi ea corrupti maxime, magni non ullam delectus. Tenetur, odit? <br>

            <br>Lorem ipsum, dolor sit amet consectetur adipisicing elit.
            Possimus earum ratione praesentium fugiat iure dignissimos odio quis saepe nesciunt nobis
            eligendi ea corrupti maxime, magni non ullam delectus. Tenetur, odit?<br>

            <br>Lorem ipsum, dolor sit amet consectetur adipisicing elit.
            Possimus earum ratione praesentium fugiat iure dignissimos odio quis saepe nesciunt nobis
            eligendi ea corrupti maxime, magni non ullam delectus. Tenetur, odit?
        </p>
    </div>

    <div class="product-img">
        <img src="<?php echo $a_productos[1]["imagen"]; ?>" alt="">

        <div class="shop-buttons">
            <h3>$ <?php echo $a_productos[1]["precio"]; ?></h3>
            <a href="">Comprar</a>
            <a href="">Añadir al Carrito</a>
        </div>

    </div>

</section>

<section class="product-details">
    <h2 class="display-4">Caracteristicas</h2>
    <hr>
    <div class="d-flex container-fluid">

        <div id="carouselProduct" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="img/auricular1.png" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="img/auricular1.png" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="img/auricular1.png" class="d-block w-100" alt="...">
                </div>
            </div>
        </div>

        <div class="details-list">
            <ul>
                <li> Tipo de salida: Stereo</li>
                <li> Tipo de copa: Circumaurales: Este tipo de auriculares se coloca rodeando completamente la oreja. Tacto suave y con aislamiento pasivo</li>
                <li> Material Diadema: Metálica, flexible. Integrada a la estructura</li>
                <li> Tipo de cable: 2 m Engomado de alta resistencia.</li>
                <li> Diametro del diafragma: 50 mm con imanes de neodimio</li>
                <li> Vibración: Si. Motor de vibración 30 mm</li>
            </ul>
        </div>
    </div>

</section>

<?php
require_once("footer.php");
?>