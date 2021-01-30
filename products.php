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
        <?php 
            for($i = 1; $i <= sizeof($a_productos); $i++){
                Producto($i, $a_productos);
            }

        ?>
             
    </div>
</section>

<?php 
    require_once("footer.php");
?>