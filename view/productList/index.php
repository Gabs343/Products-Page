<?php require "view/header.php"; ?>
<section class="container-fluid d-flex mt-5 seccion-productos">
<div class="filtro">
    <div>
        <ul>
            <li><a href="#collapse_Categoria" role="button" data-toggle="collapse">Categoria</a>
                <ul class="collapse sublist" id="collapse_Categoria">
                    <?php foreach($this->categorias as $clave){ ?>
                        <li class="<?php echo $clave["ID"] == $_GET["categoria"] ? "activeFilter" : ""; ?>">
                            <a href="productList?<?php echo "categoria=".$clave["ID"].
                                                        "&marca=".$_GET["marca"].
                                                        "&condicion=".$_GET["condicion"].
                                                        "&orden=".$_GET["orden"];?>">
                            <?php echo $clave["Nombre"];?></a> 
                        </li>
                    <?php } ?>
                </ul>
            </li>

            <li><a href="#collapse_Marca" role="button" data-toggle="collapse">Marca</a>
                <ul class="collapse sublist" id="collapse_Marca">
                    <?php foreach($this->marcas as $clave){ ?>
                        <li class="<?php echo $clave["ID"] == $_GET["marca"] ? "activeFilter" : ""; ?>">
                            <a href="productList?<?php echo "categoria=".$_GET["categoria"].
                                                        "&marca=".$clave["ID"].
                                                        "&condicion=".$_GET["condicion"].
                                                        "&orden=".$_GET["orden"];?>">
                            <?php echo $clave["Nombre"];?></a> 
                        </li>
                    <?php } ?>
                </ul>
            </li>

            <li><a href="#collapse_Condicion" role="button" data-toggle="collapse">Condicion</a>
                <ul class="collapse sublist" id="collapse_Condicion">
                    <?php foreach($this->condiciones as $clave){ ?>
                        <li class="<?php echo $clave["ID"] == $_GET["condicion"] ? "activeFilter" : ""; ?>">
                            <a href="productList?<?php echo "categoria=".$_GET["categoria"].
                                                        "&marca=".$_GET["marca"].
                                                        "&condicion=".$clave["ID"].
                                                        "&orden=".$_GET["orden"];?>">
                            <?php echo $clave["Nombre"];?></a> 
                        </li>
                    <?php } ?>
                </ul>
            </li>

            <li><a href="#collapse_Orden" role="button" data-toggle="collapse">Orden</a>
                <ul class="collapse sublist" id="collapse_Orden">
                    <li class="<?php echo "ASC" == $_GET["orden"] ? "activeFilter" : "" ?>">
                        <a href="productList?<?php echo "categoria=".$_GET["categoria"].
                                                        "&marca=".$_GET["marca"].
                                                        "&condicion=".$_GET["condicion"]?>
                                                        &orden=ASC">Ascendente</a>
                    </li>
                    <li class="<?php echo "DESC" == $_GET["orden"] ? "activeFilter" : "" ?>">
                        <a href="productList?<?php echo "categoria=".$_GET["categoria"].
                                                        "&marca=".$_GET["marca"].
                                                        "&condicion=".$_GET["condicion"]?>
                                                        &orden=DESC">Descendente</a>
                    </li>
                </ul>
            </li>

            <li class="filterClean">
                <a href="productList?categoria=&marca=&condicion=&orden=">Limpiar Filtros</a>
            </li>
        </ul>
    </div>
</div>

<div>


</div>
</section>
<?php require "view/footer.php"; ?>
</body>