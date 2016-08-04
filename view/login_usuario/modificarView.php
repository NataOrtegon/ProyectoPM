


<div class="container">


    <form  class="cmxform" id="commentForm" action="<?php echo $helper->url("login_Usuario", "modificarLogin_Usuario"); ?>" method="post" >
        <div class="container">
            <br>
            <br>
            <br>
            <br>
            <br>
            <div class="col-md-6 ">   
                <?php
                if ($login) {
                    ?>
                    <a href="<?php echo $helper->url("login_usuario", "Admin"); ?>" id="consultar"><img 
                            src="imagenes/regreso.png" > </a> <br><br>

                    <label for="email">Email:</label>
                    <input type="email"  class="form-control" name="email" value="<?php echo $login->email ?>"  placeholder="Email">
                    <br>
                    <label for="contraseña">contraseña:</label>
                    <input type="password"  class="form-control" name="contrasena" value="<?php echo $login->contrasena ?>" placeholder="Contraseña">
                    <input type="hidden" name="id_usuario" class="form-control" value="<?php echo $login->id_usuario ?>"/>
                    <br>
                    <input type="submit" id="buscarid" value="modificar" class="btn btn-success"/>
                    </form>
                </div>
    <?php
}
?>




            <div class="container">
                <div id="Lista" class="col-md-4">
                    <center><h1>Editar Usuario</h1><IMG id="logo" SRC="imagenes/logo2.png"></center>
                </div>
            </div>





