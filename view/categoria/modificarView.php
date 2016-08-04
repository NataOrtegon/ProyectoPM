

<div class="container">
    <br>
    <br>
    <br>
    <form class="cmxform" id="commentForm" action="<?php echo $helper->url("categoria", "modificarCategoria"); ?>" method="post" >
        <div class="container">



            <div class="container">
                <br>
                <br>
                <div class="col-md-6 "> 
                    <?php
                    if ($cat) {
                        ?>


                        <a href="<?php echo $helper->url("categoria", "Admin"); ?>" id="consultar"><img 
                                src="imagenes/regreso.png" > </a> <br><br>
                        <label for="nombre">Nombre Categoria:</label>
                        <input type="text" name="nombre" class="form-control "  value="<?php echo $cat->nombre ?>" placeholder="Nombre Categoria">
                        <br>
                        <label for="descripcion">Descripcion:</label>
                        <input type="text"  name="descripcion" class="form-control"  value="<?php echo $cat->descripcion ?>" placeholder="Descripcion">

                        <input type="hidden" name="id_categoria" class="form-control" value="<?php echo $cat->id_categoria ?>"/>

                        <br>
                        <input type="submit" id="buscarid" value="modificar" class="btn btn-success"/>

                        </form>
                    </div>
                    <?php
                }
                ?>


                <div class="container">
                    <div id="Lista" class="col-md-4">
                        <center><h1>Editar categoria</h1><IMG id="logo" SRC="imagenes/logo2.png"></center>
                    </div>
                </div> 


