<?php require "view/header.php"; ?>
<section class="container m-5 <?php echo $this->tienePermiso("EDITUSER") ? "" : "d-none" ?>">
    <h1>Clientes</h1>
    <hr>
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
                    <td><?php echo $clave["Nombre"]; ?></td>
                    <td><?php echo $clave["Apellido"]; ?></td>
                    <td><?php echo $clave["Correo"]; ?></td>
                    <td>
                        <?php if(isset($_POST["editarPer-".$cont])) { ?>
                            <select name="perfiles">
                            <?php foreach($this->perfiles as $claveP) {?>
                                <option value="<?php echo $claveP["ID"]; ?>"><?php echo $claveP["Nombre"]; ?></option>
                            <?php } ?> 
                            </select> <?php } else { echo  $clave["Perfil"]; } ?> </td>
                    <td><?php if(isset($_POST["editarPer-".$cont])) { ?>
                        <input type="submit" name="setPerfil" value="Confirmar"></td>
                    <?php } else { ?>  
                        <input type="submit" name="editarPer-<?php echo $cont; ?>" value="Editar Perfil"></td>
                    <?php } ?> </td>
                    <td><input type="hidden" name="key" value="<?php echo $clave["DNI"]; ?>"></td>
                </tr>
               
            </form>
            <?php } ?>
        </tbody>
    </table>
</section>

<section class="container m-5">
    <h1>Categorias</h1>
    <hr>
    <table>
        <thead>
            <th>Nombre</th>
            <th class="<?php echo $this->tienePermiso("EDITFILTRO") ? "" : "d-none" ?>">Editar</th>
            <th class="<?php echo $this->tienePermiso("DELFILTRO") ? "" : "d-none" ?>">Activar/Desactivar</th>
        </thead>
        <tbody>
            <?php $cont = 0; foreach($this->categorias as $clave) { $cont++;?>
            <form action="<?php $_PHP_SELF;?>" method="POST">
                <tr>
                    <td><?php if(isset($_POST["editarCat-".$cont])) { ?>
                        <input type="text" name="nombre" placeholder="<?php echo $clave["Nombre"]; ?>">
                    <?php } else { echo $clave["Nombre"]; }?></td>
                    <td class="<?php echo $this->tienePermiso("EDITFILTRO") ? "" : "d-none" ?>">
                    <?php if(isset($_POST["editarCat-".$cont])) { ?>
                        <input type="submit" name="cambiarFiltro" value="Confirmar"></td>
                    <?php } else { ?>  
                        <input type="submit" name="editarCat-<?php echo $cont; ?>" value="Editar"></td>
                    <?php } ?> </td>
                    <td class="<?php echo $this->tienePermiso("DELFILTRO") ? "" : "d-none" ?>"> <input class="" type="submit" name="mostrarFiltro" value="<?php echo $clave["Mostrar"] == 0 ? "Activar" : "Desactivar"; ?>"></td>
                </tr>
                <input type="hidden" name="ID" value="<?php echo $clave["ID"]; ?>">
                <input type="hidden" name="tabla" value="categoria">
            </form>
            <?php } ?>
        </tbody>
    </table>
    <form action="<?php $_PHP_SELF;?>" method="POST" class="<?php echo $this->tienePermiso("ADDFILTRO") ? "" : "d-none" ?>">
        <label for="categoria">Nombre de la Categoria:</label>
        <input type="text" name="filtro">
        <input type="hidden" name="tabla" value="categoria">
        <input type="submit" name="ingresarFiltro" value="Ingresar">
    </form>
</section>

