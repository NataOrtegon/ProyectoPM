
<div class="container">


    <div class="container">
        <br>
        <br>
        <br>


        <div class="col-md-6 ">
            <table class="table">
                <br>
                <br><br>
                <tbody>

                    <?php
                    if ($getById) {
                        ?>

                        <tr><th>Usuario Empresa</th>
                            <td class="info"><?php echo $getById->id_usuEmpresa . "<br>"; ?></td></tr>
                        <tr><th>Nombre</th>
                            <td class="info"><?php echo $getById->nombre . "<br>"; ?></td></tr>
                        <tr><th>Ciudad </th>
                            <td class="info">  <?php echo $getById->ciudad . "<br>"; ?></td></tr>
                        <tr><th> Email </th>
                            <td class="info"> <?php echo $getById->email . "<br>"; ?></td></tr>
                        <tr><th>Direccion </th>
                            <td class="info"> <?php echo $getById->direccion . "<br>"; ?></td></tr>
                        <tr><th>Usuario </th>
                            <td class="info"> <?php echo $getById->id_usuario . "<br>"; ?></td></tr>
                        <tr><th>Contraseña</th>
                            <td class="info"><?php echo $getById->contrasena . "<br>"; ?></td></tr>

                        <tr><th>Foto</th>
                            <td class="info">
                                <img src="<?php echo $getById->foto; ?>" width="300px"><br>
                            </td>
                        </tr>
                    <a href="<?php echo $helper->url("usuarioempresa", "Admin"); ?>" id="consultar"><img 
                            src="imagenes/regreso.png" > </a> 
                        <?php
                    }
                    ?>
                </tbody>

            </table>
        </div>

        <div class="container">
            <div id="Lista" class="col-md-4">
                <center><h1>UsuarioEmpresa </h1><IMG id="logo" SRC="imagenes/logo2.png"></center>
            </div>
        </div>
    </div>
