
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
                    if ($getById) {
                        ?>
                        <tr><th>Categoria</th>
                            <td class="info"> <?php echo $getById->id_categoria . "<br>"; ?></td></tr>
                        <tr><th>Nombre</th>
                            <td class="info"> <?php echo $getById->nombre . "<br>"; ?></td></tr>
                        <tr><th>Descripcion</th>
                            <td class="info"> <?php echo $getById->descripcion . "<br>"; ?></td></tr>
                    <a href="<?php echo $helper->url("categoria", "Admin"); ?>" id="consultar"><img 
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
                <center><h1>Categoria </h1><IMG id="logo" SRC="imagenes/logo2.png"></center>
            </div>
        </div>
    </div>


