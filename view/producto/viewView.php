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
                    if ($pro) {
                        ?>
                    <br>
                    <br>

                    <tr><th>Producto</th>
                        <td class="info"> <?php echo $pro->id_producto . "<br>"; ?></td></tr>
                    <tr><th>Nombre</th>
                        <td class="info"><?php echo $pro->nombre . "<br>"; ?></td></tr>
                    <tr><th>Precio </th>
                        <td class="info"> <?php echo $pro->precio_actual . "<br>"; ?></td></tr>

                    <tr><th>Foto</th>
                        <td class="info">
                            <img src="<?php echo $pro->foto; ?>" width="300px"><br>
                        </td>
                    </tr>

                    <tr><th>Usuario Empresa</th>
                        <?php
                        if ($usuE) {
                            ?>       
                            <td class="info"> <?php echo $usuE->nombre . "<br>"; ?></td></tr>
                        <a href="<?php echo $helper->url("producto", "Admin"); ?>" id="consultar"><img 
                                src="imagenes/regreso.png" > </a> 



                        <br>


                        <?php
                    }
                    ?>


                    <?php
                    if ($cat) {
                        ?>       
                        <tr><th>Categoria</th>
                            <td class="info"> <?php echo $cat->nombre . "<br>"; ?></td></tr>


                        <?php
                    }
                }
                ?>
                </tbody>

            </table>
        </div>

        <div class="container">
            <div id="Lista" class="col-md-4">
                <center><h1>Producto </h1><IMG id="logo" SRC="imagenes/logo2.png"></center>
            </div>
        </div>
    </div>



