<?php require_once("head.php"); ?>

<section class="container-fluid d-flex mt-5"><div class="filtro"><div><ul>
            <?php 
                FilterList($a_categorias, "categoria", "marca", "condicion");
                FilterList($a_marcas, "marca", "categoria", "condicion");
                FilterList($a_condiciones, "condicion", "categoria", "marca");
            ?>
            <li class="filterClean"><a href="products.php?categoria=&marca=&condicion=">Limpiar Filtros</a></li>
        </ul></div></div>

    <div class="row row-cols-6">
        <?php 
            for($i = 1; $i <= sizeof($a_productos); $i++){
                $p_categoria = $a_productos[$i]["id_categoria"];
                $g_categoria = $_GET["categoria"];

                $p_condicion = $a_productos[$i]["id_condicion"];
                $g_condicion = $_GET["condicion"];

                $p_marca = $a_productos[$i]["id_marca"];
                $g_marca = $_GET["marca"];

                $allFilters = $p_categoria == $g_categoria && $p_condicion == $g_condicion && $p_marca == $g_marca;
                $noneFilters = $g_categoria == 0 && $g_condicion == 0 && $g_marca == 0;

                if($allFilters || 
                    ($p_categoria == $g_categoria && $p_condicion == $g_condicion && $g_marca == 0) ||
                    ($p_categoria == $g_categoria && $p_marca == $g_marca && $g_condicion == 0) ||
                    ($p_marca == $g_marca && $p_condicion == $g_condicion && $g_categoria == 0) ||

                    ($p_categoria == $g_categoria && $g_condicion == 0 && $g_marca == 0) ||
                    ($p_condicion == $g_condicion && $g_categoria == 0 && $g_marca == 0) || 
                    ($p_marca == $g_marca && $g_categoria == 0 && $g_condicion == 0) ||

                    $noneFilters){

                    Producto($i, $a_productos);
                }
            }

        ?>       
    </div>
</section>

<?php require_once("footer.php"); ?>