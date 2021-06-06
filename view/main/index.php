<?php require "view/header.php"; ?>
<div id="carouselBanners" class="carousel slide flecha-banner" data-ride="carousel">
    <ol class="carousel-indicators">
        <?php for($i = 0; $i < count($this->banners); $i++){ ?>
            <li data-target="#carouselBanners" data-slide-to="<?php echo $i ?>"
                class="<?php echo $i == 0 ? "active" : "" ?>"></li>
        <?php } ?>
    </ol>
    <div class="carousel-inner">
        <?php  $banner = $this->banners; for($k = 0; $k < count($this->banners); $k++) { ?>
            <div class="carousel-item <?php echo $k == 0 ? "active" : ""?>">
                <img src="<?php echo $banner[$k]; ?>" class="d-block w-100" alt="...">
            </div>
        <?php  } ?>
    </div>
    <a class="carousel-control-prev" href="#carouselBanners" role="button" data-slide="prev">
        <span aria-hidden="true"><i class="fas fa-arrow-circle-left"></i></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselBanners" role="button" data-slide="next">       
        <span aria-hidden="true"><i class="fas fa-arrow-circle-right"></i></span>
        <span class="sr-only">Next</span>
    </a>
</div>


<div>
    <section
        class="d-sm-flex container-fluid justify-content-around align-items-center pt-5 text-center separador gradiente-info">
        <div class="separa">
            <h1>Soporte</h1>
            <div class="d-sm-flex">
                <div>
                    <a href="contacto"><img src="public/img/soporte.png" width="130" alt="soporte"></a>
                </div>
                <div class="m-3 text-center boton info-left">
                    <p>
                        Busca las configuraciones disponibles que hay para tu equipo.
                    </p>
                    <a href="contacto">¡Contactanos!</a>
                </div>
            </div>
        </div>
        <div class="my-4">
            <h1 class="local">¿Dónde estamos?</h1>
            <div class="d-sm-flex mt-3">
                <div>
                    <a href="contacto"><img src="public/img/maps.png" width="200" alt="map"></a>
                </div>
                <div class="m-2 text-center boton info-right">
                    <p>
                        Encuentra nuestros locales y ven a conocernos.
                    </p>
                    <a href="contacto">¡Encontranos!</a>
                </div>
            </div>
        </div>
    </section>
</div>
<div class="container">
    <section class="product-section bd-section">
        <h1>Nuevos Lanzamientos</h1>
        <div id="carouselId_Nuevo" class="carousel slide d-none d-md-block carousel-products flecha"  data-ride="carousel">
            <div class="carousel-inner" role="listbox">
                <?php $array = array(); for ($i = 0; $i < ( count($this->productosNuevos) / 4); $i++) { ?>
                    <div class="carousel-item <?php echo $i == 0 ? "active" : ""; ?>">
                        <div class = "row row-cols-4">
                        
                            <?php $countProduct = 0; 
                                foreach ($this->productosNuevos as $clave) {
                                    $producto = $clave;
                                    if (!in_array($producto->id, $array)) {
                                        array_push($array, $producto->id); ?>
                                        <div class="col index-product card">
                                        <a href="productDetails?id=<?php echo $producto->id; ?>">
                                            <img src="<?php echo $producto->imagen; ?>" alt="First slide" class="w-100">
                                        </a>
                                        <div class="card-body">
                                            <a href="productDetails?id=<?php echo $producto->id; ?>">
                                                <h5 class="etiqueta-nombre mt-2"><?php echo $producto->nombre; ?></h5>
                                            </a>
                                            <p class="etiqueta-precio"><?php echo "$ ", $producto->precio; ?></p>
                                            <span class="btn-shop"><a href=""><i class="fas fa-cart-plus"></i></a></span>
                                        </div>
                                        </div>
                                    <?php $countProduct++;
                                    }
                                    if ($countProduct == 4) {
                                        break;
                                    }
                                } ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <a class="carousel-control-prev" href="#carouselId_Nuevo" role="button" data-slide="prev">
                <span aria-hidden="true"><i class="fas fa-arrow-circle-left"></i></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselId_Nuevo" role="button" data-slide="next">       
                <span aria-hidden="true"><i class="fas fa-arrow-circle-right"></i></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        
    </section>

    <section class="product-section bd-section">
        <h1>Destacados</h1>
        <div id="carouselId_Destacado" class="carousel slide d-none d-md-block carousel-products flecha"  data-ride="carousel">
            <div class="carousel-inner" role="listbox">
                <?php $array = array(); for ($i = 0; $i < ( count($this->productosDestacados) / 4); $i++) { ?>
                    <div class="carousel-item <?php echo $i == 0 ? "active" : ""; ?>">
                        <div class = "row row-cols-4">
                        
                            <?php $countProduct = 0; 
                                foreach ($this->productosDestacados as $clave) {
                                    $producto = $clave;
                                    if (!in_array($producto->id, $array)) {
                                        array_push($array, $producto->id); ?>
                                        <div class="col index-product card">
                                        <a href="productDetails?id=<?php echo $producto->id; ?>">
                                            <img src="<?php echo $producto->imagen; ?>" alt="First slide" class="w-100">
                                        </a>
                                        <div class="card-body">
                                            <a href="productDetails?id=<?php echo $producto->id; ?>">
                                                <h5 class="etiqueta-nombre mt-2"><?php echo $producto->nombre; ?></h5>
                                            </a>
                                            <p class="etiqueta-precio"><?php echo "$ ", $producto->precio; ?></p>
                                            <span class="btn-shop"><a href=""><i class="fas fa-cart-plus"></i></a></span>
                                        </div>
                                        </div>
                                    <?php $countProduct++;
                                    }
                                    if ($countProduct == 4) {
                                        break;
                                    }
                                } ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <a class="carousel-control-prev" href="#carouselId_Destacado" role="button" data-slide="prev">
                <span aria-hidden="true"><i class="fas fa-arrow-circle-left"></i></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselId_Destacado" role="button" data-slide="next">       
                <span aria-hidden="true"><i class="fas fa-arrow-circle-right"></i></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        
    </section>
</div>
<?php require "view/footer.php"; ?>
</body>