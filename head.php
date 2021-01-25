<?php
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