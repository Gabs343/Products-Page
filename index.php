<?php
    require_once("head.php");
?>

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img/Banner1.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="img/Banner2.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span aria-hidden="true"><i class="fas fa-angle-double-left"></i></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
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
        <section class="product-section bd-section">
            <h1>
                Novedades
            </h1>
            <hr>
            <div id="carouselId" class="carousel slide d-none d-sm-block" data-ride="carousel">
                <div class="carousel-inner" role="listbox">

                    <?php 
                        $newProduct = 1;
                        for($i = 0; $i < numberOfProducts("nuevo", $a_productos) / 4; $i++){ ?>
                            <div class="carousel-item <?php echo $i == 0 ? "active" : ""; ?> ">
                                <div class="row d-flex">
                                    <?php
                                        $countNewProduct = 0;
                                        
                                        for($k = 1; $k <= count($a_productos); $k++){

                                            if ($a_productos[$newProduct]["nuevo"]) {
                                                Producto($newProduct, $a_productos);
                                                $countNewProduct ++;

                                                if ($countNewProduct == 4) {
                                                    $newProduct++;
                                                    break;
                                                }
                                            }
                                            
                                            $newProduct == count($a_productos) ? $newProduct = 1 : $newProduct++;    
                                        }

                                    ?>
                                </div>
                            </div>
                        <?php }
                    ?>

                </div>
                <a class="carousel-control-prev index-product-control" href="#carouselId" role="button"
                    data-slide="prev">
                    <span aria-hidden="true"><i class="fas fa-arrow-circle-left"></i></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next index-product-control" href="#carouselId" role="button"
                    data-slide="next">
                    <span aria-hidden="true"><i class="fas fa-arrow-circle-right"></i></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

            <!--CAROUSEL SMALL-->
            <div id="carouselId2" class="carousel slide d-sm-none" data-ride="carousel">
                <div class="carousel-inner" role="listbox">
                        <div class="d-flex">
                            <div class="carousel-item active index-product card">
                                <a href="">
                                    <img src="img/auricular1.png" alt="First slide" class="w-100">    
                                </a>
                                <div class="card-body">
                                    <h5 class="etiqueta-nombre">Nombre</h5>
                                    <p class="etiqueta-precio">Precio</p>
                                    <span class="btn-shop"><a href=""><i class="fas fa-cart-plus"></i></a></span>
                                </div>
                            </div>
                            <div class="carousel-item index-product card">
                                <a href="">
                                    <img src="img/auricular1.png" alt="First slide" class="w-100">    
                                </a>
                                <div class="card-body">
                                    <h5 class="etiqueta-nombre">Nombre</h5>
                                    <p class="etiqueta-precio">Precio</p>
                                    <span class="btn-shop"><a href=""><i class="fas fa-cart-plus"></i></a></span>
                                </div>
                            </div>
                       
                        </div>
                </div>
                <a class="carousel-control-prev index-product-control" href="#carouselId2" role="button"
                    data-slide="prev">
                    <span aria-hidden="true"><i class="fas fa-arrow-circle-left"></i></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next index-product-control" href="#carouselId2" role="button"
                    data-slide="next">
                    <span aria-hidden="true"><i class="fas fa-arrow-circle-right"></i></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </section>

      
        <section class="product-section bd-section">
            <h1 class="text-right">
                Destacados
            </h1>
            <hr>
            <div id="carouselId-Destacado" class="carousel slide d-none d-sm-block" data-ride="carousel">
                <div class="carousel-inner" role="listbox">

                <?php 
                        $destProduct = 1;
                        for($i = 0; $i < numberOfProducts("destacado", $a_productos) / 4; $i++){ ?>
                            <div class="carousel-item <?php echo $i == 0 ? "active" : ""; ?> ">
                                <div class="row d-flex">
                                    <?php
                                        $countDestProduct = 0;
                                        
                                        for($k = 1; $k <= count($a_productos); $k++){

                                            if ($a_productos[$destProduct]["destacado"]) {
                                                Producto($destProduct, $a_productos);
                                                $countDestProduct ++;

                                                if ($countDestProduct == 4) {
                                                    $destProduct++;
                                                    break;
                                                }
                                            }
                                            
                                            $destProduct == count($a_productos) ? $destProduct = 1 : $destProduct++;    
                                        }

                                    ?>
                                </div>
                            </div>
                        <?php }
                    ?>

                </div>
                <a class="carousel-control-prev index-product-control" href="#carouselId-Destacado" role="button"
                    data-slide="prev">
                    <span aria-hidden="true"><i class="fas fa-arrow-circle-left"></i></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next index-product-control" href="#carouselId-Destacado" role="button"
                    data-slide="next">
                    <span aria-hidden="true"><i class="fas fa-arrow-circle-right"></i></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

            <!--CAROUSEL SMALL-->
            <div id="carouselId-Destacado" class="carousel slide d-sm-none" data-ride="carousel">
                <div class="carousel-inner" role="listbox">
                        <div class="d-flex">
                            <div class="carousel-item active index-product card">
                                <a href="">
                                    <img src="img/auricular1.png" alt="First slide" class="w-100">    
                                </a>
                                <div class="card-body">
                                    <h5 class="etiqueta-nombre">Nombre</h5>
                                    <p class="etiqueta-precio">Precio</p>
                                    <span class="btn-shop"><a href=""><i class="fas fa-cart-plus"></i></a></span>
                                </div>
                            </div>
                            <div class="carousel-item index-product card">
                                <a href="">
                                    <img src="img/auricular1.png" alt="First slide" class="w-100">    
                                </a>
                                <div class="card-body">
                                    <h5 class="etiqueta-nombre">Nombre</h5>
                                    <p class="etiqueta-precio">Precio</p>
                                    <span class="btn-shop"><a href=""><i class="fas fa-cart-plus"></i></a></span>
                                </div>
                            </div>
                       
                        </div>
                </div>
                <a class="carousel-control-prev index-product-control" href="#carouselId-Destacado" role="button"
                    data-slide="prev">
                    <span aria-hidden="true"><i class="fas fa-arrow-circle-left"></i></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next index-product-control" href="#carouselId-Destacado" role="button"
                    data-slide="next">
                    <span aria-hidden="true"><i class="fas fa-arrow-circle-right"></i></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </section>
    </div>
<?php 
    require_once("footer.php");
?>