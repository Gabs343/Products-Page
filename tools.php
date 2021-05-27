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
function consulta($txt) {?>
<script>
alert("<?php echo $txt; ?>")
</script>
<?php }*/

?>