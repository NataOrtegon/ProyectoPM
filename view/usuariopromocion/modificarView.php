<div class="container">
    <form class="cmxform" id="commentForm" action="<?php echo $helper->url("usuariopromocion", "modificarUsuarioPromocion"); ?>" method="post" class="col-lg-5" enctype="multipart/form-data">
        <div class="container">
            <br>
            <br>


            <br>
            <br>
            <br>
            <br>
            <div class="col-md-6 "> 
                <?php
                //print_r($allUser_Promo);
                if ($promocion) {
                    ?>
                    <a href="<?php echo $helper->url("usuariopromocion", "Admin"); ?>" id="consultar"><img 
                            src="imagenes/regreso.png" > </a> <br>
                    <label for="text">Nombre:</label>
                    <input type="text" name="nombre" class="form-control" value="<?php echo $promocion->nombre ?>"/>
                    <br>
                    <label for="text">Fecha de Nacimiento:</label>
                    <input  type="text" id="datepicker" name="fecha_nacimiento" id="fecha_nacimiento" id="datepicker" class="form-control" value="<?php echo $promocion->fecha_nacimiento ?>"/>
                    <br>
                    <label for="text">Genero:</label><br>
                    <input type="radio" name="genero" value="1" >Femenino
                    <input type="radio" name="genero" value="2"> Masculino
        <!--            <input type="radio" value=3"> Indefinido-->
                    <br><br>

                    <label for="text">Ciudad:</label>
                    <input type="text" name="ciudad" class="form-control" value="<?php echo $promocion->ciudad ?>"/>
                    <br>
                    <label for="text">Email:</label>
                    <input type="text" name="email" class="form-control" value="<?php echo $promocion->email ?>"/>
                    <br>
                    <input type="hidden" name="id_usuario" class="form-control" value="<?php echo $promocion->id_usuario ?>"/>

                    <label for="text">Contraseña:</label>
                    <input type="password" name="contrasena" id="contrasena" class="form-control" value="<?php echo $promocion->contrasena ?>"/>
                    <br>
                    <label for="text">Repita la Contraseña:</label> 
                    <input type="password" id="contrasenar" name="contrasenar" class="form-control"  value="<?php echo $promocion->contrasena ?>"/>
                    <br>
                    <label for="foto">Seleccione una Foto:</label>   <br>   
                     <div class="form-group">
                         <input name="foto" type="file" class="file" multiple=true data-preview-file-type="any">
                    </div>
                    <input type="hidden" name="id_usupromocion" class="form-control" value="<?php echo $promocion->id_usuPromocion ?>"/>
                    <br>


                    <input type="submit" id="buscarid" value="modificar" class="btn btn-success"/>

                    </form>
                </div>
                <?php
            }
            ?>


            <div class="container">
                <div id="Lista" class="col-md-4">
                    <center><h2>Editar Usuario Promoción</h2><IMG id="logo" SRC="imagenes/logo2.png"></center>
                </div>
            </div>
