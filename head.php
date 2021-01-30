<?php

    $a_productos = array(
        1 => array(
            "id_producto" => 1,
            "imagen" => "img/auricular1.png",
            "nombre" => "Memecoleous H112",
            "descripcion" => "El Redragon Memecoleous ofrece un increíble nivel de sonido a gamers gracias a su sonido diseñado a medida.",
            "precio" => 999,
            "id_marca" => 1,
            "id_categoria" => 1,
            "nuevo" => false,
            "destacado" => false,
            "proximamente" => false,
            "especificaciones" => array(
                "Tipo de salida" => "Stereo",
                "Tipo de copa" => "Circumaurales: Este tipo de auriculares se coloca rodeando completamente la oreja. Tacto suave y con aislamiento pasivo",
                "Material Diadema" => "Metálica, flexible. Integrada a la estructura",
                "Tipo de cable" => "2 m Engomado de alta resistencia.",
                "Diametro del diafragma" => "50 mm con imanes de neodimio",
                "Vibración" => "Si. Motor de vibración 30 mm",
                "Peso" => "450 gr"
            )
        ),

        2 => array(
            "id_producto" => 2,
            "imagen" => "img/teclado1.png",
            "nombre" => "Kumara K552",
            "descripcion" => "",
            "precio" => 999,
            "id_marca" => 1,
            "id_categoria" => 1,
            "nuevo" => false,
            "destacado" => false,
            "proximamente" => false,
            "especificaciones" => array()
        ),

        3 => array(
            "id_producto" => 3,
            "imagen" => "img/mouse1.png",
            "nombre" => "Deathadder V2",
            "descripcion" => "",
            "precio" => 999,
            "id_marca" => 1,
            "id_categoria" => 1,
            "nuevo" => false,
            "destacado" => false,
            "proximamente" => false,
            "especificaciones" => array()
        ),

        4 => array(
            "id_producto" => 4,
            "imagen" => "img/controller1.png",
            "nombre" => "Joystick Xbox",
            "descripcion" => "",
            "precio" => 999,
            "id_marca" => 1,
            "id_categoria" => 1,
            "nuevo" => false,
            "destacado" => false,
            "proximamente" => false,
            "especificaciones" => array()
        ),

        5 => array(
            "id_producto" => 5,
            "imagen" => "img/teclado2.png",
            "nombre" => "Prodigy G213",
            "descripcion" => "",
            "precio" => 999,
            "id_marca" => 1,
            "id_categoria" => 1,
            "nuevo" => false,
            "destacado" => false,
            "proximamente" => false,
            "especificaciones" => array()
        )
    );

    $json_productos = json_encode($a_productos);
    file_put_contents("productos.json", $json_productos);

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
    ));
    
    function NavList($a_nav){?>
        <ul class="navbar-nav mt-1">
            <?php foreach($a_nav as $clave => $valor){?>
            <li class="nav-item <?php NavActive($valor["archivo"]); ?>">
                <a class="nav-link" href="<?php echo $valor["archivo"];?>"><?php echo $valor["nombre"];?></a>
            </li>
            <?php } ?>
        </ul>
        <?php
        
    }

    function NavActive($itemNav){
        echo strpos($_SERVER["SCRIPT_NAME"], $itemNav) ? "active" : "";
    }

    function Producto($id_producto, $a_productos){?>
        <div class="col index-product card">
            <a href="">
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

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
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId"
            aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse " id="collapsibleNavId">
            <?php NavList($items_navlist);?>
        </div>

    </nav>