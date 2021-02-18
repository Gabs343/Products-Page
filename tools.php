<?php 

/*_____ARRAYS_____*/
$a_productos = json_decode(file_get_contents("jsons/productos.json"), true);

$a_categorias = json_decode(file_get_contents("jsons/categorias.json"), true);

$a_condiciones = json_decode(file_get_contents("jsons/condiciones.json"), true);

$a_marcas = json_decode(file_get_contents("jsons/marcas.json"), true);

$items_navlist = array(
    1 => array(
        "archivo" => "index.php",
        "nombre" => "Home"
    ),
    2 => array(
        "archivo" => "",
        "nombre" => "Nosotros"
    ),
    3 => array(
        "archivo" => "products.php",
        "nombre" => "Productos"
    ),
    4 => array(
        "archivo" => "",
        "nombre" => "Contacto"
    ),
    5 => array(
        "archivo" => "",
        "nombre" => "Ingresar"
    )
);


/*_____FUNCTIONS_____*/
function NavList($a_nav){ ?>
    <ul class="navbar-nav mt-1">
        <?php foreach ($a_nav as $clave => $valor) { ?>
            <li class="nav-item <?php NavActive($valor["archivo"]); ?>">
                <a class="nav-link" href="<?php echo $valor["archivo"] == "products.php" ? "products.php?categoria&marca&condicion" : $valor["archivo"]; ?>"><?php echo $valor["nombre"]; ?></a>
            </li>
        <?php } ?>
    </ul>
<?php }

function NavActive($itemNav){
    echo strpos($_SERVER["SCRIPT_NAME"], $itemNav) ? "active" : "";
}

function NumberOfProducts($condicion, $a_productos, $a_condiciones){
    $numberOfProducts = 0;
    foreach($a_condiciones as $clave => $valor){
        if($valor["condicion"] == $condicion){
            $idCondicion = $valor["id_condicion"];
        }
    }
    foreach ($a_productos as $clave => $valor) {
        if ($valor["id_condicion"] == $idCondicion) {
            $numberOfProducts++;
        }
    }
    return $numberOfProducts;
}

function CarouselOfProducts($nombre, $a_productos, $a_condiciones){ ?>

    <h1>
        <?php echo $nombre == "Nuevo" ? "Nuevos Lanzamientos" : ($nombre == "Destacado" ? "Destacados" : "") ?>
    </h1>
    <hr>
    <div id="carouselId-<?php echo $nombre ?>" class="carousel slide d-none d-md-block" data-ride="carousel">
        <div class="carousel-inner" role="listbox">
            <?php
            $idProducto = 1;
            foreach($a_condiciones as $clave => $valor){
                if($valor["condicion"] == $nombre){
                    $idCondicion = $valor["id_condicion"];
                }
            }
            for ($i = 0; $i < (NumberOfProducts($nombre, $a_productos, $a_condiciones) / 4); $i++) { ?>
                <div class="carousel-item <?php echo $i == 0 ? "active" : ""; ?> ">
                    <div class="row">
                        <?php
                        $countProduct = 0;

                        for ($k = 1; $k <= count($a_productos); $k++) {
                            
                            if ($a_productos[$idProducto]["id_condicion"] == $idCondicion) {
                                Producto($idProducto, $a_productos);
                                $countProduct++;

                                if ($countProduct == 4) {
                                    $idProducto++;
                                    break;
                                }
                            }

                            $idProducto == count($a_productos) ? $idProducto = 1 : $idProducto++;
                        }

                        ?>
                    </div>
                </div>
            <?php }
            ?>
        </div>
        <a class="carousel-control-prev index-product-control" href="#carouselId-<?php echo $nombre ?>" role="button"
                    data-slide="prev">
                    <span aria-hidden="true"><i class="fas fa-arrow-circle-left"></i></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next index-product-control" href="#carouselId-<?php echo $nombre ?>" role="button"
                    data-slide="next">
                    <span aria-hidden="true"><i class="fas fa-arrow-circle-right"></i></span>
                    <span class="sr-only">Next</span>
                </a>

    </div>

<?php }