<section class="container m-5">
    <h1>Marcas</h1>
    <hr>
    <table>
        <thead>
            <th>Nombre</th>
            <th class="<?php echo $this->tienePermiso("EDITFILTRO") ? "" : "d-none" ?>">Editar</th>
            <th class="<?php echo $this->tienePermiso("DELFILTRO") ? "" : "d-none" ?>">Activar/Desactivar</th>
        </thead>
        <tbody>
            <?php $cont = 0; foreach($this->marcas as $clave) { $cont++?>
            <form action="<?php $_PHP_SELF;?>" method="POST">
            <tr>
                <td><?php if(isset($_POST["editarM-".$cont])) { ?>
                    <input type="text" name="nombre" placeholder="<?php echo $clave["Nombre"]; ?>">
                <?php } else { echo $clave["Nombre"]; }?></td>
                <td class="<?php echo $this->tienePermiso("EDITFILTRO") ? "" : "d-none" ?>"><?php if(isset($_POST["editarM-".$cont])) { ?>
                    <input type="submit" name="cambiarFiltro" value="Confirmar"></td>
                <?php } else { ?>  
                    <input type="submit" name="editarM-<?php echo $cont; ?>" value="Editar"></td>
                <?php } ?> </td>
                <td class="<?php echo $this->tienePermiso("DELFILTRO") ? "" : "d-none" ?>"> <input class="" type="submit" name="mostrarFiltro" value="<?php echo $clave["Mostrar"] == 0 ? "Activar" : "Desactivar"; ?>"></td>
            </tr>
            <input type="hidden" name="ID" value="<?php echo $clave["ID"]; ?>">
            <input type="hidden" name="tabla" value="marca">
            </form>
            <?php } ?>
        </tbody>
    </table>
    <form action="<?php $_PHP_SELF;?>" method="POST" class="<?php echo $this->tienePermiso("ADDFILTRO") ? "" : "d-none" ?>">
        <label for="marca">Nombre de la Marca:</label>
        <input type="text" name="filtro">
        <input type="hidden" name="tabla" value="marca">
        <input type="submit" name="ingresarFiltro" value="Ingresar">
    </form>
</section>

<section class="container m-5">
    <h1>Condiciones</h1>
    <hr>
    <table>
        <thead>
            <th>Nombre</th>
            <th class="<?php echo $this->tienePermiso("EDITFILTRO") ? "" : "d-none" ?>">Editar</th>
            <th class="<?php echo $this->tienePermiso("DELFILTRO") ? "" : "d-none" ?>">Activar/Desactivar</th>
        </thead>
        <tbody>
            <?php $cont = 0; foreach($this->condiciones as $clave) { $cont++;?>
            <form action="<?php $_PHP_SELF;?>" method="POST">
                <tr>
                    <td><?php if(isset($_POST["editarCon-".$cont])) { ?>
                        <input type="text" name="nombre" placeholder="<?php echo $clave["Nombre"]; ?>">
                    <?php } else { echo $clave["Nombre"]; }?></td>
                    <td class="<?php echo $this->tienePermiso("EDITFILTRO") ? "" : "d-none" ?>">
                    <?php if(isset($_POST["editarCon-".$cont])) { ?>
                        <input type="submit" name="cambiarFiltro" value="Confirmar"></td>
                    <?php } else { ?>  
                        <input type="submit" name="editarCon-<?php echo $cont; ?>" value="Editar"></td>
                    <?php } ?> </td>
                    <td class="<?php echo $this->tienePermiso("DELFILTRO") ? "" : "d-none" ?>"> <input type="submit" name="mostrarFiltro" value="<?php echo $clave["Mostrar"] == 0 ? "Activar" : "Desactivar"; ?>"></td>
                </tr>
            <input type="hidden" name="ID" value="<?php echo $clave["ID"]; ?>">
            <input type="hidden" name="tabla" value="condicion">
            </form>
            <?php } ?>
        </tbody>
    </table>
    <form action="<?php $_PHP_SELF;?>" method="POST" class="<?php echo $this->tienePermiso("ADDFILTRO") ? "" : "d-none" ?>">
        <label for="condicion">Nombre de la Condicion:</label>
        <input type="text" name="filtro">
        <input type="hidden" name="tabla" value="condicion">
        <input type="submit" name="ingresarFiltro" value="Ingresar">
    </form>
</section>

<?php require "view/footer.php"; ?>