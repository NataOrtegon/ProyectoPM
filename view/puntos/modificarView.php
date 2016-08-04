<div class="container">
    <form class="cmxform" id="commentForm" action="<?php echo $helper->url("Puntos", "modificarPuntos"); ?>" method="post" class="col-lg-5">
        <div class="container">
            <br>
            <br>
            <br>
            <br>
            <br>
            <div class="col-md-6 ">       
                <?php
                if ($punto) {
                    ?>
                    <a href="<?php echo $helper->url("puntos", "Admin"); ?>" id="consultar"><img 
                            src="imagenes/regreso.png" > </a> <br>

                    <label>Tipo de Puntuación:</label>
                    <select type="text" class="form-control"  name="tipo_puntuacion">
                        <option value="">Seleccione un tipo</option>
                        <option id="1" value="CrearCuenta">CrearCuenta</option>
                        <option id="2" value="Compartir">Compartir</option>
                        <option id="3" value="Votar">Votar</option>
                    </select>
                    <br>

                   
                    <label for="text">Cantidad:</label>
                    <input type="number" name="cantidad" class="form-control" value="<?php echo $punto->cantidad ?>"/>

                    <input type="hidden" name="id_puntos" class="form-control" value="<?php echo $punto->id_puntos ?>"/>
                    <br>
                    <input type="submit" id="buscarid" value="modificar" class="btn btn-success"/>
                    </form>
                </div>
                <?php
            }
            ?>




            <div class="container">
                <div id="Lista" class="col-md-4">
                    <center><h1>Editar Puntos</h1><IMG id="logo" SRC="imagenes/logo2.png"></center>
                </div>
            </div>
        </div>
</div>