function CarouselSmallOfProducts($nombre, $a_productos, $a_condiciones){ ?>

    <div id="carouselSmallId-<?php echo $nombre ?>" class="carousel slide d-sm-none" data-ride="carousel">
        <div class="carousel-inner" role="listbox">
            <?php 
                $idProducto = 1;
                foreach($a_condiciones as $clave => $valor){
                    if($valor["condicion"] == $nombre){
                        $idCondicion = $valor["id_condicion"];
                    }
                }
                for ($i = 0; $i < count($a_productos); $i++) {
                    if ($a_productos[$idProducto]["id_condicion"] == $idCondicion) {?>
                        <div class="carousel-item <?php echo $i == 0 ? "active" : ""; ?> ">
                            <?php
                            
                                Producto($idProducto, $a_productos);
                            
                                
                            ?>
                        </div>
                <?php }else{
                    $i--;
                }
                    $idProducto == count($a_productos) ? $idProducto = 1 : $idProducto++;
                }
            ?>

            <a class="carousel-control-prev index-product-control" href="#carouselSmallId-<?php echo $nombre ?>" role="button"
                data-slide="prev">
                <span aria-hidden="true"><i class="fas fa-arrow-circle-left"></i></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next index-product-control" href="#carouselSmallId-<?php echo $nombre ?>" role="button"
                data-slide="next">
                <span aria-hidden="true"><i class="fas fa-arrow-circle-right"></i></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        
    </div>
<?php }


function Producto($id_producto, $a_productos){ ?>
    <div class="col index-product card">
        <a href="product-details.php?id=<?php echo $id_producto; ?>">
            <img src="<?php echo $a_productos[$id_producto]["imagen"]; ?>" alt="First slide" class="w-100">
        </a>
        <div class="card-body">
            <h5 class="etiqueta-nombre"><?php echo $a_productos[$id_producto]["nombre"]; ?></h5>
            <p class="etiqueta-precio"><?php echo "$ ", $a_productos[$id_producto]["precio"]; ?></p>
            <span class="btn-shop"><a href=""><i class="fas fa-cart-plus"></i></a></span>
        </div>
    </div>
<?php } 

function FilterList($array, $filtro1, $filtro2, $filtro3){
    
    foreach($array as $clave){
        
        $linkFilter = "<a href='products.php?".$filtro1."=".$clave["id_".$filtro1]."&".$filtro2."=&".$filtro3."='>".$clave[$filtro1]."</a> ";
        $linkFilter2 = "<a href='products.php?".$filtro1."=".$clave["id_".$filtro1]."&".$filtro2."=".$_GET["marca"]."&".$filtro3."='>".$clave[$filtro1]."</a> ";
        $linkFilter3 = "<a href='products.php?".$filtro1."=".$clave["id_".$filtro1]."&".$filtro2."=&".$filtro3."=".$_GET["condicion"]."'>".$clave[$filtro1]."</a> ";
        $linkAllFilters = "<a href='products.php?".$filtro1."=".$clave["id_".$filtro1]."&".$filtro2."=".$_GET["marca"]."&".$filtro3."=".$_GET["condicion"]."'>".$clave[$filtro1]."</a> "; 

        if(isset($_GET[$filtro2]) && isset($_GET[$filtro3])){
            FilterListItem($clave["id_".$filtro1], $_GET[$filtro1], $linkAllFilters);
        } else if(isset($_GET[$filtro3])){ 
            FilterListItem($clave["id_".$filtro1], $_GET[$filtro1], $linkFilter3);
        } else if(isset($_GET[$filtro2])){
            FilterListItem($clave["id_".$filtro1], $_GET[$filtro1], $linkFilter2);
        }else{
            FilterListItem($clave["id_".$filtro1], $_GET[$filtro1], $linkFilter);
        }
    }
}

function FilterListItem($id, $idGet, $filterVar){?>
    <li class="<?php echo $id == $idGet ? "activeFilter" : ""; ?>">
        <?php echo $filterVar; ?>
    </li>
<?php } ?>

