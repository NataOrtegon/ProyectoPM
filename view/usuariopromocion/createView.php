<div class="container">
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="col-md-6 ">
        <form class="cmxform" id="commentForm" action="<?php echo $helper->url("Usuariopromocion", "create"); ?>" method="post" enctype="multipart/form-data">

            <label for="text">Nombre:</label>
            <input type="text" class="form-control" name="nombre" placeholder="Nombre del Usuario">
            <br>

            <label for="text">Fecha de Nacimiento:</label>
            <input type="text" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento">
            <br>

            <label for="text">Genero:</label><br>
            <input type="radio" name="genero" value="1" >Femenino
            <input type="radio" name="genero" value="2"> Masculino
<!--            <input type="radio" value=3"> Indefinido-->
            <br>
            <br>
            <label for="number">Ciudad:</label>
            <input type="text" class="form-control" name="ciudad" placeholder="Ciudad">
            <br>

            <label for="email">Email:</label>
            <input type="email" class="form-control" name="email"  placeholder="Email">
            
            <input type="hidden" class="form-control" name="id_usuario">
            <br>

            <label for="number">Contraseña:</label>
            <input type="password" class="form-control" name="contrasena" id="contrasena" placeholder="Contraseña">
            <br>

            <label for="text">Repita la Contraseña:</label>
            <input type="password" class="form-control" name="contrasenar" id="contrasenar"  placeholder="Repita la Contraseña">
            <br>


            <label for="foto">Seleccione una Foto:</label><br>
            <input name="foto" type="file" class="file" multiple=true data-preview-file-type="any">
            <br>

            <button type="submit" id="buscarid" onsubmit="restarFechas()" class="btn btn-default">Crear</button>
        </form>
    </div>



    <div id="lista" class="container">
        <div id="Lista" class=" col-md-4">
            <center><h2>Agregar Usuario Promoción</h2><IMG id="logo"  SRC="imagenes/logo2.png"></center>
            </ul>
        </div>

    </div>
</div>