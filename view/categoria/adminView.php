
<script type="text/javascript">
    var urlDelete = "<?php echo $helper->url("categoria", "eliminar"); ?>&id_categoria=";
</script>

<div class="container">
    <br>
    <br>
    <br>
    <br>
    <div class="container">
        <div class="col-md-6 "> 
            <table class="table">

                <br>

                <thead>
                    <tr>

                        <th>Nombre de la Categoria</th>
                        <th>Opciones</th>
                    </tr>
                </thead>


                <tbody>

                    <?php
                    if (isset($allcategoria)) {
                        foreach ($allcategoria as $categoria) {
                            ?>

                            <tr class="info">

                                <td><?php echo $categoria->nombre; ?></td>
                                <td> <a href="<?php echo $helper->url("categoria", "consultar"); ?>&id_categoria=<?php echo $categoria->id_categoria; ?>" id="consultar"><img 
                                            src="imagenes/lupa.png" > </a> 
                                    <a href="<?php echo $helper->url("categoria", "Actualizar"); ?>&id_categoria=<?php echo $categoria->id_categoria; ?>"><img src="imagenes/lapiz.png" id="editar" ></a> 

                                    <a class="btnEliminarItem" id="idcat-<?php echo $categoria->id_categoria; ?>" href="#" type="button" data-toggle="modal" data-target="#myModal">
                                        <img src="imagenes/basura.png"> 
                                    </a>
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
                                <h4 class="modal-title">¿REALMENTE DESEA ELIMINAR ESTA CATEGORIA ?</h4>
                            </div>
                            <div class="modal-body">
                                <p>Si elimina esta categoria se borrara de todos los formularios.</p>
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

                <center><h2>Lista Categorias</h2><IMG id="logo" SRC="imagenes/logo2.png"></center>
            </div>
        </div>
    </div>
</div>

