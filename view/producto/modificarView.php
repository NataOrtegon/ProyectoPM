<div class="container">
    <form class="cmxform" id="commentForm" action="<?php echo $helper->url("producto", "modificarProducto"); ?>" method="post" class="col-lg-5" enctype="multipart/form-data">
        <div class="container">
            <br>
            <br>
            <br>
            <br>
            <br>
            <div class="col-md-6 ">


                <script type="text/javascript">
                    $(document).ready(function () {
                        $('#categoria > option[value="<?php echo $pro->id_categoria; ?>"]').attr('selected', 'selected');
                    });
                </script>

                <?php
                if ($pro) {
                    ?>
                    <a href="<?php echo $helper->url("producto", "Admin"); ?>" id="consultar"><img 
                            src="imagenes/regreso.png" > </a> <br><br>


                    <label for="text">Nombre:</label> 
                    <input type="text" name="nombre" class="form-control" value="<?php echo $pro->nombre ?>"/>
                    <br>
                    <label for="text">Descripcion:</label>
                    <input type="text" name="descripcion" class="form-control" value="<?php echo $pro->descripcion ?>"/>
                    <br>
                    <label for="text">Precio:</label>
                    <input type="text" name="precio_actual" class="form-control" value="<?php echo $pro->precio_actual ?>"/>
                    <br>
                    <label for="foto">Seleccione una Foto:</label><br>
                    <div class="form-group">
                        <input name="foto" type="file" class="file" multiple=true data-preview-file-type="any" >
                    </div>
                    <br>
        <!--Usuario Empresa: <input type="text" name="id_usuEmpresa" class="form-control" value="<?php //echo $pro->id_usuEmpresa     ?>"/>-->

                    <label for="number">Categoria:</label> 
                    <select name="id_categoria" id="categoria"  class="form-control">
                        <option value="">Seleccione una Categoria</option>
                        <?php
                        if ($Allcat != "") {
                            //print_r($Allcat);
                            foreach ($Allcat as $item) {
                                echo "<option value='$item->id_categoria'>$item->nombre</option>";
                            }
                        }
                        ?>
                    </select>

                    <input type="hidden" name="id_producto" class="form-control" value="<?php echo $pro->id_producto ?>"/>

                    <br>
                    <input type="submit" id="buscarid" value="modificar" class="btn btn-success"/>
                    </form>
                </div>
                <?php
            }
            ?>




            <div class="container">
                <div id="Lista" class="col-md-4">
                    <center><h1>Editar Producto</h1><IMG id="logo" SRC="imagenes/logo2.png"></center>
                </div>
            </div>
        </div>
</div>


