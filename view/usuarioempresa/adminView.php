<script type="text/javascript">
    var urlDelete = "<?php echo $helper->url("usuarioempresa", "eliminar"); ?>&id_usuEmpresa=";
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
                        <th>Nombre de la Empresa</th>
                        <th>Ciudad</th>
                        <th>Opciones</th>
                    </tr>
                </thead>


                <tbody>
                    <?php
                    if (isset($allusuarioempresa)) {
                        foreach ($allusuarioempresa as $UsuarioEmpresa) {
                            ?>
                            <tr class="info">

                                <td><?php echo $UsuarioEmpresa->nombre; ?> </td>
                                <td><?php echo $UsuarioEmpresa->ciudad; ?></td>

                                <td>
                                    <a href="<?php echo $helper->url("usuarioempresa", "Consultar"); ?>&id_usuEmpresa=<?php echo $UsuarioEmpresa->id_usuEmpresa; ?>" id="consultar"><img src="imagenes/lupa.png" > </a> 
                                    <a href="<?php echo $helper->url("usuarioempresa", "Actualizar"); ?>&id_usuEmpresa=<?php echo $UsuarioEmpresa->id_usuEmpresa; ?>"  id="editar"><img src="imagenes/lapiz.png" ></a> 
                                    <a class="btnEliminarItem" id="id_usuEmpresa-<?php echo $UsuarioEmpresa->id_usuEmpresa; ?>" href="#" type="button"   data-toggle="modal" data-target="#myModal"><img src="imagenes/basura.png" id="eliminar" > </a>

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
                                <h4 class="modal-title">¿REALMENTE DESEA ELIMINAR ESTE USUARIO?</h4>
                            </div>
                            <div class="modal-body">
                                <p>Si elimina este usuario empresa borrará todos los registros.</p>
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
                <center><h2>Lista Usuarios Empresa</h2><IMG id="logo" SRC="imagenes/logo2.png"></center>
            </div>
        </div>
    </div>
</div>