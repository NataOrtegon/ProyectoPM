<div class="container">
    <form class="cmxform" id="commentForm" action="<?php echo $helper->url("Usuarioempresa", "modificarUsuarioEmpresa"); ?>" method="post" class="col-lg-5" enctype="multipart/form-data">
        <div class="container">
            <br>
            <br>

            <br>
            <br>
            <br>
            <br>

            <div class="col-md-6 "> 

                <?php
                if ($empresa) {
                    ?>
                    <a href="<?php echo $helper->url("Usuarioempresa", "Admin"); ?>" id="consultar"><img 
                            src="imagenes/regreso.png" > </a> <br>
                    <label for="text">Nombre:</label>
                    <input type="text" name="nombre" class="form-control" value="<?php echo $empresa->nombre ?>"/>
                    <br>
                    <label for="text">Ciudad:</label>
                    <input type="text" name="ciudad" class="form-control" value="<?php echo $empresa->ciudad ?>"/>
                    <br>
                    <label for="text">Email:</label>
                    <input type="text" name="email" class="form-control" value="<?php echo $empresa->email ?>"/>
                    <br>
                    <label for="text">Dirección:</label>
                    <input type="text" name="direccion" class="form-control" value="<?php echo $empresa->direccion ?>"/>
                    <br>
                    <input type="hidden" name="id_usuario" class="form-control" value="<?php echo $empresa->id_usuario ?>"/>

                    <label for="text">Contraseña:</label>
                    <input type="password" name="contrasena" id="contrasena" class="form-control" value="<?php echo $empresa->contrasena ?>"/>
                    <br>
                    <label for="text">Repita la Contraseña:</label> 
                    <input type="password" id="contrasenar" name="contrasenar" class="form-control"  value="<?php echo $empresa->contrasena ?>"/>
                    <br>
                    <label for="foto">Seleccione una Foto:</label><br>     
                   <div class="form-group">
                         <input name="foto" type="file" class="file" multiple=true data-preview-file-type="any">
                    </div>
                    <input type="hidden" name="id_usuEmpresa" class="form-control" value="<?php echo $empresa->id_usuEmpresa ?>"/>

                    <br>
                    <input type="submit" id="buscarid" value="modificar" class="btn btn-success"/>

                    </form>
                </div>
                <?php
            }
            ?>

            <div class="container">
                <div id="Lista" class="col-md-4">
                    <center><h2>Editar Usuario Empresa</h2><IMG id="logo" SRC="imagenes/logo2.png"></center>
                </div>
            </div>
        </div>
</div>