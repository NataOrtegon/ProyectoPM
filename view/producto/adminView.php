<script type="text/javascript">
    var urlDelete = "<?php echo $helper->url("producto", "eliminar"); ?>&id_producto=";
</script>

<div class="container">
    <br>
    <br>
    <br>
    <br>
    <div class="container">
        <br>
        <br>
        <div class="col-md-6 "> 
            <table class="table">
                <thead>
                    <tr>

                        <th>Nombre del Producto</th>
                        <th>Opciones</th>
                    </tr>
                </thead>


                <tbody>

                    <?php
                    if (isset($allproducto)) {
                        foreach ($allproducto as $producto) {
                            ?>

                            <tr class="info">

                                <td><?php echo $producto->nombre; ?> </td>
                                <td> <a href="<?php echo $helper->url("producto", "consultar"); ?>&id_producto=<?php echo $producto->id_producto; ?>&id_categoria=<?php echo $producto->id_categoria; ?>&id_usuEmpresa=<?php echo $producto->id_usuEmpresa; ?>" id="consultar"><img src="imagenes/lupa.png" > </a> 
                                    <a href="<?php echo $helper->url("producto", "Actualizar"); ?>&id_producto=<?php echo $producto->id_producto; ?>" ><img src="imagenes/lapiz.png" id="editar" ></a> 
                                    <a class="btnEliminarItem" id="id_producto-<?php echo $producto->id_producto; ?>" href="·" type="button"   data-toggle="modal" data-target="#myModal"><img src="imagenes/basura.png" id="eliminar" > </a>

                                </td>
                            </tr>


                        <?php } ?>
                        <?php
                    } else {

                        echo "No hay registros";
                    }
                    ?>    
                <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">¿REALMENTE DESEA ELIMINAR ESTE PRODUCTO?</h4>
                            </div>
                            <div class="modal-body">
                                <p>Si elimina este producto borrara de todos los formularios.</p>
                            </div>
                            <div class="modal-footer">
                                <a id="btnEliminar" href="#">
                                    <button type="button" class="btn btn-access" >Eliminar</button>
                                </a>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>

                            </div>
                        </div>
                    </div>
                </div>


                </tbody>
            </table>
        </div>

        <div class="container">


            <div id="Lista" class="col-md-4">
                <center><h2>Lista Productos</h2><IMG id="logo" SRC="imagenes/logo2.png"></center>
            </div>
        </div>
    </div>
</div>




































