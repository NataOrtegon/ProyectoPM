<?php

class CategoriaController extends ControladorBase {

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
        $categoria = new Categoria($this->adapter);

        //Conseguimos todos los usuarios
        $allcategoria = $categoria->getAll();


        //Cargamos la vista index y le pasamos valores

        $this->view("categoria/admin", array(
            "allcategoria" => $allcategoria
        ));
    }

    public function create() {

        $this->validateSession(array("Usuario Empresa", "Super Usuario"));

        if (isset($_POST["nombre"])) {
            $nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : "";
            $descripcion = isset($_POST["descripcion"]) ? $_POST["descripcion"] : "";
            //Creamos un usuario
            $categoria = new Categoria($this->adapter);
            $categoria->setNombre($nombre);
            $categoria->setDescripcion($descripcion);
            $save = $categoria->save();
            $this->redirect("categoria", "admin");
        }
        $this->view("categoria/create", array());
    }

    public function modificarCategoria() {

        $this->validateSession(array("Usuario Empresa", "Super Usuario"));

        if (isset($_POST["id_categoria"])) {
            $nombres = isset($_POST["nombre"]) ? $_POST["nombre"] : "";
            $descripcion = isset($_POST["descripcion"]) ? $_POST["descripcion"] : "";
            $id_categoria = isset($_POST["id_categoria"]) ? $_POST["id_categoria"] : "";
            //Creamos un usuario
            $categoria = new Categoria($this->adapter);
            $categoria->setNombre($nombres);
            $categoria->setDescripcion($descripcion);
            $categoria->setId_categoria($id_categoria);
            $modify = $categoria->modify();

            $this->redirect("categoria", "admin");
        }

        $this->view("categoria/modificar", array());
    }

    public function Actualizar() {

        $this->validateSession(array("Usuario Empresa", "Super Usuario"));

        if (isset($_GET["id_categoria"])) {
            $id_categoria = (int) $_GET["id_categoria"];
            //  $id_categoria = 4;

            $categoria = new Categoria($this->adapter);

            $cat = $categoria->getById("id_categoria", $id_categoria);

            $this->view("categoria/modificar", array("cat" => $cat));
        }
    }

    public function eliminar() {

        $this->validateSession(array("Usuario Empresa", "Super Usuario"));

        if (isset($_GET["id_categoria"])) {
            $id_categoria = (int) $_GET["id_categoria"];

            $categoria = new Categoria($this->adapter);
            $categoria->deleteById("id_categoria", $id_categoria);
        }
        $this->redirect("categoria", "admin");
    }

    public function Consultar() {

        $this->validateSession(array("Usuario Empresa", "Super Usuario"));

        if (isset($_GET["id_categoria"])) {
            $id_categoria = (int) $_GET["id_categoria"];
            //  $id_categoria = 4;

            $categoria = new Categoria($this->adapter);

            $getById = $categoria->getById("id_categoria", $id_categoria);

            $this->view("categoria/view", array("getById" => $getById));
        }
    }

}

?>