<?php require "view/header.php"; ?>
<form action="<?php $_PHP_SELF; ?>" method="POST">

    <section class="d-sm-flex product-info">
        <div>
            <input class="display-3 text-center" name="nombre" type="text" placeholder="<?php echo $this->newProduct ? "Nombre" : $this->producto->nombre; ?>">
            <hr class="linea">
            <p><textarea name="descripcion" id="" cols="80" rows="10" placeholder="<?php echo $this->newProduct ? "Descripcion" : $this->producto->descripcion; ?>"></textarea></p>
        </div>

        <div class="product-img">
            <?php if($this->newProduct){ ?>
                <input type="file" name="imagen" id="" class="insertImg">
            <?php }else{ ?>
                <img src="<?php echo $this->producto->imagen; ?>" alt="" class="d-block w-100">
            <?php } ?>
            <div class="shop-buttons mt-5">
                <h3><input type="number" size="5" name="precio" placeholder="$ <?php echo $this->newProduct ? "Precio" : $this->producto->precio; ?>"></h3>
                <div class="ml-5">
                    <input type="submit" value="Confirmar">
                    <a href="productList?categoria=0&marca=0&condicion=0&orden=0">Cancelar</a>
                </div>
            </div>
        </div>
    </section>

    <section class="product-details container-fluid">
        <h2 class="display-4">Características</h2>
        <hr class="linea">
        <ul class="<?php echo $this->newProduct ? "d-none" : ""; ?>">
            <?php foreach($this->producto->especificaciones as $clave){ ?>
                <li>
                    <!--<input type="text" placeholder="<?php echo $clave["Nombre"]; ?>"> : 
                    <input type="text" size="100" placeholder="<?php echo $clave["Descripcion"];?>-->
                </li>      
            <?php } ?>
            </ul>
    </section>
</form>

<section class="product-comments pb-5 <?php echo $this->newProduct ? "d-none" : ""; ?>">
    <div class="container">
        <h2 class="display-4 comen-m">Comentarios</h2>
        <hr class="linea">
        <div class="row">
            <div class="col filtro">
                <ul>
                    <li><a href="#collapseMostrar" role="button" data-toggle="collapse">Mostrar</a>
                        <ul class="collapse sublist" id="collapseMostrar">
                            <li class="<?php echo isset($_GET["estado"]) ? ($_GET["estado"] == 1 ? "activeFilter" : "") : "" ?>">
                                <a href="productDetails?<?php echo "id=".$_GET["id"]."&estado=1"?>">Activos</a>
                            </li>
                            <li class="<?php echo isset($_GET["estado"]) ? ($_GET["estado"] == 0 ? "activeFilter" : "") : "" ?>">
                                <a href="productDetails?<?php echo "id=".$_GET["id"]."&estado=0"?>">Desactivados</a>
                            </li>
                        </ul>
                    </li>
                    <li class="filterClean">
                        <a href="productDetails?<?php echo "id=".$_GET["id"]?>">Limpiar Filtros</a>
                    </li>
                </ul>
            </div>
            <div class="col">
                <ul>
                    <?php foreach ($this->comentarios as $clave) { ?>
                        <li class="comen-muestra">
                            <?php
                            foreach ($clave as $subclave => $subvalor) {
                                if ($subclave == "Valoracion") {
                                    echo $subclave, ": ";
                                    for ($i = 0; $i < $subvalor; $i++) { ?>
                                        <i class="fas fa-star"></i>
                                    <?php } ?>
                                    <br>
                            <?php } else if ($subclave != "Mostrar" && $subclave != "ID") {
                                    echo $subclave, ": ", $subvalor, "<br>";
                                }
                            } ?>
                            <form action="<?php $_PHP_SELF; ?>" method="POST">
                                <input type="hidden" name="date" value="<?php echo $clave["ID"]; ?>">
                                <input type="submit" name="mostrarComment" value="<?php echo $clave["Mostrar"] == 0 ? "Activar" : "Desactivar"; ?>">
                            </form>
                        </li>
                    <?php  } ?>
                </ul>
            </div>
        </div>
    </div>
</section>

<?php require "view/footer.php"; ?>