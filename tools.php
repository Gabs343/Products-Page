<?php 
/*_____ARRAYS_____*/
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
        "archivo" => "login.php",
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

function Connection(){
    require("mysql-login.php");
   
    try{
        $connection = new PDO("mysql:host=".$hostname.";port=".$port.";dbname=".$database, $username, $password);
    }catch(PDOException $e){
        print "ERROR!: ".$e->getMessage();
        die();
    }
    return $connection; 
}

function ConsultDB($query){
    $connection = Connection();
    $consult = $connection -> query($query)->fetchAll(PDO::FETCH_ASSOC);
    return $consult;
}

function InsertDB($query){
    $connection = Connection();
    $connection->exec($query);
}

function NavList($a_nav){ ?>
    <ul class="navbar-nav mt-1">
        <?php foreach ($a_nav as $clave) { ?>
            <li class="nav-item <?php NavActive($clave["archivo"]); ?>">
                <a class="nav-link" href="<?php echo $clave["archivo"] == "products.php" ? "products.php?categoria=0&marca=0&condicion=0" : $clave["archivo"]; ?>"><?php echo $clave["nombre"]; ?></a>
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

function ProductInfo($id){
    $queryInfo = "SELECT Nombre, Precio, Descripcion FROM producto WHERE producto.ID = $id";
    $info = ConsultDB($queryInfo);
    return $info;
}

function ProductImages($id){
    $queryImages = "SELECT ruta FROM imagen
                    INNER JOIN producto ON ID_Producto = producto.ID
                    WHERE producto.ID = $id";

    $productImages = ConsultDB($queryImages);
    return $productImages;
}

function CarouselOfProducts($nombre){ ?>
    <h1><?php echo $nombre == "Nuevo" ? "Nuevos Lanzamientos" : ($nombre == "Destacado" ? "Destacados" : "") ?></h1><hr>
    <div id="carouselId-<?php echo $nombre ?>" class="carousel slide d-none d-md-block carousel-products" data-ride="carousel">
        <div class="carousel-inner" role="listbox">
            <?php 

            $queryProducts = "SELECT producto.ID, producto.Nombre, producto.Precio FROM producto 
                            INNER JOIN condicion  ON ID_Condicion = condicion.ID 
                            WHERE condicion.Nombre = '$nombre'";

            $a_productos = ConsultDB($queryProducts);
            $array = array();
            for ($i = 0; $i < ( count($a_productos) / 4); $i++) { ?>
                <div class="carousel-item <?php echo $i == 0 ? "active" : ""; ?> ">
                    <div class="row">
                        <?php
                        $countProduct = 0;
                        foreach($a_productos as $clave){
                            if(!in_array($clave["ID"], $array)){
                                array_push($array, $clave["ID"]);
                                Product($clave);
                                $countProduct++;
                            }
                            if ($countProduct == 4) {
                                break;
                            } 
                        }
    
                        ?>
                    </div>
                </div>
            <?php } ?>
        </div>
        <?php CarouselControls("carouselId-".$nombre , "left"); CarouselControls("carouselId-".$nombre, "right"); ?>  
    </div>
<?php }

function Product($producto){ ?>
    <?php $ruta = ProductImages($producto["ID"]); ?>

    <div class="col index-product card">
        <a href="product-details.php?id=<?php echo $producto["ID"]; ?>">
            <img src="<?php echo $ruta[0]["ruta"] ?>" alt="First slide" class="w-100">
        </a>
        <div class="card-body">
            <h5 class="etiqueta-nombre"><?php echo $producto["Nombre"]; ?></h5>
            <p class="etiqueta-precio"><?php echo "$ ", $producto["Precio"]; ?></p>
            <span class="btn-shop"><a href=""><i class="fas fa-cart-plus"></i></a></span>
        </div>
    </div>
<?php } 

function FilterList($num, $a_filtros){ ?>
    <li><a href="#collapse_<?php echo $a_filtros[$num] ?>" role="button" data-toggle="collapse"><?php echo ucfirst($a_filtros[$num]) ?></a>
        <ul class="collapse sublist" id="collapse_<?php echo $a_filtros[$num] ?>">
            <?php 
                FilterLink($num);
            ?>
        </ul>
    </li>  
<?php } 

function FilterSublist($id, $idGet, $filterVar){?>
    <li class="<?php echo $id == $idGet ? "activeFilter" : ""; ?>">
        <?php echo $filterVar; ?>
    </li>
<?php } 

function FilterLink($num){
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
    $array = ConsultDB(FilterConsult($filtro1, $filtro2, $filtro3));

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
