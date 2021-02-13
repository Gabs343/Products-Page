<?php
    require_once("head.php");
?>

<section class="container-fluid d-flex mt-5">
    <div class="filtro">
        <div>
        <ul>
            <li><a href="#collapseCategoria" role="button" data-toggle="collapse">Categorias</a>
                <ul class="collapse sublist" id="collapseCategoria">
                    <?php 
                        foreach($a_categorias as $clave){ ?>
                        
                            <li class="activeItem"><a href="products.php?categoria=<?php echo $clave["id_categoria"]; ?>"><?php echo $clave["categoria"]; ?></a></li>
                            
                        <?php } ?>
                </ul>
            </li>
            
            <li><a href="#collapseMarca" role="button" data-toggle="collapse">Marcas</a>
                <ul class="collapse sublist" id="collapseMarca"></ul>
            </li>

            <li><a href="#collapseCondicion" role="button" data-toggle="collapse">Condición</a>
                <ul class="collapse sublist" id="collapseCondicion">
                    <li>Nuevo</li>
                    <li>Destacado</li>
                    <li>Proximamente</li>
                </ul>
            </li>

            <li><a href="#collapsePrecio" role="button" data-toggle="collapse">Precio</a>
                <ul class="collapse sublist" id="collapsePrecio">
                    
                </ul>
            </li>
        </ul>
        </div>
    </div>

    <div class="row row-cols-6">
        <?php 
            for($i = 1; $i <= sizeof($a_productos); $i++){
                $p_categoria = $a_productos[$i]["id_categoria"];
                $g_categoria = $_GET["categoria"];

                if($p_categoria == $g_categoria || $g_categoria == 0){
                    Producto($i, $a_productos);
                }
            }

        ?>
             
    </div>
</section>

<?php 
    require_once("footer.php");
?>