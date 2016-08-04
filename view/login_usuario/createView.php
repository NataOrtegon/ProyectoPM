
<div class="container">
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="col-md-6 ">
        <form class="cmxform" id="commentForm"  action="<?php echo $helper->url("Login_Usuario", "create"); ?>" method="post" class="">

            <label >Tipo de Usuario:</label>
            <select type="text" class="form-control"  name="tipo_usuario">
                <option value="">Seleccione un usuario</option>
                <option id="1" value="SuperUsuario">SuperUsuario</option>
                <option id="2" value="UsuarioEmpresa">UsuarioEmpresa</option>
                <option id="3" value="UsuarioPromocion">UsuarioPromoción</option>
            </select>
            <br>

            <label for="email">Email:</label>
            <input type="email" class="form-control" name="email" placeholder="Digite su Email">
            <br>
            <label for="password">Contraseña:</label>
            <input type="password" class="form-control" name="contrasena" id="contrasena" placeholder="Digite su Contraseña">
            <br>
            <label for="password">Repita Contraseña:</label>
            <input type="password" class="form-control" id="contrasenar" placeholder="Digite su Contraseña">
            <br>

            &nbsp;<input type="submit"  id="buscarid" value="crear" class="btn btn-success"/>
        </form>
    </div>



    <div id="lista" class="container">
        <div id="Lista" class=" col-md-4">
            <center><h2>Agregar Usuario</h2><IMG id="logo"  SRC="imagenes/logo2.png"></center>
            </ul>
        </div>

    </div>
</div>