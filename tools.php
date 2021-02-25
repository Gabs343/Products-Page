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

$a_banners = array(
    1 => "img/Banner1.jpg",
    2 => "img/Banner2.jpg"
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

function Banners($a_banners, $idCarousel){?>
    <ol class="carousel-indicators">
        <?php 
            for($i = 0; $i < sizeof($a_banners); $i++){?>
                <li data-target = "<?php echo "#".$idCarousel?>" data-slide-to="<?php echo $i ?>" class="<?php echo $i == 0 ? "active" : "" ?>"></li>
            <?php } ?>
    </ol>
    <div class="carousel-inner">
        <?php 
            for($k = 1; $k <= sizeof($a_banners); $k++){?>
                <div class = "carousel-item <?php echo $k == 1 ? "active" : "" ?>">
                    <img src="<?php echo $a_banners[$k]; ?>" class="d-block w-100" alt="...">
                </div>
            <?php } ?>
    </div>
    <?php 
        CarouselControls($idCarousel, "left");
        CarouselControls($idCarousel, "right");
    ?>  
<?php }

function CarouselControls($idCarousel, $direction){ ?>
    <a class="carousel-control-<?php echo $direction == "left" ? "prev" : ($direction == "right" ? "next" : "") ?>" href="#<?php echo $idCarousel ?>" role="button" data-slide="<?php echo $direction == "left" ? "prev" : ($direction == "right" ? "next" : "") ?>" >
        <span aria-hidden="true"><i class="fas fa-arrow-circle-<?php echo $direction ?>"></i></span>
        <span class="sr-only"><php <?php echo $direction == "left" ? "Previous" : ($direction == "right" ? "Next" : "") ?> ?></span>
    </a>
<?php }

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
    <div id="carouselId-<?php echo $nombre ?>" class="carousel slide d-none d-md-block carousel-products" data-ride="carousel">
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
        <?php 
            CarouselControls("carouselId-".$nombre , "left");
            CarouselControls("carouselId-".$nombre, "right");
        ?>  

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
                CarouselControls("carouselId-".$nombre , "left");
                CarouselControls("carouselId-".$nombre, "right");
            ?>  
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

function FilterList($array, $filtro1, $filtro2, $filtro3){ ?>

    <li><a href="#collapse_<?php echo $filtro1 ?>"} role="button" data-toggle="collapse"><?php echo ucfirst($filtro1) ?></a>
        <ul class="collapse sublist" id="collapse_<?php echo $filtro1 ?>">
            <?php 
                FilterLink($array, $filtro1, $filtro2, $filtro3);
            ?>
        </ul>
    </li>  
<?php } 

function FilterSublist($id, $idGet, $filterVar){?>
    <li class="<?php echo $id == $idGet ? "activeFilter" : ""; ?>">
        <?php echo $filterVar; ?>
    </li>
<?php } 

function FilterLink($array, $filtro1, $filtro2, $filtro3){
    
    foreach($array as $clave){
        
        $link = "<a href='products.php?".$filtro1."=".$clave["id_".$filtro1]."&".$filtro2;
        $linkName = $clave[$filtro1]."</a> ";

        $linkFilter = $link."=&".$filtro3."='>".$linkName;
        $linkFilter2 = $link."=".$_GET[$filtro2]."&".$filtro3."='>".$linkName;
        $linkFilter3 = $link."=&".$filtro3."=".$_GET[$filtro3]."'>".$linkName;
        $linkAllFilters = $link."=".$_GET[$filtro2]."&".$filtro3."=".$_GET[$filtro3]."'>".$linkName; 

        if(isset($_GET[$filtro1]) && isset($_GET[$filtro2]) && isset($_GET[$filtro3])){
            FilterSublist($clave["id_".$filtro1], $_GET[$filtro1], $linkAllFilters);

        } else if(isset($_GET[$filtro3])){ 
            FilterSublist($clave["id_".$filtro1], $_GET[$filtro1], $linkFilter3);

        } else if(isset($_GET[$filtro2])){
            FilterSublist($clave["id_".$filtro1], $_GET[$filtro1], $linkFilter2);

        }else{
            FilterSublist($clave["id_".$filtro1], $_GET[$filtro1], $linkFilter);
        }
    }
}

function TextDescription($string){
    $array_text = str_split($string);

    for($i = 0; $i < sizeof($array_text); $i++ ){

        echo $array_text[$i];
        echo $array_text[$i] == "." ? "<br><br>" : "";
    }
}
?>
