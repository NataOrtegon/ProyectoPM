<div class="container">


    <div class="container">
        <br>
        <br>
        <br>
        <br>

        <div class="col-md-6 ">
            <table class="table">

                <tbody>
                    <?php
                    if ($getById) {
                        ?>
                    <br>

                    <tr><th>Publicacion</th>
                        <td class="info"><?php echo $getById->id_publicaciones . "<br>"; ?></td></tr>
                    <tr><th>Estado</th>
                        <td class="info"><?php echo $getById->estado . "<br>"; ?></td></tr>
                    <tr><th> Fecha de Creacion</th>
                        <td class="info"> <?php echo $getById->fecha_creacion . "<br>"; ?></td></tr>
                    <tr><th>Fecha de Inicio</th>
                        <td class="info"><?php echo $getById->fecha_inicio . "<br>"; ?></td></tr>
                    <tr><th>Fecha Final</th>
                        <td class="info">  <?php echo $getById->fecha_final . "<br>"; ?></td></tr>
                    <tr><th>Nombre</th>
                        <td class="info"> <?php echo $getById->nombre . "<br>"; ?></td></tr>
                    <tr><th>Descripción</th>
                        <td class="info"> <?php echo $getById->descripcion . "<br>"; ?></td></tr>
                    <tr><th>Fecha de Registro</th>
                        <td class="info"><?php echo $getById->fecha_registro . "<br>"; ?></td></tr>

                    <tr><th>Usuario Empresa</th>
                        <?php
                        if ($usuE) {
                            ?>       
                            <td class="info"> <?php echo $usuE->nombre . "<br>"; ?></td></tr>

                        <?php
                    }
                    ?>

                    <tr><th>Foto</th>
                        <td class="info">
                            <img src="<?php echo $getById->foto; ?>" ><br>
                        </td>
                    </tr>
                    <a href="<?php echo $helper->url("publicaciones", "Admin"); ?>" id="consultar"><img 
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
                <center><h1>Publicacion </h1><IMG id="logo" SRC="imagenes/logo2.png"></center>
            </div>
        </div>
    </div>
