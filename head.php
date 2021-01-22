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
            <ul class="navbar-nav mt-1">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">Nosotros</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">Productos</a>
                    <div class="dropdown-menu text-right" aria-labelledby="dropdownId">
                        <a class="dropdown-item" href="#">Destacados</a>
                        <a class="dropdown-item" href="#">Nuevos</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contacto</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Ingresar</a>
                </li>
            </ul>

        </div>

    </nav>