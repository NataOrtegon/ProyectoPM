<script type="text/javascript">
    var urlDelete = "<?php echo $helper->url("publicaciones", "eliminar"); ?>&id_publicaciones=";
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

                        <th>Nombre de la Publicación</th>
                        <th>Opciones</th>

                    </tr>
                </thead>


                <tbody>

                    <?php
                    if (isset($allpublicaciones)) {
                        foreach ($allpublicaciones as $publicaciones) {
                            ?>

                            <tr class="info">

                                <td><?php echo $publicaciones->nombre; ?> </td>

                                <td> <a href="<?php echo $helper->url("publicaciones", "consultar"); ?>&id_publicaciones=<?php echo $publicaciones->id_publicaciones; ?>&id_usuEmpresa=<?php echo $publicaciones->id_usuEmpresa; ?>" id="consultar"><img src="imagenes/lupa.png" > </a> 
                                    <a href="<?php echo $helper->url("publicaciones", "Actualizar"); ?>&id_publicaciones=<?php echo $publicaciones->id_publicaciones; ?>"><img src="imagenes/lapiz.png" id="editar" ></a> 
                                    <a class="btnEliminarItem" id="id_publicaciones-<?php echo $publicaciones->id_publicaciones; ?>" type="button" href="#"  data-toggle="modal" data-target="#myModal"><img src="imagenes/basura.png" id="eliminar" > </a>

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
                                <h4 class="modal-title">¿REALMENTE DESEA ELIMINAR ESTA PUBLICACIÓN?</h4>
                            </div>
                            <div class="modal-body">
                                <p>Si elimina esta publicacion borrará  todos los registros.</p>
                            </div>
                            <div class="modal-footer">
                                <a id="btnEliminar" href="#">
                                    <button type="button" class="btn btn-access" >Eliminar</button></a>
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
                <center><h2>Lista Publicaciones</h2><IMG id="logo" SRC="imagenes/logo2.png"></center>
            </div>
        </div>
    </div>
</div>




