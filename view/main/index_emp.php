<?php require "view/header.php"; ?>
<section class="container m-5">
    <table>
        <thead>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Correo</th>
            <th>Perfil</th>
        </thead>
        <tbody>
            <?php $cont = 0; foreach($this->clientes as $clave){ $cont++;?>
            <form action="<?php $_PHP_SELF;?>" method="POST"> 
                <tr>    
                    <td><input type="hidden" name="key" value="<?php echo $clave["DNI"]; ?>"></td>
                    <td><?php echo $clave["Nombre"]; ?></td>
                    <td><?php echo $clave["Apellido"]; ?></td>
                    <td><?php echo $clave["Correo"]; ?></td>
                    <td><?php if(isset($_POST["editar-".$cont])) { ?>
                        <input type="number" size="3" name="perfil">
                    <?php } else { echo  $clave["ID_Perfil"]; } ?> </td>
                    <td><?php if(isset($_POST["editar-".$cont])) { ?>
                        <input type="submit" name="setPerfil" value="Confirmar"></td>
                    <?php } else { ?>  
                        <input type="submit" name="editar-<?php echo $cont; ?>" value="Editar Perfil"></td>
                    <?php } ?> </td>
                    
                </tr>
               
            </form>
            <?php } ?>
        </tbody>
    </table>
</section>
<?php require "view/footer.php"; ?>