<?php 
require_once("mysql-login.php");

try{
    $connection = new PDO("mysql:host=".$hostname.";port=".$port.";dbname=".$database, $username, $password);
}catch(PDOException $e){
    print "ERROR!: ".$e->getMessage();
    die();
}

/*_____ARRAYS_____*/
$a_productos = json_decode(file_get_contents("jsons/productos.json"), true);

$a_comentarios = json_decode(file_get_contents("jsons/comentarios.json"), true);

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

$a_filtros = array(
    1 => "categoria",
    2 => "marca",
    3 => "condicion"
);
/*_____FUNCTIONS_____*/

function NavList($a_nav){ ?>
    <ul class="navbar-nav mt-1">
        <?php foreach ($a_nav as $clave => $valor) { ?>
            <li class="nav-item <?php NavActive($valor["archivo"]); ?>">
                <a class="nav-link" href="<?php echo $valor["archivo"] == "products.php" ? "products.php?categoria=0&marca=0&condicion=0" : $valor["archivo"]; ?>"><?php echo $valor["nombre"]; ?></a>
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
function CarouselOfProducts($nombre, $a_productos, $connection){ ?>
    <h1><?php echo $nombre == "Nuevo" ? "Nuevos Lanzamientos" : ($nombre == "Destacado" ? "Destacados" : "") ?></h1><hr>
    <div id="carouselId-<?php echo $nombre ?>" class="carousel slide d-none d-md-block carousel-products" data-ride="carousel">
        <div class="carousel-inner" role="listbox">
            <?php 
            $query = "SELECT * FROM condicion";
            $a_condiciones = $connection->query($query);

            $idProducto = 1;
            $numberOfProducts = 0;
            foreach($a_condiciones as $clave){
                if($clave["Nombre"] == $nombre){ 
                    $id = $clave["ID"];
                    
                    foreach ($a_productos as $clave_pr) {
                        if ($clave_pr["id_condicion"] == $id) {
                            $numberOfProducts++;        
                        }
                    }
                }
            }
            
            for ($i = 0; $i < ($numberOfProducts / 4); $i++) { ?>
                <div class="carousel-item <?php echo $i == 0 ? "active" : ""; ?> ">
                    <div class="row">
                        <?php
                        $countProduct = 0;
                        for ($k = 1; $k <= count($a_productos); $k++) {
                            
                            if ($a_productos[$idProducto]["id_condicion"] == $id) {
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
function FilterList($num, $a_filtros, $connection){ ?>
    <li><a href="#collapse_<?php echo $a_filtros[$num] ?>" role="button" data-toggle="collapse"><?php echo ucfirst($a_filtros[$num]) ?></a>
        <ul class="collapse sublist" id="collapse_<?php echo $a_filtros[$num] ?>">
            <?php 
                FilterLink($num, $connection);
            ?>
        </ul>
    </li>  
<?php } 
function FilterSublist($id, $idGet, $filterVar){?>
    <li class="<?php echo $id == $idGet ? "activeFilter" : ""; ?>">
        <?php echo $filterVar; ?>
    </li>
<?php } 
function FilterLink($num, $connection){
    switch ($num) {
        case 1:
            $filtro1 = "categoria";
            $filtro2 = "marca";
            $filtro3 = "condicion";
            break;
        case 2:
            $filtro1 = "marca";
            $filtro2 = "categoria";
            $filtro3 = "condicion";
            break;
        case 3:
            $filtro1 = "condicion";
            $filtro2 = "marca";
            $filtro3 = "categoria";
            break;
    }
    $array = $connection->query(FilterConsult($filtro1, $filtro2, $filtro3));

    foreach($array as $clave){
        
        $link = "<a href='products.php?".$filtro1."=".$clave["ID"]."&".$filtro2."=".$_GET[$filtro2]."&".$filtro3."=".$_GET[$filtro3]."'>".$clave["Nombre"]."</a> ";
        FilterSublist($clave["ID"], $_GET[$filtro1], $link);
      
    }
}

function FilterConsult ($filtro1, $filtro2, $filtro3){
    switch($filtro1){
        case "categoria":
            $tabla1 = "rel_categoria_marca";
            $tabla2 = "rel_categoria_condicion";
            break;
        case "marca":
            $tabla1 = "rel_categoria_marca";
            $tabla2 = "rel_marca_condicion";
            break;
        case "condicion":
            $tabla1 = "rel_marca_condicion";
            $tabla2 = "rel_categoria_condicion";
            break;
    }
   
    if($_GET[$filtro1] != 0 && $_GET[$filtro2] != 0 && $_GET[$filtro3] != 0){
        $query = "SELECT ID, Nombre
                FROM $filtro1
                INNER JOIN $tabla1 ON ID = $tabla1.ID_$filtro1 AND $tabla1.ID_$filtro2= $_GET[$filtro2]
                INNER JOIN $tabla2 ON ID = $tabla2.ID_$filtro1 AND $tabla2.ID_$filtro3 = $_GET[$filtro3]
                WHERE ID = $_GET[$filtro1]";
    }else if($_GET[$filtro1] != 0 && $_GET[$filtro2] != 0 && $_GET[$filtro3] == 0){
       $query = "SELECT ID, Nombre
                FROM $filtro1
                INNER JOIN $tabla1 ON ID = $tabla1.ID_$filtro1 AND $tabla1.ID_$filtro2 = $_GET[$filtro2]
                WHERE ID = $_GET[$filtro1]"; 
    }else if($_GET[$filtro1] != 0 && $_GET[$filtro3] != 0 && $_GET[$filtro2] == 0){
        $query = "SELECT ID, Nombre
                FROM $filtro1
                INNER JOIN $tabla2 ON ID = $tabla2.ID_$filtro1 AND $tabla2.ID_$filtro3 = $_GET[$filtro3]
                WHERE ID = $_GET[$filtro1]"; 
    }else if($_GET[$filtro2] != 0 && $_GET[$filtro3] != 0 && $_GET[$filtro1] == 0){
        $query = "SELECT ID, Nombre
                FROM $filtro1
                INNER JOIN $tabla1 ON ID = $tabla1.ID_$filtro1 AND $tabla1.ID_$filtro2= $_GET[$filtro2]
                INNER JOIN $tabla2 ON ID = $tabla2.ID_$filtro1 AND $tabla2.ID_$filtro3= $_GET[$filtro3]";
    }else if($_GET[$filtro2] != 0 && $_GET[$filtro1] == 0 && $_GET[$filtro3] == 0){
        $query = "SELECT * FROM $filtro1 INNER JOIN $tabla1 ON ID = $tabla1.ID_$filtro1 AND $tabla1.ID_$filtro2 = $_GET[$filtro2]";
    }else if($_GET[$filtro3] != 0 && $_GET[$filtro2] == 0 && $_GET[$filtro1] == 0){
        $query = "SELECT * FROM $filtro1 INNER JOIN $tabla2 ON ID = $tabla2.ID_$filtro1 AND $tabla2.ID_$filtro3 = $_GET[$filtro3]";;
    }else if($_GET[$filtro1] != 0 && $_GET[$filtro3] == 0 && $_GET[$filtro2] == 0){
        $query = "SELECT * FROM $filtro1 WHERE ID = $_GET[$filtro1]";
    }else{
        $query = "SELECT * FROM $filtro1";
    }
    return $query;
}

function TextDescription($string){
    $array_text = str_split($string);
    for($i = 0; $i < sizeof($array_text); $i++ ){
        echo $array_text[$i];
        echo $array_text[$i] == "." ? "<br><br>" : "";
    }
}
?>
