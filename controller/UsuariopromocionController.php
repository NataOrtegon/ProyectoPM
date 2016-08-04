<?php

require_once 'libs/password.php';

class UsuarioPromocionController extends ControladorBase {

    public $conectar;
    public $adapter;

    public function __construct() {
        parent::__construct();

        $this->conectar = new Conectar();
        $this->adapter = $this->conectar->conexion();
    }

    public function admin() {

        $this->validateSession(array("Usuario Promocion", "Super Usuario"));

        //Creamos el objeto usuario
        $User_Promo = new Usuario_Promo($this->adapter);

        //Conseguimos todos los usuarios
        $allUser_Promo = $User_Promo->getAll();


        //Cargamos la vista index y le pasamos valores

        $this->view("usuariopromocion/admin", array(
            "allUser_Promo" => $allUser_Promo
        ));
    }

    public function create() {


        if (isset($_POST["nombre"])) {

            $nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : "";
            $fecha_nacimiento = isset($_POST["fecha_nacimiento"]) ? $_POST["fecha_nacimiento"] : "";
            $genero = isset($_POST["genero"]) ? $_POST["genero"] : "";
            $ciudad = isset($_POST["ciudad"]) ? $_POST["ciudad"] : "";
            $email = isset($_POST["email"]) ? $_POST["email"] : "";
            $id_usuario = isset($_POST["id_usuario"]) ? $_POST["id_usuario"] : "";
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
                $fotos = "fotos/usuariopromocion/usupromo_foto_" . $nombre_foto;
                if (move_uploaded_file($_FILES["foto"]["tmp_name"], $fotos)) {
                    echo "El archivo no ha sido cargado correctamente.";
                } else {
                    echo "Ocurrió algún error al subir el fichero. No pudo guardarse.";
                }
            }


            //Creamos un login
            $Login_Usuario = new Login_Usuario($this->adapter);
            $Login_Usuario->setTipo_usuario("Usuario Promocion");
            $Login_Usuario->setEmail($email);
            $option = ['cost' => 12, 'salt' => 'This is the ADSI project salt'];
            $Login_Usuario->setContrasena(password_hash($contrasena, PASSWORD_BCRYPT, $option));
            $Login_Usuario->setEstado($estado);
            $Login_Usuario->setFecha_registro($fechaReg);
            $newlogin = $Login_Usuario->save();


            //Creamos un usuario
            $User_Promo = new Usuario_Promo($this->adapter);
            $User_Promo->setNombre($nombre);
            $User_Promo->setFecha_Nacimiento($fecha_nacimiento);
            $User_Promo->setGenero($genero);
            $User_Promo->setCiudad($ciudad);
            $User_Promo->setEmail($email);
            $User_Promo->setId_Usuario($newlogin);
            $User_Promo->setContrasena(password_hash($contrasena, PASSWORD_BCRYPT, $option));
            $User_Promo->setFoto($fotos);
            $save = $User_Promo->save();

//            if ($User_Promo->validarLogin()) {
//                $this->view("usuariopromocion/admin");
//            } else {
//                $this->view("login_usuario/login", array(
//                    "errores" => "Error a iniciar sesion, por favor intentelo de nuevo"
//                ));
//            }
        }
        $this->view("usuariopromocion/create", array());
    }

    public function modificarUsuarioPromocion() {

        $this->validateSession(array("Usuario Promocion", "Super Usuario"));

        if (isset($_POST["id_usupromocion"])) {

            $nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : "";
            $fecha_nacimiento = isset($_POST["fecha_nacimiento"]) ? $_POST["fecha_nacimiento"] : "";
            $genero = isset($_POST["genero"]) ? $_POST["genero"] : "";
            $ciudad = isset($_POST["ciudad"]) ? $_POST["ciudad"] : "";
            $email = isset($_POST["email"]) ? $_POST["email"] : "";
            $id_usuario = isset($_POST["id_usuario"]) ? $_POST["id_usuario"] : "";
            $contrasena = isset($_POST["contrasena"]) ? $_POST["contrasena"] : "";
            $id_userpromo = isset($_POST["id_usupromocion"]) ? $_POST["id_usupromocion"] : "";
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
                $fotos = "fotos/usuariopromocion/usupromo_foto_" . $nombre_foto;
                if (move_uploaded_file($_FILES["foto"]["tmp_name"], $fotos)) {
                    echo "El archivo no ha sido cargado correctamente.";
                } else {
                    echo "Ocurrió algún error al subir el fichero. No pudo guardarse.";
                }
            }


            //Creamos un login
            $Login_Usuario = new Login_Usuario($this->adapter);
            $Login_Usuario->setId_usuario($id_usuario);
            $Login_Usuario->setTipo_usuario("Usuario Promocion");
            $Login_Usuario->setEmail($email);
            $option = ['cost' => 12, 'salt' => 'This is the ADSI project salt'];
            $Login_Usuario->setContrasena(password_hash($contrasena, PASSWORD_BCRYPT, $option));
            $Login_Usuario->setEstado($estado);
            $Login_Usuario->setFecha_registro($fechaReg);
            $newlogin = $Login_Usuario->modify();

//            print_r($newlogin);
            //Creamos un usuario
            $User_Promo = new Usuario_Promo($this->adapter);
            $User_Promo->setNombre($nombre);
            $User_Promo->setFecha_Nacimiento($fecha_nacimiento);
            $User_Promo->setGenero($genero);
            $User_Promo->setCiudad($ciudad);
            $User_Promo->setEmail($email);
            $User_Promo->setId_Usuario($id_usuario);
            $User_Promo->setContrasena(password_hash($contrasena, PASSWORD_BCRYPT, $option));
            $User_Promo->setFoto($fotos);
            $User_Promo->setId_UserPromo($id_userpromo);
            $modify = $User_Promo->modify();
            $this->redirect("usuariopromocion", "admin");
        }

        $this->view("usuariopromocion/modificar", array());
    }

    public function Actualizar() {

        $this->validateSession(array("Usuario Promocion", "Super Usuario"));

        if (isset($_GET["id_usupromocion"])) {
            $id_userpromo = (int) $_GET["id_usupromocion"];
            $User_Promo = new Usuario_Promo($this->adapter);
            $promocion = $User_Promo->getById("id_usupromocion", $id_userpromo);
//            print_r($sucur);
            $this->view("usuariopromocion/modificar", array("promocion" => $promocion));
        }
    }

    public function Consultar() {

        $this->validateSession(array("Usuario Promocion", "Super Usuario"));

        if (isset($_GET["id_usupromocion"])) {

            $id_userpromo = (int) $_GET["id_usupromocion"];

            $User_Promo = new Usuario_Promo($this->adapter);

            $getById = $User_Promo->getById("id_usuPromocion", $id_userpromo);

            $this->view("usuariopromocion/view", array("getById" => $getById));
        }
    }

    public function eliminar() {

        $this->validateSession(array("Usuario Promocion", "Super Usuario"));

        if (isset($_GET["id_usupromocion"])) {
            $id_userpromo = (int) $_GET["id_usuPromocion"];

            $User_Promo = new Usuario_Promo($this->adapter);
            $User_Promo->deleteById("id_usupromocion", $id_userpromo);
        }
        $this->redirect("usuariopromocion", "admin");
    }

}

?>