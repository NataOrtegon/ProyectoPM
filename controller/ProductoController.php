<?php

class productoController extends ControladorBase {

    public $conectar;
    public $adapter;

    public function __construct() {
        parent::__construct();
        $this->conectar = new Conectar();
        $this->adapter = $this->conectar->conexion();
    }

    public function admin() {

        $this->validateSession(array("Usuario Empresa", "Super Usuario"));

        //Creamos el objeto usuario
        $producto = new producto($this->adapter);

        //Conseguimos todos los usuarios
        $allproducto = $producto->getAll();


        //Cargamos la vista index y le pasamos valores

        $this->view("producto/admin", array(
            "allproducto" => $allproducto
        ));
    }

    public function create() {

        $this->validateSession(array("Usuario Empresa", "Super Usuario"));

        if (isset($_POST["nombre"])) {
            $nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : "";
            $descripcion = isset($_POST["descripcion"]) ? $_POST["descripcion"] : "";
            $precio_actual = isset($_POST["precio_actual"]) ? $_POST["precio_actual"] : "";
            $id_usuEmpresa = isset($_POST["id_usuEmpresa"]) ? $_POST["id_usuEmpresa"] : "";
            $id_categoria = isset($_POST["id_categoria"]) ? $_POST["id_categoria"] : "";
            //ruta de foto   
            $fotos = isset($_POST["foto"]) ? $_POST["foto"] : "";
            $nombre_foto = $_FILES["foto"]["name"];
            $tipo_foto = $_FILES["foto"]["type"];
            $tamano_foto = $_FILES["foto"]["size"];

            if (!((strpos($tipo_foto, "gif") || strpos($tipo_foto, "jpeg") || strpos($tipo_foto, "png")) && ($tamano_foto < 3000000))) {
                echo "La extensión o el tamaño de los archivos no es correcta. <br><br><table><tr><td><li>Se permiten archivos .gif .jpg o .png<br><li>Se permiten archivos de 3M máximo.</td></tr></table>";
            } else {
                $fotos = "fotos/productos/producto_foto_" . $nombre_foto;
                if (move_uploaded_file($_FILES["foto"]["tmp_name"], $fotos)) {
                    echo "El archivo no ha sido cargado correctamente.";
                } else {
                    echo "Ocurrió algún error al subir el fichero. No pudo guardarse.";
                }
            }

            //Creamos un usuario
            $producto = new Producto($this->adapter);
            $producto->setNombre($nombre);
            $producto->setDescripcion($descripcion);
            $producto->setPrecio_Actual($precio_actual);
            $producto->setFoto($fotos);
            $producto->setid_usuEmpresa($id_usuEmpresa);
            $producto->setId_Categoria($id_categoria);
            $save = $producto->save();
            //print_r($save);
            $this->redirect("producto", "admin");
        } else {
            $categoria = new Categoria($this->adapter);
            $allcategoria = $categoria->getAll("id_categoria");

            $UsuarioEmpresa = new Usuario_Empresa($this->adapter);
            $allUsuarioEmpresa = $UsuarioEmpresa->getAll("id_usuEmpresa");

            $this->view("producto/create", array(
                "allcategoria" => $allcategoria,
                "allUsuarioEmpresa" => $allUsuarioEmpresa
            ));
        }
    }

    public function modificarProducto() {

        $this->validateSession(array("Usuario Empresa", "Super Usuario"));

        if (isset($_POST["id_producto"])) {

            $id_producto = isset($_POST["id_producto"]) ? $_POST["id_producto"] : "";
            $nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : "";
            $descripcion = isset($_POST["descripcion"]) ? $_POST["descripcion"] : "";
            $precio_actual = isset($_POST["precio_actual"]) ? $_POST["precio_actual"] : "";
            
            //$id_usuEmpresa = isset($_POST["id_usuEmpresa"])?$_POST["id_usuEmpresa"]:"";     
            $id_categoria = isset($_POST["id_categoria"]) ? $_POST["id_categoria"] : "";

            //ruta de foto   
            $fotos = isset($_POST["foto"]) ? $_POST["foto"] : "";
            $nombre_foto = $_FILES["foto"]["name"];
            $tipo_foto = $_FILES["foto"]["type"];
            $tamano_foto = $_FILES["foto"]["size"];

            if (!((strpos($tipo_foto, "gif") || strpos($tipo_foto, "jpeg") || strpos($tipo_foto, "png")) && ($tamano_foto < 3000000))) {
                echo "La extensión o el tamaño de los archivos no es correcta. <br><br><table><tr><td><li>Se permiten archivos .gif .jpg o .png<br><li>Se permiten archivos de 3M máximo.</td></tr></table>";
            } else {
                $fotos = "fotos/productos/producto_foto_" . $nombre_foto;
                if (move_uploaded_file($_FILES["foto"]["tmp_name"], $fotos)) {
                    echo "El archivo no ha sido cargado correctamente.";
                } else {
                    echo "Ocurrió algún error al subir el fichero. No pudo guardarse.";
                }
            }

            //Creamos un usuario
            $producto = new producto($this->adapter);

            $producto->setId_producto($id_producto);
            $producto->setNombre($nombre);
            $producto->setDescripcion($descripcion);
            $producto->setPrecio_Actual($precio_actual);
            $producto->setFoto($fotos);
            //$producto->setid_usuEmpresa($id_usuEmpresa);
            $producto->setId_Categoria($id_categoria);
            $producto->setId_producto($id_producto);

            $modify = $producto->modify();
            $this->redirect("producto", "admin");
        }

        $this->view("producto/modificar", array());
    }

    public function Actualizar() {

        $this->validateSession(array("Usuario Empresa", "Super Usuario"));

        if (isset($_GET["id_producto"])) {
            $id_producto = (int) $_GET["id_producto"];

            $producto = new producto($this->adapter);
            $pro = $producto->getById("id_producto", $id_producto);

            $categoria = new Categoria($this->adapter);
            $Allcat = $categoria->getAll("id_categoria");

            $this->view("producto/modificar", array(
                "pro" => $pro,
                "Allcat" => $Allcat
            ));
        }
    }

    public function eliminar() {

        $this->validateSession(array("Usuario Empresa", "Super Usuario"));

        if (isset($_GET["id_producto"])) {
            $id_producto = (int) $_GET["id_producto"];

            $producto = new producto($this->adapter);
            $producto->deleteById("id_producto", $id_producto);
        }
        $this->redirect("producto", "admin");
    }

    public function Consultar() {

        $this->validateSession(array("Usuario Empresa", "Super Usuario"));

        if (isset($_GET["id_producto"])) {
            $id_producto = (int) $_GET["id_producto"];
            // $id_Producto = 1;
            $id_categoria = (int) $_GET["id_categoria"];
            $id_usuEmpresa = (int) $_GET["id_usuEmpresa"];

            $producto = new producto($this->adapter);
            $pro = $producto->getById("id_producto", $id_producto);

            $categoria = new Categoria($this->adapter);
            $cat = $categoria->getById("id_categoria", $id_categoria);

            $usuEmpresa = new Usuario_Empresa($this->adapter);
            $usuE = $usuEmpresa->getById("id_usuEmpresa", $id_usuEmpresa);

            $this->view("producto/view", array(
                "pro" => $pro,
                "cat" => $cat,
                "usuE" => $usuE
            ));
        }
    }

}

?>