<?php require_once("head.php"); ?>

    <div id="carouselBanners" class="carousel slide" data-ride="carousel">
        <?php Banners($a_banners, "carouselBanners"); ?>
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
                        CarouselOfProducts($i == 0 ? "Nuevo" : "Destacado", $a_productos, $connection);
                    ?>
                </section>
            <?php }
        ?>
    </div>
<?php 
    require_once("footer.php");
?>