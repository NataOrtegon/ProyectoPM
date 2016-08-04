




<div class="container">


    <div class="container">
        <br>
        <br>
        <br>
        <br>
        <br>

        <div class="col-md-6 ">
            <table class="table">

                <tbody>
                    <?php
                    if ($login) {
                        ?>



                        <tr><th>Usuario</th>
                            <td class="info"> <?php echo $login->id_usuario . "<br>"; ?></td></tr>
                        <tr><th>Tipo de Usuario</th>
                            <td class="info"> <?php echo $login->tipo_usuario . "<br>"; ?></td></tr>
                        <tr><th>Fecha de Registro</th>
                            <td class="info"> <?php echo $login->fecha_registro . "<br>"; ?></td></tr>
                        <tr><th>Estado</th>
                            <td class="info"><?php echo $login->estado . "<br>"; ?></td></tr>
                        <tr><th>Email</th>
                            <td class="info"> <?php echo $login->email . "<br>"; ?></td></tr>
                        <tr><th>Contraseña</th>
                            <td class="info"> <?php echo $login->contrasena . "<br>"; ?></td></tr>
                    <a href="<?php echo $helper->url("login_usuario", "Admin"); ?>" id="consultar"><img 
                            src="imagenes/regreso.png" > </a> 
                    <br>

                    <?php
                }
                ?>


                </tbody>

            </table>
        </div>

        <div class="container">
            <div id="Lista" class="col-md-4">
                <center><h1>Usuario </h1><IMG id="logo" SRC="imagenes/logo2.png"></center>
            </div>
        </div>
    </div>