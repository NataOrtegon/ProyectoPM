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
                        <tr><th>Puntos</th>
                            <td class="info"><?php echo $getById->id_puntos . "<br>"; ?></td></tr>
                        <tr><th>Tipo de Puntuacion</th>
                            <td class="info"><?php echo $getById->tipo_puntuacion . "<br>"; ?></td></tr>
                        <tr><th> Fecha </th>
                            <td class="info"> <?php echo $getById->fecha . "<br>"; ?></td></tr>
                        <tr><th>Cantidad </th>
                            <td class="info"><?php echo $getById->cantidad . "<br>"; ?></td></tr>

                        <tr><th>Usuario Promocion</th>
                            <?php
                            if ($usupromo) {
                                ?>       
                                <td class="info"> <?php echo $usupromo->nombre . "<br>"; ?></td></tr>
                        <a href="<?php echo $helper->url("puntos", "Admin"); ?>" id="consultar"><img 
                                src="imagenes/regreso.png" > </a> 



                        <br>

                        <?php
                    }
                    ?>


                    <?php
                }
                ?>
                </tbody>

            </table>
        </div>

        <div class="container">
            <div id="Lista" class="col-md-4">
                <center><h1>Puntos </h1><IMG id="logo" SRC="imagenes/logo2.png"></center>
            </div>
        </div>
    </div>







