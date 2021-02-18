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
                        FilterList($a_categorias, "categoria", "marca", "condicion");
                    ?>
                </ul>
            </li>
            
            <li><a href="#collapseMarca" role="button" data-toggle="collapse">Marcas</a>
                <ul class="collapse sublist" id="collapseMarca"></ul>
            </li>

            <li><a href="#collapseCondicion" role="button" data-toggle="collapse">Condición</a>
                <ul class="collapse sublist" id="collapseCondicion">
                    <?php 
                        FilterList($a_condiciones, "condicion", "categoria", "marca");
                    ?>
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

                $p_condicion = $a_productos[$i]["id_condicion"];
                $g_condicion = $_GET["condicion"];

                if(($p_categoria == $g_categoria && $p_condicion == $g_condicion) || ($p_categoria == $g_categoria && $g_condicion == 0) || ($p_condicion == $g_condicion && $g_categoria == 0) || ($g_categoria == 0 && $g_condicion == 0)){
                    Producto($i, $a_productos);
                }
            }

        ?>
             
    </div>
</section>

<?php 
    require_once("footer.php");
?>