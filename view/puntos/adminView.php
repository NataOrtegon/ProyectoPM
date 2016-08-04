<script type="text/javascript">
    var urlDelete = "<?php echo $helper->url("puntos", "eliminar"); ?>&id_puntos=";
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

                        <th>Tipo Puntuación</th>
                        <th>cantidad de Puntos</th>
                        <th>Opciones</th>

                    </tr>
                </thead>


                <tbody>

                    <?php
                    if (isset($allpuntos)) {
                        foreach ($allpuntos as $puntos) {
                            ?>

                            <tr class="info">

                                <td><?php echo $puntos->tipo_puntuacion; ?></td>
                                <td><?php echo $puntos->cantidad; ?></td>

                                <td> <a href="<?php echo $helper->url("puntos", "consultar"); ?>&id_puntos=<?php echo $puntos->id_puntos; ?>&id_usuPromocion=<?php echo $puntos->id_usuPromocion; ?>" id="consultar"><img src="imagenes/lupa.png" > </a> 
                                    <a href="<?php echo $helper->url("puntos", "Actualizar"); ?>&id_puntos=<?php echo $puntos->id_puntos; ?>" id="editar"  ><img src="imagenes/lapiz.png" ></a> 
                                    <a class="btnEliminarItem" id="id_puntos-<?php echo $puntos->id_puntos; ?>" href="#"type="button"   data-toggle="modal" data-target="#myModal">
                                        <img src="imagenes/basura.png" id="eliminar" >
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
                                <h4 class="modal-title">¿REALMENTE DESEA ELIMINAR LOS PUNTOS?</h4>
                            </div>
                            <div class="modal-body">
                                <p>Si elimina los puntos se borraran del usuario.</p>
                            </div>
                            <div class="modal-footer">

                                <a id="btnEliminar" href="#"><button type="button" class="btn btn-access" >Eliminar</button></a>
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
                <center><h2>Lista Puntos</h2><IMG id="logo" SRC="imagenes/logo2.png"></center>
            </div>
        </div>
    </div>
</div>




