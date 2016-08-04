<div class="container">
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="col-md-6 ">
        <form class="cmxform" id="commentForm"  action="<?php echo $helper->url("Sucursal", "create"); ?>" method="post">


            <label for="text">Dirección:</label>
            <input type="text" class="form-control" name="direccion"  placeholder="Direccion de la Sucursal">
            <br>
            <label for="text">Telefono:</label>
            <input type="number" class="form-control" name="telefono" placeholder="Telefono">
            <br>
            <?php
            $UsuarioEmpresa = isset($allUsuarioEmpresa) ? $allUsuarioEmpresa : "";
            ?>

            <label for="number">Usuario Empresa:</label> 
            <select name="id_usuEmpresa" id="id_usuEmpresa" class="form-control">
                <option value="">Seleccione un usuario</option>
                <?php
                if ($UsuarioEmpresa != "") {
                    foreach ($UsuarioEmpresa as $item) {
                        echo "<option value='$item->id_usuEmpresa'>$item->nombre</option>";
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
            <center><h2>Agregar Sucursal</h2><IMG id="logo"  SRC="imagenes/logo2.png"></center>
            </ul>
        </div>

    </div>
</div>




