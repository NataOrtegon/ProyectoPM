<div class="container">
    <form class="cmxform" id="commentForm"  action="<?php echo $helper->url("Superusuario", "modificar"); ?>" method="post" class="col-lg-5" enctype="multipart/form-data">
        <div class="container">
            <br>
            <br>

            <br>
            <br>
            <br>

            <br>
            <div class="col-md-6 "> 

                <?php
                if ($super) {
//print_r($super);
                    ?>
                    <a href="<?php echo $helper->url("superusuario", "Admin"); ?>" id="consultar" enctype="multipart/form-data"><img 
                            src="imagenes/regreso.png" > </a> <br>
                    <label for="text">Nombre:</label> 
                    <input type="text" name="nombre" class="form-control"  value="<?php echo $super->nombre ?>"/>
                    <br>
                    <label for="text">Email:</label> 
                    <input type="text" name="email" class="form-control"  value="<?php echo $super->email ?>"/>
                    <br>
                    <input type="hidden" name="id_usuario" class="form-control"  value="<?php echo $super->id_usuario ?>"/>

                    <label for="text">Contraseña:</label> 
                    <input type="password" name="contrasena" id="contrasena" class="form-control"  value="<?php echo $super->contrasena ?>"/>
                    <br>
                    <label for="text">Repita la Contraseña:</label> 
                    <input type="password" id="contrasenar" name="contrasenar"class="form-control"  value="<?php echo $super->contrasena ?>"/>
                    <br>
                    <label for="foto">Seleccione una Foto:</label><br>
                    <div class="form-group">
                        <input name="foto" type="file" class="file" multiple=true data-preview-file-type="any" value="<?php echo $super->foto ?>"/>
                    </div>
                    <input type="hidden" name="id_super" class="form-control" value="<?php echo $super->id_super ?>" />

                    <br>
                    <input type="submit" id="buscarid" value="Modificar" class="btn btn-success"/>

                    </form>
                </div>
                <?php
            }
            ?>


            <div class="container">
                <div id="Lista" class="col-md-4">
                    <center><h2>Editar SuperUsuario</h2><IMG id="logo" SRC="imagenes/logo2.png"></center>
                </div>
            </div>
        </div>
</div>
