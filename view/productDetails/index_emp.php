<?php require "view/header.php"; ?>
<form action="<?php $_PHP_SELF; ?>" method="POST">

    <section class="d-sm-flex product-info">
        <div>
            <input class="display-3 text-center" type="text" placeholder="<?php echo $this->producto->nombre; ?>">
            <hr class="linea">
            <p><textarea name="" id="" cols="80" rows="10" placeholder="<?php echo $this->producto->descripcion; ?>"></textarea></p>
        </div>

        <div class="product-img">
            <img src="<?php echo $this->producto->imagen; ?>" alt="" class="d-block w-100">
            <div class="shop-buttons mt-5">
                <h3><input type="number" placeholder="$ <?php echo $this->producto->precio; ?>"></h3>
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


    </section>
</form>

<section class="product-comments pb-5">
    <div class="container">
        <h2 class="display-4 comen-m">Comentarios</h2>
        <hr class="linea">
        <div class="row">
            <div class="col">

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