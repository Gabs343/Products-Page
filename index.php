<?php require_once("head.php"); ?>

    <div id="carouselBanners" class="carousel slide flecha-banner" data-ride="carousel">
        <?php Banners($a_banners, "carouselBanners"); ?>
    </div>

    <div>
        <section class="d-sm-flex container-fluid justify-content-around align-items-center pt-5 text-center separador gradiente-info">
            <div class="separa">
                <h1>Soporte</h1>
                <div class="d-sm-flex">
                    <div>
                        <a href=""><img src="img/soporte.png" width="130" alt="soporte"></a>
                    </div>
                    <div class="m-3 text-center boton info-left">
                        <p>
                            Busca las configuraciones disponibles que hay para tu equipo.
                        </p>
                        <a href="contact.php">¡Contactanos!</a>
                    </div>
                </div>
            </div>
            <div class="my-4">
                <h1 class="local">¿Dónde estamos?</h1>
                <div class="d-sm-flex mt-3">
                    <div>
                        <a href=""><img src="img/maps.png" width="200" alt="map"></a>
                    </div>
                    <div class="m-2 text-center boton info-right">
                        <p>
                            Encuentra nuestros locales y ven a conocernos. 
                        </p>
                        <a href="contact.php">¡Encontranos!</a>
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
                        CarouselOfProducts($i == 0 ? "Nuevo" : "Destacado");
                    ?>
                </section>
            <?php }
        ?>
    </div>
<?php 
    require_once("footer.php");
?>