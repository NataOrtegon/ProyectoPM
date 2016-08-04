<div class="container">
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="col-md-6 ">
        <form class="cmxform" id="commentForm"  action="<?php echo $helper->url("superusuario", "create"); ?>" method="post" enctype="multipart/form-data" >

            <label for="text">Nombre:</label>
            <input type="text" class="form-control" name="nombre" placeholder="Nombre del Usuario">
            <br>
            <label for="text">Email:</label>
            <input type="email" class="form-control" name="email"  placeholder="Email">
            <br>
            <label for="text">Contraseña:</label>
            <input type="password" class="form-control" name="contrasena" id="contrasena"  placeholder="Contraseña">
            <br>
            <label for="text">Repita la Contraseña:</label>
            <input type="password" class="form-control" name="contrasenar" id="contrasenar"  placeholder="Repita la Contraseña">
            <br>

            <label for="foto">Seleccione una Foto:</label><br>
            <input name="foto" type="file" class="file" multiple=true data-preview-file-type="any">

            <input type="hidden" class="form-control" name="id_usuario">


            <br>
            <button type="submit" id="buscarid"  class="btn btn-default">Agregar</button>
        </form>
    </div>



    <div id="lista" class="container">
        <div id="Lista" class=" col-md-4">
            <center><h2>Agregar Super Usuario</h2><IMG id="logo"  SRC="imagenes/logo2.png"></center>
            </ul>
        </div>

    </div>
</div>