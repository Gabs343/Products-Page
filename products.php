<?php require_once("head.php"); ?>

<section class="container-fluid d-flex mt-5"><div class="filtro"><div><ul>
            <?php
                for($i = 1; $i <= sizeof($a_filtros); $i++){
                    FilterList($i, $a_filtros);
                }
            ?>
            <li class="filterClean"><a href="products.php?categoria=0&marca=0&condicion=0">Limpiar Filtros</a></li>
        </ul></div></div>

    <div class="row row-cols-6">
        <?php 
            $queryProducts = "SELECT * FROM producto";
            $a_productos = ConsultDB($queryProducts);

            foreach($a_productos as $clave){

                $p_categoria = intval($clave["ID_Categoria"]);

                $g_categoria = $_GET["categoria"];

                $p_condicion = intval($clave["ID_Condicion"]);
                $g_condicion = $_GET["condicion"];

                $p_marca = intval($clave["ID_Marca"]);
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

                    Product($clave);
                }
            }

        ?>       
    </div>
</section>

<?php require_once("footer.php"); ?>