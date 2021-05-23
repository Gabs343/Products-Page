<?php 
function CarouselControls($idCarousel, $direction){ ?>
    <a class="carousel-control-<?php echo $direction == "left" ? "prev" : ($direction == "right" ? "next" : "") ?>"
        href="#<?php echo $idCarousel ?>" role="button"
        data-slide="<?php echo $direction == "left" ? "prev" : ($direction == "right" ? "next" : "") ?>">
        <span aria-hidden="true"><i class="fas fa-arrow-circle-<?php echo $direction ?>"></i></span>
        <span class="sr-only">
            <?php echo $direction == "left" ? "Previous" : ($direction == "right" ? "Next" : "") ?> 
        </span>
    </a>
<?php }

function TextDescription($string){
    $array_text = str_split($string);
    for($i = 0; $i < sizeof($array_text); $i++ ){
        echo $array_text[$i];
        echo $array_text[$i] == "." ? "<br><br>" : "";
    }
}
/*
$a_orden = array(
    1 => array(
        "Nombre" => "Ascendente",
        "Codigo" => "ASC"
    ),
    2 => array(
        "Nombre" => "Descendente",
        "Codigo" => "DESC"
    )
);

function FilterList($num, $array){ ?>
<li><a href="#collapse_<?php echo $array[$num] ?>" role="button"
        data-toggle="collapse"><?php echo ucfirst($array[$num]) ?></a>
    <ul class="collapse sublist" id="collapse_<?php echo $array[$num] ?>">
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
        
        $link = "<a href='products.php?".$filtro1."=".$clave["ID"]."&".$filtro2."=".$_GET[$filtro2]."&".$filtro3."=".$_GET[$filtro3]."&orden=".$_GET["orden"]."'>".$clave["Nombre"]."</a> ";
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
        $query = "SELECT ID, Nombre FROM $filtro1
                INNER JOIN $tabla1 ON ID = $tabla1.ID_$filtro1 AND $tabla1.ID_$filtro2= $_GET[$filtro2]
                INNER JOIN $tabla2 ON ID = $tabla2.ID_$filtro1 AND $tabla2.ID_$filtro3 = $_GET[$filtro3]
                WHERE ID = $_GET[$filtro1]";
    }else if($_GET[$filtro1] != 0 && $_GET[$filtro2] != 0 && $_GET[$filtro3] == 0){
       $query = "SELECT ID, Nombre FROM $filtro1
                INNER JOIN $tabla1 ON ID = $tabla1.ID_$filtro1 AND $tabla1.ID_$filtro2 = $_GET[$filtro2]
                WHERE ID = $_GET[$filtro1]"; 
    }else if($_GET[$filtro1] != 0 && $_GET[$filtro3] != 0 && $_GET[$filtro2] == 0){
        $query = "SELECT ID, Nombre FROM $filtro1
                INNER JOIN $tabla2 ON ID = $tabla2.ID_$filtro1 AND $tabla2.ID_$filtro3 = $_GET[$filtro3]
                WHERE ID = $_GET[$filtro1]"; 
    }else if($_GET[$filtro2] != 0 && $_GET[$filtro3] != 0 && $_GET[$filtro1] == 0){
        $query = "SELECT ID, Nombre FROM $filtro1
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

function consulta($txt) {?>
<script>
alert("<?php echo $txt; ?>")
</script>
<?php }*/

?>