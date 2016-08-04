<div class="container">
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="col-md-6 ">
        <form class="cmxform" id="commentForm"  action="<?php echo $helper->url("Login_Usuario", "Login"); ?>" method="post" class="">

            <br>
            <br>
            <label>Todos los campos con(*) son obligarorios</label>
            <br>
            <br>
            <label >Tipo de Usuario(*):</label>
            <select type="text" class="form-control"  name="tipo_usuario">
                <option value="">Seleccione un usuario</option>
                <option id="1" value="SuperUsuario">SuperUsuario</option>
                <option id="2" value="UsuarioEmpresa">UsuarioEmpresa</option>
                <option id="3" value="UsuarioPromocion">UsuarioPromoción</option>
            </select>
            <br>

            <label for="email">Email(*):</label>
            <input type="email" class="form-control" name="email" placeholder="Digite su Email">
            <br>
            <label for="password">Contraseña(*):</label>
            <input type="password" class="form-control" name="contrasena" id="contrasena" placeholder="Digite su Contraseña">
            <br>
            <br>
            <br>

            &nbsp;<input type="submit"  id="buscarid" value="Iniciar Sesion" class="btn btn-success"/>

            <div>
                <?php echo (isset($errores) && $errores != "") ? $errores : ""; ?>
            </div>

        </form>
    </div>



    <div id="lista" class="container">
        <div id="Lista" class=" col-md-4">
            <center><h2>Iniciar Sesion</h2><IMG id="logo"  SRC="imagenes/logo2.png"></center>
        </div>

    </div>
</div>