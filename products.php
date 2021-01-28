<?php
    require_once("head.php");
?>

<section class="container-fluid d-flex mt-5">
    <div class="filtro">
        <ul>
            <li><a href="#collapseCategoria" role="button" data-toggle="collapse">Categorias</a>
                <ul class="collapse sublist-menu" id="collapseCategoria">
                    <li>Auriculares</li>
                    <li>Teclados</li>
                    <li>Mouse</li>
                    <li>Gamepads</li>
                </ul>
            </li>
            
            <li><a href="#collapseMarca" role="button" data-toggle="collapse">Marcas</a>
                <ul class="collapse sublist-menu" id="collapseMarca"></ul>
            </li>

            <li><a href="#collapseCondicion" role="button" data-toggle="collapse">Condición</a>
                <ul class="collapse sublist-menu" id="collapseCondicion">
                    <li>Nuevo</li>
                    <li>Destacado</li>
                    <li>Proximamente</li>
                </ul>
            </li>

            <li><a href="#collapsePrecio" role="button" data-toggle="collapse">Precio</a>
                <ul class="collapse sublist-menu" id="collapsePrecio">
                    
                </ul>
            </li>
        </ul>
    </div>

    <div class="row row-cols-6">
        <div class="col index-product card">
            <a href="">
                <img src="img/auricular1.png" alt="First slide" class="w-100">    
            </a>
                <div class="card-body">
                    <h5 class="etiqueta-nombre">Nombre</h5>
                    <p class="etiqueta-precio">Precio</p>
                    <span class="btn-shop"><a href=""><i class="fas fa-cart-plus"></i></a></span>
                </div>
        </div>
        <div class="col index-product card">
            <a href="">
                <img src="img/auricular1.png" alt="First slide" class="w-100">    
            </a>
                <div class="card-body">
                    <h5 class="etiqueta-nombre">Nombre</h5>
                    <p class="etiqueta-precio">Precio</p>
                    <span class="btn-shop"><a href=""><i class="fas fa-cart-plus"></i></a></span>
                </div>
        </div>
        <div class="col index-product card">
            <a href="">
                <img src="img/auricular1.png" alt="First slide" class="w-100">    
            </a>
                <div class="card-body">
                    <h5 class="etiqueta-nombre">Nombre</h5>
                    <p class="etiqueta-precio">Precio</p>
                    <span class="btn-shop"><a href=""><i class="fas fa-cart-plus"></i></a></span>
                </div>
        </div>
        <div class="col index-product card">
            <a href="">
                <img src="img/auricular1.png" alt="First slide" class="w-100">    
            </a>
                <div class="card-body">
                    <h5 class="etiqueta-nombre">Nombre</h5>
                    <p class="etiqueta-precio">Precio</p>
                    <span class="btn-shop"><a href=""><i class="fas fa-cart-plus"></i></a></span>
                </div>
        </div>

        <div class="col index-product card">
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
</section>

<?php 
    require_once("footer.php");
?>