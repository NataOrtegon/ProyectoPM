

<div class="container">
    <form class="cmxform" id="commentForm" action="<?php echo $helper->url("Publicaciones", "modificarPublicaciones"); ?>" method="post" class="col-lg-5" enctype="multipart/form-data">
        <div class="container">
            <br>
            <br>
            <br>
            <br>
            <br>
            <div class="col-md-6 ">

                <?php
                if ($publica) {
                    ?>
                    <a href="<?php echo $helper->url("publicaciones", "Admin"); ?>" id="consultar"><img 
                            src="imagenes/regreso.png" > </a> <br>

                    <input type="hidden" class="form-control" name="id_publicacion" value="<?php echo $publica->id_publicaciones ?>" id="id_publicacion">


                    <label for="id">Nombre:</label>
                    <input type="text" class="form-control" name="nombre" value="<?php echo $publica->nombre ?>" id="email" placeholder="Digite el nombre">
                    <br>
                    <label for="id">Descripcion:</label>
                    <input type="text" class="form-control" name="descripcion" value="<?php echo $publica->descripcion ?>" id="email" placeholder="Descripcion">
                    <br>

                    <label for="id">Fecha Inicio:</label>
                    <input type="text" class="form-control" name="fecha_inicio" id="fecha_inicio"  value="<?php echo $publica->fecha_inicio ?>" id="email" placeholder="fecha inicio">
                    <br>
                    <label for="id">Fecha Final:</label>
                    <input type="text" class="form-control" name="fecha_final" id="fecha_final" value="<?php echo $publica->fecha_final ?>" id="email" placeholder="fecha Final">
                    <br>
                    <label for="foto">Seleccione una Foto:</label><br>
                    <div class="form-group">
                        <input name="foto" type="file" class="file" multiple=true data-preview-file-type="any">
                    </div>
                    <br>    
                    <input type="submit" id="buscarid" value="modificar" class="btn btn-success"/>
                    </form>
                </div>
                <?php
            }
            ?>

            <div class="container">
                <div id="Lista" class="col-md-4">
                    <center><h1>Editar Publicacion</h1><IMG id="logo" SRC="imagenes/logo2.png"></center>
                </div>
            </div>



