<?php

require_once 'libs/password.php';

class SuperUsuarioController extends ControladorBase {

    public $conectar;
    public $adapter;

    public function __construct() {
        parent::__construct();

        $this->conectar = new Conectar();
        $this->adapter = $this->conectar->conexion();
    }

    public function admin() {

        $this->validateSession(array("Super Usuario"));

        //Creamos el objeto usuario
        $SuperUsuario = new SuperUsuario($this->adapter);

        //Conseguimos todos los usuarios
        $allSuperUsuario = $SuperUsuario->getAll();


        //Cargamos la vista index y le pasamos valores

        $this->view("superusuario/admin", array(
            "allSuperUsuario" => $allSuperUsuario
        ));
    }

    public function create() {

        $this->validateSession(array("Super Usuario"));

        if (isset($_POST["nombre"])) {
            $nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : "";
            $email = isset($_POST["email"]) ? $_POST["email"] : "";
//          $id_usuario = isset($_POST["id_usuario"])?$_POST["id_usuario"]:"";     
            $contrasena = isset($_POST["contrasena"]) ? $_POST["contrasena"] : "";
//            $contrasena = password_hash($contrasea, PASSWORD_DEFAULT);

            $estado = "Activo";
            $fechaReg = date("Y-m-d H:i:s");

            //ruta de foto   
            $fotos = isset($_POST["foto"]) ? $_POST["foto"] : "";
            $nombre_foto = $_FILES["foto"]["name"];
            $tipo_foto = $_FILES["foto"]["type"];
            $tamano_foto = $_FILES["foto"]["size"];

            if (!((strpos($tipo_foto, "gif") || strpos($tipo_foto, "jpeg") || strpos($tipo_foto, "png")) && ($tamano_foto < 3000000))) {
                echo "La extensión o el tamaño de los archivos no es correcta. <br><br><table><tr><td><li>Se permiten archivos .gif .jpg o .png<br><li>Se permiten archivos de 3M máximo.</td></tr></table>";
            } else {
                $fotos = "fotos/superusuario/superusuario_foto_" . $nombre_foto;
                if (move_uploaded_file($_FILES["foto"]["tmp_name"], $fotos)) {
                    echo "El archivo  ha sido cargado correctamente.";
                } else {
                    echo "Ocurrió algún error al subir el fichero. No pudo guardarse.";
                }
            }

            //Creamos un login
            $Login_Usuario = new Login_Usuario($this->adapter);
            $Login_Usuario->setTipo_usuario("Super Usuario");
            $Login_Usuario->setEmail($email);
            $option = ['cost' => 12, 'salt' => 'This is the ADSI project salt'];
            $Login_Usuario->setContrasena(password_hash($contrasena, PASSWORD_BCRYPT, $option));
            $Login_Usuario->setEstado($estado);
            $Login_Usuario->setFecha_registro($fechaReg);
            $newlogin = $Login_Usuario->save();

            //Creamos un usuario
            $SuperUsuario = new SuperUsuario($this->adapter);
            $SuperUsuario->setNombre($nombre);
            $SuperUsuario->setEmail($email);
            $SuperUsuario->setId_Usuario($newlogin);
            $SuperUsuario->setContrasena(password_hash($contrasena, PASSWORD_BCRYPT, $option));
            $SuperUsuario->setFoto($fotos);

            $save = $SuperUsuario->save();

            $this->redirect("superusuario", "admin");
        }
        $this->view("superusuario/create", array());
    }

    public function modificar() {

        $this->validateSession(array("Super Usuario"));

        if (isset($_POST["nombre"])) {

            $id_Super = isset($_POST["id_super"]) ? $_POST["id_super"] : "";
            $nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : "";
            $email = isset($_POST["email"]) ? $_POST["email"] : "";
            $id_usuario = isset($_POST["id_usuario"]) ? $_POST["id_usuario"] : "";
            $contrasena = isset($_POST["contrasena"]) ? $_POST["contrasena"] : "";

            //ruta de foto   
            $fotos = isset($_POST["foto"]) ? $_POST["foto"] : "";
            $nombre_foto = $_FILES["foto"]["name"];
            $tipo_foto = $_FILES["foto"]["type"];
            $tamano_foto = $_FILES["foto"]["size"];

            if (!((strpos($tipo_foto, "gif") || strpos($tipo_foto, "jpeg") || strpos($tipo_foto, "png")) && ($tamano_foto < 3000000))) {
                echo "La extensión o el tamaño de los archivos no es correcta. <br><br><table><tr><td><li>Se permiten archivos .gif .jpg o .png<br><li>Se permiten archivos de 3M máximo.</td></tr></table>";
            } else {
                $fotos = "fotos/superusuario/superusuario_foto_" . $nombre_foto;
                if (move_uploaded_file($_FILES["foto"]["tmp_name"], $fotos)) {
                    echo "El archivo  ha sido cargado correctamente.";
                } else {
                    echo "Ocurrió algún error al subir el fichero. No pudo guardarse.";
                }
            }

            $SuperUsuario = new SuperUsuario($this->adapter);
            $SuperUsuario->setNombre($nombre);
            $SuperUsuario->setEmail($email);
            $SuperUsuario->setId_usuario($id_usuario);
            $SuperUsuario->setContrasena($contrasena);
            $SuperUsuario->setFoto($fotos);
            $SuperUsuario->setId_super($id_Super);

            $estado = "Activo";
            $fechaReg = date("Y-m-d H:i:s");


            //Creamos un login
            $Login_Usuario = new Login_Usuario($this->adapter);
            $Login_Usuario->setId_usuario($id_usuario);
            $Login_Usuario->setTipo_usuario("Super Usuario");
            $Login_Usuario->setEmail($email);
            $Login_Usuario->setContrasena($contrasena);
            $Login_Usuario->setEstado($estado);
            $Login_Usuario->setFecha_registro($fechaReg);
            $newlogin = $Login_Usuario->modify();

            //print_r($newlogin);
            //Creamos un usuario

            $modify = $SuperUsuario->modify();

            $this->redirect("superusuario", "admin");
        }
    }

    public function Actualizar() {

        $this->validateSession(array("Super Usuario"));

        if (isset($_GET["id_super"])) {
            $id_super = (int) $_GET["id_super"];

            $SuperUsuario = new SuperUsuario($this->adapter);

            $super = $SuperUsuario->getById("id_super", $id_super);

            $this->view("superusuario/modificar", array("super" => $super));
        }
    }

    public function eliminar() {

        $this->validateSession(array("Super Usuario"));

        if (isset($_GET["id_super"])) {
            $id_super = (int) $_GET["id_super"];

            $SuperUsuario = new SuperUsuario($this->adapter);
            $SuperUsuario->deleteById("id_super", $id_super);
        }
        $this->redirect("superusuario", "admin");
    }

    public function consultar() {

        $this->validateSession(array("Super Usuario"));

        if (isset($_GET["id_super"])) {
            $id_super = (int) $_GET["id_super"];
            //  $id_categoria = 4;

            $SuperUsuario = new SuperUsuario($this->adapter);

            $getById = $SuperUsuario->getById("id_super", $id_super);

            $this->view("superusuario/view", array("getById" => $getById));
        }
    }

}

?>