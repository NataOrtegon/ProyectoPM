<?php

class PublicacionesController extends ControladorBase {

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
        $publicaciones = new Publicaciones($this->adapter);

        //Conseguimos todos los usuarios
        $allpublicaciones = $publicaciones->getAll();

        //Cargamos la vista index y le pasamos valores
        $this->view("publicaciones/admin", array(
            "allpublicaciones" => $allpublicaciones
        ));
    }

    public function create() {

        $this->validateSession(array("Usuario Empresa", "Super Usuario"));

        if (isset($_POST["nombre"])) {
            $estado = "Activo";
            $fecha_creacion = date("Y-m-d H:i:s");
            $fecha_inicio = isset($_POST["fecha_inicio"]) ? $_POST["fecha_inicio"] : "";
            $fecha_final = isset($_POST["fecha_final"]) ? $_POST["fecha_final"] : "";
            $descripcion = isset($_POST["descripcion"]) ? $_POST["descripcion"] : "";
            $nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : "";
            $fecha_registro = date("Y-m-d H:i:s");
            $id_usuEmpresa = isset($_POST["id_usuEmpresa"]) ? $_POST["id_usuEmpresa"] : "";

            //ruta de foto   
            $fotos = isset($_POST["foto"]) ? $_POST["foto"] : "";
            $nombre_foto = $_FILES["foto"]["name"];
            $tipo_foto = $_FILES["foto"]["type"];
            $tamano_foto = $_FILES["foto"]["size"];

            if (!((strpos($tipo_foto, "gif") || strpos($tipo_foto, "jpeg") || strpos($tipo_foto, "png")) && ($tamano_foto < 3000000))) {
                echo "La extensión o el tamaño de los archivos no es correcta. <br><br><table><tr><td><li>Se permiten archivos .gif .jpg o .png<br><li>Se permiten archivos de 3M máximo.</td></tr></table>";
            } else {
                $fotos = "fotos/publicaciones/publicacion_foto_" . $nombre_foto;
                if (move_uploaded_file($_FILES["foto"]["tmp_name"], $fotos)) {
                    echo "El archivo no ha sido cargado correctamente.";
                } else {
                    echo "Ocurrió algún error al subir el fichero. No pudo guardarse.";
                }
            }

            //Creamos un usuario
            $publicaciones = new Publicaciones($this->adapter);
            $publicaciones->setEstado($estado);
            $publicaciones->setFecha_Creacion($fecha_creacion);
            $publicaciones->setFecha_Inicio($fecha_inicio);
            $publicaciones->setFecha_Final($fecha_final);
            $publicaciones->setDescripcion($descripcion);
            $publicaciones->setNombre($nombre);
            $publicaciones->setFecha_Registro($fecha_registro);
            $publicaciones->setId_Usu_Empresa($id_usuEmpresa);
            $publicaciones->setFoto($fotos);
            $save = $publicaciones->save();
            $this->redirect("publicaciones", "admin");
        } else {
            $UsuarioEmpresa = new Usuario_Empresa($this->adapter);
            $allUsuarioEmpresa = $UsuarioEmpresa->getAll("id_usuEmpresa");

            $this->view("publicaciones/create", array(
                "allUsuarioEmpresa" => $allUsuarioEmpresa
            ));
        }
    }

    public function modificarPublicaciones() {

        $this->validateSession(array("Usuario Empresa", "Super Usuario"));

        if (isset($_POST["id_publicacion"])) {

            $estado = isset($_POST["Estado"]) ? $_POST["Estado"] : "";
            //$fecha_creacion = isset($_POST["fecha_creacion"]) ? $_POST["fecha_creacion"] : "";
            $fecha_inicio = isset($_POST["fecha_inicio"]) ? $_POST["fecha_inicio"] : "";
            $fecha_final = isset($_POST["fecha_final"]) ? $_POST["fecha_final"] : "";
            $descripcion = isset($_POST["descripcion"]) ? $_POST["descripcion"] : "";
            $nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : "";
            $fecha_registro = isset($_POST["fecha_registro"]) ? $_POST["fecha_registro"] : "";
            $id_usuEmpresa = isset($_POST["id_usuEmpresa"]) ? $_POST["id_usuEmpresa"] : "";
            $id_publicacion = isset($_POST["id_publicacion"]) ? $_POST["id_publicacion"] : "";

            //ruta de foto   
            $fotos = isset($_POST["foto"]) ? $_POST["foto"] : "";
            $nombre_foto = $_FILES["foto"]["name"];
            $tipo_foto = $_FILES["foto"]["type"];
            $tamano_foto = $_FILES["foto"]["size"];

            if (!((strpos($tipo_foto, "gif") || strpos($tipo_foto, "jpeg") || strpos($tipo_foto, "png")) && ($tamano_foto < 3000000))) {
                echo "La extensión o el tamaño de los archivos no es correcta. <br><br><table><tr><td><li>Se permiten archivos .gif .jpg o .png<br><li>Se permiten archivos de 3M máximo.</td></tr></table>";
            } else {
                $fotos = "fotos/publicaciones/publicacion_foto_" . $nombre_foto;
                if (move_uploaded_file($_FILES["foto"]["tmp_name"], $fotos)) {
                    echo "El archivo no ha sido cargado correctamente.";
                } else {
                    echo "Ocurrió algún error al subir el fichero. No pudo guardarse.";
                }
            }


            //Creamos un usuario
            $publicaciones = new Publicaciones($this->adapter);
            $publicaciones->setEstado($estado);
            //$publicaciones->setFecha_Creacion($fecha_creacion);
            $publicaciones->setFecha_Inicio($fecha_inicio);
            $publicaciones->setFecha_Final($fecha_final);
            $publicaciones->setDescripcion($descripcion);
            $publicaciones->setNombre($nombre);
            $publicaciones->setFecha_Registro($fecha_registro);
            $publicaciones->setId_Usu_Empresa($id_usuEmpresa);
            $publicaciones->setFoto($fotos);
            $publicaciones->setId_Publicacion($id_publicacion);
            $modify = $publicaciones->modify();
            $this->redirect("publicaciones", "admin");
        }

        $this->view("publicaciones/modificar", array());
    }

    public function Actualizar() {

        $this->validateSession(array("Usuario Empresa", "Super Usuario"));

        if (isset($_GET["id_publicaciones"])) {
            $id_publicacion = (int) $_GET["id_publicaciones"];
            $publicaciones = new Publicaciones($this->adapter);
            $publica = $publicaciones->getById("id_publicaciones", $id_publicacion);
            //print_r($publica);
            $this->view("publicaciones/modificar", array("publica" => $publica));
        }
    }

    public function Consultar() {

        $this->validateSession(array("Usuario Empresa", "Super Usuario"));

        if (isset($_GET["id_publicaciones"])) {
            $id_publicacion = (int) $_GET["id_publicaciones"];
            $id_usuEmpresa = (int) $_GET["id_usuEmpresa"];

            $publicaciones = new Publicaciones($this->adapter);
            $getById = $publicaciones->getById("id_publicaciones", $id_publicacion);

            $usuEmpresa = new Usuario_Empresa($this->adapter);
            $usuE = $usuEmpresa->getById("id_usuEmpresa", $id_usuEmpresa);

            $this->view("publicaciones/view", array(
                "getById" => $getById,
                "usuE" => $usuE
            ));
        }
    }

    public function eliminar() {

        $this->validateSession(array("Usuario Empresa", "Super Usuario"));

        if (isset($_GET["id_publicaciones"])) {
            $id_publicacion = (int) $_GET["id_publicaciones"];

            $publicaciones = new Publicaciones($this->adapter);
            $publicaciones->deleteById("id_publicaciones", $id_publicacion);
        }
        $this->redirect("publicaciones", "admin");
    }

}

?>