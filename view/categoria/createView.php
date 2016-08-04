
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
        <form  class="cmxform" id="commentForm" action="<?php echo $helper->url("categoria", "create"); ?>" method="post" >


            <label for="cname">Nombre Categoria:</label>
            <input   type="text" class="form-control "    name="nombre" placeholder="Nombre de la Categoria"> 
            <br>
            <label for="descripcion">Descripcion:</label>
            <input type="text"  class="form-control "  name="descripcion" placeholder="Descripcion de la Categoria">
            <br>

            &nbsp;<input type="submit"  id="buscarid" value="crear" class="btn btn-success"/>

        </form>
    </div>



    <div id="lista" class="container">
        <div id="Lista" class=" col-md-4">
            <center><h2>Agregar Categoria</h2><IMG id="logo"  SRC="imagenes/logo2.png"></center>
            </ul>
        </div>

    </div>
</div>





