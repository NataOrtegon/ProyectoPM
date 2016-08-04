<div class="container">
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="col-md-6 ">
        <form class="cmxform" id="commentForm" action="<?php echo $helper->url("Publicaciones", "create"); ?>" method="post" enctype="multipart/form-data">

            <label for="text">Nombre:</label>
            <input type="text" class="form-control" name="nombre" placeholder="Nombre de la Publicacion">
            <br>
            <label for="text">Descripcion:</label>
            <input type="text" class="form-control" name="descripcion" placeholder="Descripcion">
            <br>
           
            <label for="text">Fecha de Inicio:</label>
            <input type="text"  class="form-control" id="fecha_inicio" name="fecha_inicio" >
            <br>
            <label for="text">Fecha Final:</label>
            <input type="text" class="form-control" id="fecha_final" name="fecha_final">
            <br>
            <?php
            $UsuarioEmpresa = isset($allUsuarioEmpresa) ? $allUsuarioEmpresa : "";
            ?>

            <label for="number">Usuario Empresa:</label> 
            <select name="id_usuEmpresa" id="id_usuEmpresa" class="form-control">
                <option value="">Seleccione un usuario</option>
                <?php
                if ($UsuarioEmpresa != "") {
                    foreach ($UsuarioEmpresa as $item) {
                        echo "<option value='$item->id_usuEmpresa'>$item->nombre</option>";
                    }
                }
                ?>
            </select>
            <br>

            <label for="foto">Seleccione una Foto:</label><br>
            <input name="foto" type="file" class="file" multiple=true data-preview-file-type="any">
            <br>


            <button type="submit" id="buscarid"  onsubmit="validarfecha()" class="btn btn-default">Crear</button>
        </form>
    </div>



    <div id="lista" class="container">
        <div id="Lista" class=" col-md-4">
            <center><h2>Crear Publicación</h2><IMG id="logo"  SRC="imagenes/logo2.png"></center>
            </ul>
        </div>

    </div>
</div>





