<?php
    require_once("head.php");
?>

    <div id="carouselBanners" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselBanners" data-slide-to="0" class="active"></li>
            <li data-target="#carouselBanners" data-slide-to="1"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img/Banner1.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="img/Banner2.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselBanners" role="button" data-slide="prev">
            <span aria-hidden="true"><i class="fas fa-angle-double-left"></i></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselBanners" role="button" data-slide="next">
            <span aria-hidden="true"><i class="fas fa-angle-double-right"></i></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <div>
        <section class="d-sm-flex container-fluid justify-content-around align-items-center pt-3 text-center separador">
            <div>
                <h1>Soporte</h1>
                <div class="d-sm-flex">
                    <div>
                        <a href=""><img src="img/soporte.png" width="130" alt="soporte"></a>
                    </div>
                    <div class="m-3 text-center boton">
                        <p>
                            Busca las <br>
                            configuraciones disponibles <br>
                            que hay para tu equipo
                        </p>
                        <a href="">Buscar</a>
                    </div>
                </div>
            </div>
            <div class="my-4">
                <h1>Donde comprar <br> Nuestros productos</h1>
                <div class="d-sm-flex">
                    <div>
                        <a href=""><img src="img/maps.png" width="200" alt="map"></a>
                    </div>
                    <div class="m-2 text-center boton">
                        <p>
                            Encuentra tu local <br>
                            mas cercano
                        </p>
                        <a href="">Buscar</a>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="container">
        <?php 
            for($i = 0; $i < 2; $i++){?>
                <section class="product-section bd-section">
                    <?php 
                        carouselOfProducts($i == 0 ? "nuevo" : "destacado", $a_productos);
                        carouselSmallOfProducts($i == 0 ? "nuevo" : "destacado", $a_productos);
                    ?>
                </section>

            <?php }
        ?>
        
    </div>
<?php 
    require_once("footer.php");
?>