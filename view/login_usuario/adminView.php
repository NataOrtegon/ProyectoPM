<script type="text/javascript">
    var urlDelete = "<?php echo $helper->url("Login_Usuario", "eliminar"); ?>&id_usuario=";
</script>f

<div class="container">
    <br>
    <br>
    <br>
    <br>
    <div class="container">
        <div class="col-md-6 "> 


            <table class="table">
                <thead>
                    <tr>

                        <th>Tipo de usuario</th>
                        <th>Email</th>

                    </tr>
                </thead>


                <tbody>

                    <?php foreach ($allLogin_Usuario as $Login_Usuario) { ?>
                        <tr class="info">

                            <td><?php echo $Login_Usuario->tipo_usuario; ?></td>
                            <td><?php echo $Login_Usuario->email; ?> </td>

                            <td> <a href="<?php echo $helper->url("Login_Usuario", "Consultar"); ?>&id_usuario=<?php echo $Login_Usuario->id_usuario; ?>" id="consultar"><img src="imagenes/lupa.png" > </a> 
                                <a href="<?php echo $helper->url("Login_Usuario", "Actualizar"); ?>&id_usuario=<?php echo $Login_Usuario->id_usuario; ?>"><img src="imagenes/lapiz.png" id="editar" ></a> 
                                <a class="btnEliminarItem" id="id_usuario-<?php echo $Login_Usuario->id_usuario; ?>" href="#" type="button"   data-toggle="modal" data-target="#myModal">
                                    <img src="imagenes/basura.png" > 
                                </a>
                            </td>
                        </tr>
                    <?php } ?>

                <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">¿REALMENTE DESEA ELIMINAR ESTE USUARIO ?</h4>
                            </div>
                            <div class="modal-body">
                                <p>Si elimina este Usuario desaparecera todo lo vinculado con el mismo.</p>
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
                <center><h2>Lista Usuarios</h2><IMG id="logo" SRC="imagenes/logo2.png"></center>
            </div>
        </div>
    </div>
</div>


