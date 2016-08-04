
<div class="container">
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="col-md-6 ">
        <form class="cmxform" id="commentForm" action="<?php echo $helper->url("producto", "create"); ?>" method="post" enctype="multipart/form-data">

            <label for="text">Nombre:</label>
            <input type="text" class="form-control" name="nombre" placeholder="Nombre del producto">
            <br>
            <label for="text">Descripcion:</label>
            <input type="text" class="form-control" name="descripcion" placeholder="Descripción">
            <br>
            <label for="text">Precio:</label>
            <input type="number" class="form-control" name="precio_actual" placeholder="Precio">
            <br>
            <label for="foto">Seleccione una Foto:</label><br>
            <div class="form-group">
                <input name="foto" id="foto" type="file" class="file" multiple=true data-preview-file-type="any">
            </div>
            

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

            <?php
            $categoria = isset($allcategoria) ? $allcategoria : "";
            ?>
            <label for="number">Categoria:</label> 
            <select name="id_categoria" id="id_categoria" class="form-control">
                <option value="">Seleccione una Categoria</option>
                <?php
                if ($categoria != "") {
                    foreach ($categoria as $item) {
                        echo "<option value='$item->id_categoria'>$item->nombre</option>";
                    }
                }
                ?>
            </select>
            <br>


            &nbsp;<input type="submit"  id="buscarid" value="crear" class="btn btn-success"/>
        </form>
    </div>



    <div id="lista" class="container">
        <div id="Lista" class=" col-md-4">
            <center><h2>Agregar Producto</h2><IMG id="logo"  SRC="imagenes/logo2.png"></center>
            </ul>
        </div>

    </div>
</div>



<script type="text/javascript">
    $(document).ready(function () {

        $('#foto').on('fileselect', function (event, numFiles, label) {
            alert("aca");
            console.log("fileselect");

        });
    });
    $</script>