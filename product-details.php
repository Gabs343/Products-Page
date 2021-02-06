<?php
    require_once("head.php");
?>

<section class="d-flex container-fluid">

    <div class="mt-3">
        <h1 class="display-3 text-center"><?php echo $a_productos[1]["nombre"]; ?></h1>
        <p>
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. 
            Possimus earum ratione praesentium fugiat iure dignissimos odio quis saepe nesciunt nobis 
            eligendi ea corrupti maxime, magni non ullam delectus. Tenetur, odit? <br>

            <br>Lorem ipsum, dolor sit amet consectetur adipisicing elit. 
            Possimus earum ratione praesentium fugiat iure dignissimos odio quis saepe nesciunt nobis 
            eligendi ea corrupti maxime, magni non ullam delectus. Tenetur, odit?<br>

            <br>Lorem ipsum, dolor sit amet consectetur adipisicing elit. 
            Possimus earum ratione praesentium fugiat iure dignissimos odio quis saepe nesciunt nobis 
            eligendi ea corrupti maxime, magni non ullam delectus. Tenetur, odit?
        </p>
    </div>

    <div>
        <img src="<?php echo $a_productos[1]["imagen"]; ?>" alt="" >
        <div>
            <a href="">Comprar</a>
            <a href="">Añadir al Carrito</a>
        </div>
        
    </div>

</section>

<section></section>

<section></section>

<?php 
    require_once("footer.php");
?>