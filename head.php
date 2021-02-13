<?php

$a_productos = json_decode(file_get_contents("productos.json"), true);

$a_categorias = json_decode(file_get_contents("categorias.json"), true);

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

function NavList($a_nav){ ?>
    <ul class="navbar-nav mt-1">
        <?php foreach ($a_nav as $clave => $valor) { ?>
            <li class="nav-item <?php NavActive($valor["archivo"]); ?>">
                <a class="nav-link" href="<?php echo $valor["archivo"] == "products.php" ? "products.php?categoria=0" : $valor["archivo"]; ?>"><?php echo $valor["nombre"]; ?></a>
            </li>
        <?php } ?>
    </ul>
<?php }

function NavActive($itemNav){
    echo strpos($_SERVER["SCRIPT_NAME"], $itemNav) ? "active" : "";
}

function numberOfProducts($condicion, $a_productos){
    $numberOfProducts = 0;
    foreach ($a_productos as $clave => $valor) {
        if ($valor[$condicion]) {
            $numberOfProducts++;
        }
    }
    return $numberOfProducts;
}

function carouselOfProducts($nombre, $a_productos){ ?>

    <h1>
        <?php echo $nombre == "nuevo" ? "Nuevos Lanzamientos" : ($nombre == "destacado" ? "Destacados" : "") ?>
    </h1>
    <hr>
    <div id="carouselId-<?php echo $nombre ?>" class="carousel slide d-none d-md-block" data-ride="carousel">
        <div class="carousel-inner" role="listbox">
            <?php
            $idProducto = 1;
            for ($i = 0; $i < (numberOfProducts($nombre, $a_productos) / 4); $i++) { ?>
                <div class="carousel-item <?php echo $i == 0 ? "active" : ""; ?> ">
                    <div class="row">
                        <?php
                        $countProduct = 0;

                        for ($k = 1; $k <= count($a_productos); $k++) {

                            if ($a_productos[$idProducto][$nombre]) {
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


function carouselSmallOfProducts($nombre, $a_productos){ ?>

    <div id="carouselSmallId-<?php echo $nombre ?>" class="carousel slide d-sm-none" data-ride="carousel">
        <div class="carousel-inner" role="listbox">
            <?php 
                $idProducto = 1;
                for ($i = 0; $i < count($a_productos); $i++) {
                    if ($a_productos[$idProducto][$nombre]) {?>
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
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PPT</title>

    <!--Vincula bootstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <!--Vincula el archivo css -->
    <link rel="stylesheet" href="estilos/estilos.css">

    <!--Iconos de Fontawesome -->
    <script src="https://kit.fontawesome.com/cedf025736.js" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!--<script src="jquery.js"></script>-->

</head>

<body>
    <nav class=" navbar navbar-expand-sm navbar-dark">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse " id="collapsibleNavId">
            <?php NavList($items_navlist); ?>
        </div>

    </nav>