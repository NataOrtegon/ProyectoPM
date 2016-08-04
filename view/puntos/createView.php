<div class="container">
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="col-md-6 ">
        <form class="cmxform" id="commentForm"  action="<?php echo $helper->url("puntos", "create"); ?>" method="post">

            <label>Tipo de Puntuación:</label>
            <select type="text" class="form-control"  name="tipo_puntuacion">
                <option value="">Seleccione un tipo</option>
                <option id="1" value="CrearCuenta">CrearCuenta</option>
                <option id="2" value="Compartir">Compartir</option>
                <option id="3" value="Votar">Votar</option>
            </select>
            <br>


            <label for="text"> Cantidad:</label>
            <input type="number" class="form-control" name="cantidad" placeholder="Cantidad de Puntos">
            <br>
            <?php
            $Usuario_Promo = isset($allUser_Promo) ? $allUser_Promo : "";
            ?>

            <label for="number">Usuario Promoción:</label> 
            <select name="id_usuPromocion" id="id_usuPromocion" class="form-control">
                <option value="">Seleccione un usuario</option>
                <?php
                if ($Usuario_Promo != "") {
                    foreach ($Usuario_Promo as $item) {
                        echo "<option value='$item->id_usuPromocion'>$item->nombre</option>";
                    }
                }
                ?>
            </select>
            <br>



            <br>


            <button type="submit" id="buscarid"  class="btn btn-default">Agregar</button>
        </form>
    </div>



    <div id="lista" class="container">
        <div id="Lista" class=" col-md-4">
            <center><h2>Agregar Puntos</h2><IMG id="logo"  SRC="imagenes/logo2.png"></center>
            </ul>
        </div>

    </div>
</div>