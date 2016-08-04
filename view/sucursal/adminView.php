
<script type="text/javascript">
    var urlDelete = "<?php echo $helper->url("sucursal", "eliminar"); ?>&id_sucursal=";
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

                        <th> Dirección</th>
                        <th>Opciones</th>


                    </tr>
                </thead>


                <tbody>

                    <?php
                    if (isset($allsucursal)) {
                        foreach ($allsucursal as $Sucursal) {
                            ?>

                            <tr class="info">

                                <td><?php echo $Sucursal->direccion; ?></td>



                                <td> <a href="<?php echo $helper->url("sucursal", "consultar"); ?>&id_sucursal=<?php echo $Sucursal->id_sucursal; ?>&id_usuEmpresa=<?php echo $Sucursal->id_usuEmpresa; ?>" id="consultar"><img 
                                            src="imagenes/lupa.png" > </a> 
                                    <a href="<?php echo $helper->url("sucursal", "Actualizar"); ?>&id_sucursal=<?php echo $Sucursal->id_sucursal; ?>"><img src="imagenes/lapiz.png" id="editar" ></a> 
                                    <a class="btnEliminarItem" id="id_sucursal-<?php echo $Sucursal->id_sucursal; ?>" type="button"   data-toggle="modal" data-target="#myModal">
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
                                <h4 class="modal-title">¿REALMENTE DESEA ELIMINAR ESTA SUCURSAL?</h4>
                            </div>
                            <div class="modal-body">
                                <p>Si elimina esta sucursal borrará todos los registros.</p>
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
                <center><h2>Lista Sucursales</h2><IMG id="logo" SRC="imagenes/logo2.png"></center>
            </div>
        </div>




