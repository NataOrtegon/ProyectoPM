
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
                        <tr><th>Sucursal</th>
                            <td class="info"><?php echo $getById->id_sucursal . "<br>"; ?></td></tr>
                        <tr><th>Dirección</th>
                            <td class="info"><?php echo $getById->direccion . "<br>"; ?></td></tr>
                        <tr><th>Telefono </th>
                            <td class="info"> <?php echo $getById->telefono . "<br>"; ?></td></tr>

                        <tr><th>Usuario Empresa</th>
                            <?php
                            if ($usuE) {
                                ?>       
                                <td class="info"> <?php echo $usuE->nombre . "<br>"; ?></td></tr>
                        <a href="<?php echo $helper->url("sucursal", "Admin"); ?>" id="consultar"><img 
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
                <center><h1>Sucursal </h1><IMG id="logo" SRC="imagenes/logo2.png"></center>
            </div>
        </div>
    </div>



