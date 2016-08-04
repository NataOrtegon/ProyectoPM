
  <div class="container">
        

        <form class="cmxform" id="commentForm"  action="<?php echo $helper->url("Sucursal","modificarSucursal"); ?>" method="post" class="col-lg-5">
            <div class="container">
 <br>
 <br>
 
 <br>
 <br>
 <br>
 <br>
 
 <div class="col-md-6 "> 
            <?php
            if($sucur)
            {
            ?>
      <a href="<?php echo $helper->url("sucursal","Admin"); ?>" id="consultar"><img 
            src="imagenes/regreso.png" > </a> <br>
            
            <label for="text">Dirección:</label> 
            <input type="text" name="direccion" class="form-control" value="<?php echo $sucur->direccion ?>"/>
            <br>
            <label for="text">Telefono:</label>
            <input type="text" name="telefono" class="form-control" value="<?php echo $sucur->telefono ?>"/>
                       
            <input type="hidden" name="id_sucursal" class="form-control" value="<?php echo $sucur->id_sucursal ?>"/>
<br>
             <input type="submit" id="buscarid" value="modificar" class="btn btn-success"/>
</form>
</div>
            <?php 
        }
        ?>

              


  <div class="container">
        <div id="Lista" class="col-md-4">
            <center><h1>Editar Sucursal</h1><IMG id="logo" SRC="imagenes/logo2.png"></center>
            </div>
            </div>
