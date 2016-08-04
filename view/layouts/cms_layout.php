<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Promociones Manizales</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/micss.css">




        <link rel="stylesheet" type="text/css" href="css/botones.css">
        <link rel="stylesheet" media="screen" href="css/jquery-ui.min.css">
        <link rel="stylesheet" type="text/css" href="css/stilos.css">



        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet">
        <link href="css/fileinput.css" media="all" rel="stylesheet" type="text/css" />
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="js/fileinput.min.js" type="text/javascript"></script>
        <script src="js/promociones_manizales_scripts.js" type="text/javascript"></script>





        <script src="Js/jquery-1.11.1.js"></script>
        <script src="Js/jquery.validate.js"></script>
        <script src="Js/jquery-ui.min.js"></script>
        <script type="text/javascript" src="Js/funciones.js"></script>
        <script type="text/javascript" src="Js/fecha.js"></script>





    </head>
    <body>
        <div class="header">

            <nav id="myNavbar" class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbarCollapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <ul class="nav navbar-nav"><br>



                            <div class="container">

                                <ul class="nav nav-tabs">



                                    <?php
                                    if ((isset($_SESSION['tipo_usuario']) && $_SESSION['tipo_usuario'] == "Usuario Empresa") || (isset($_SESSION['tipo_usuario']) && $_SESSION['tipo_usuario'] == "Super Usuario")) {
                                        ?>


                                        <li class="dropdown">

                                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Categoria<span class="caret"></span></a>
                                            <ul class="dropdown-menu">
                                                <li><a href="<?php echo $helper->url("categoria", "create"); ?>">Crear Categoria</li>
                                                <li><a href="<?php echo $helper->url("categoria", "admin"); ?>">Visualizar Categorias</a></li>

                                            </ul>
                                        </li>
                                        <?php
                                    }
                                    ?>

                                    <li class="dropdown">
                                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Login_Usuarios<span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="<?php echo $helper->url("login_usuario", "create"); ?>">logear Usuario</a></li>
                                            <li><a href="<?php echo $helper->url("login_usuario", "admin"); ?>">Visualizar Usuarios logeados   </a></li>

                                        </ul>
                                    </li> 

                                    <?php
                                    if ((isset($_SESSION['tipo_usuario']) && $_SESSION['tipo_usuario'] == "Usuario Empresa") || (isset($_SESSION['tipo_usuario']) && $_SESSION['tipo_usuario'] == "Super Usuario")) {
                                        ?>

                                        <li class="dropdown">
                                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Producto<span class="caret"></span></a>
                                            <ul class="dropdown-menu">
                                                <li><a href="<?php echo $helper->url("producto", "create"); ?>">Crear producto</a></li>
                                                <li><a href="<?php echo $helper->url("producto", "admin"); ?>">Visualizar productos</a></li>

                                            </ul>
                                        </li>
                                        <?php
                                    }
                                    ?>
                                    <?php
                                    if ((isset($_SESSION['tipo_usuario']) && $_SESSION['tipo_usuario'] == "Usuario Empresa") || (isset($_SESSION['tipo_usuario']) && $_SESSION['tipo_usuario'] == "Super Usuario")) {
                                        ?>
                                        <li class="dropdown">
                                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Publicaciones<span class="caret"></span></a>
                                            <ul class="dropdown-menu">
                                                <li><a href="<?php echo $helper->url("publicaciones", "create"); ?>">Crear Publicacion</a></li>
                                                <li><a href="<?php echo $helper->url("publicaciones", "admin"); ?>">Visualizar Publicaciones</a></li>

                                            </ul>
                                        </li>
                                        <?php
                                    }
                                    ?>
                                    <?php
                                    if ((isset($_SESSION['tipo_usuario']) && $_SESSION['tipo_usuario'] == "Super Usuario") || (isset($_SESSION['tipo_usuario']) && $_SESSION['tipo_usuario'] == "Super Usuario")) {
                                        ?>
                                        <li class="dropdown">
                                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Puntos<span class="caret"></span></a>
                                            <ul class="dropdown-menu">
                                                <li><a href="<?php echo $helper->url("puntos", "create"); ?>">Crear Puntos</a></li>
                                                <li><a href="<?php echo $helper->url("puntos", "admin"); ?>">Visualizar puntos</a></li>

                                            </ul>
                                        </li>
                                        <?php
                                    }
                                    ?>
                                    <?php
                                    if ((isset($_SESSION['tipo_usuario']) && $_SESSION['tipo_usuario'] == "Usuario Empresa") || (isset($_SESSION['tipo_usuario']) && $_SESSION['tipo_usuario'] == "Super Usuario")) {
                                        ?>
                                        <li class="dropdown">
                                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Sucursal<span class="caret"></span></a>
                                            <ul class="dropdown-menu">
                                                <li><a href="<?php echo $helper->url("sucursal", "create"); ?>">Crear Sucursal</a></li>
                                                <li><a href="<?php echo $helper->url("sucursal", "admin"); ?>">Visualizar Sucrsales</a></li>

                                            </ul>
                                        </li>
                                        <?php
                                    }
                                    ?>
                                    <?php
                                    if (isset($_SESSION['tipo_usuario']) && $_SESSION['tipo_usuario'] == "Super Usuario") {
                                        ?>    
                                        <li class="dropdown">
                                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">SuperUsuario<span class="caret"></span></a>
                                            <ul class="dropdown-menu">
                                                <li><a href="<?php echo $helper->url("superusuario", "create"); ?>">Crear SuperUsuario</a></li>
                                                <li><a href="<?php echo $helper->url("superusuario", "admin"); ?>">Visualizar SuperUsuarois</a></li>

                                            </ul>
                                        </li>
                                        <?php
                                    }
                                    ?>
                                    <li class="dropdown">
                                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">UsuarioEmpresa<span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="<?php echo $helper->url("usuarioempresa", "create"); ?>">Crear Usuario Empresa</a></li>
                                            <li><a href="<?php echo $helper->url("usuarioempresa", "admin"); ?>">Visualizar UsuariosEmpresas</a></li>

                                        </ul>
                                    </li>


                                    <li class="dropdown">
                                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">UsuarioPromocion<span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="<?php echo $helper->url("usuariopromocion", "create"); ?>">Crear UsuarioPromocion</a></li>
                                            <li><a href="<?php echo $helper->url("usuariopromocion", "admin"); ?>">Visualizar Usuariospromociones</a></li>

                                        </ul>
                                    </li>

                                    <li role="menu" class="dropdown">
                                        <a class="" href="<?php echo $helper->url("login_usuario", "logout"); ?>">
                                            Salir
                                            <?php
                                            if (isset($_SESSION['nombre'])) {
                                                echo "(" . $_SESSION['nombre'] . ")";
                                            }
                                            ?>
                                        </a>
                                    </li>




                            </div>


                        </ul>
                    </div>

                </div>
            </nav>
        </div>
        <div class="container">
            <?php require_once 'view/' . $vista . 'View.php'; ?>
            <br>
        </div>


    </body>
    <footer id="footer" class="clase-general">
        <p>Footer</p>
    </footer>

</html>
