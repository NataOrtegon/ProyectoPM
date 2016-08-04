<?php

require_once 'libs/password.php';

class UsuarioempresaController extends ControladorBase {

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
        $UsuarioEmpresa = new Usuario_Empresa($this->adapter);

        //Conseguimos todos los usuarios
        $allUsuarioEmpresa = $UsuarioEmpresa->getAll();

        //Cargamos la vista index y le pasamos valores

        $this->view("usuarioempresa/admin", array(
            "allusuarioempresa" => $allUsuarioEmpresa
        ));
    }

    public function create() {


        if (isset($_POST["nombre"])) {
            $nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : "";
            $ciudad = isset($_POST["ciudad"]) ? $_POST["ciudad"] : "";
            $email = isset($_POST["email"]) ? $_POST["email"] : "";
            $direccion = isset($_POST["direccion"]) ? $_POST["direccion"] : "";
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
                $fotos = "fotos/usuarioempresa/usuempresa_foto" . $nombre_foto;
                if (move_uploaded_file($_FILES["foto"]["tmp_name"], $fotos)) {
                    echo "El archivo no ha sido cargado correctamente.";
                } else {
                    echo "Ocurrió algún error al subir el fichero. No pudo guardarse.";
                }
            }

            //Creamos un login
            $Login_Usuario = new Login_Usuario($this->adapter);
            $Login_Usuario->setTipo_usuario("Usuario Empresa");
            $Login_Usuario->setEmail($email);
            $option = ['cost' => 12, 'salt' => 'This is the ADSI project salt'];
            $Login_Usuario->setContrasena(password_hash($contrasena, PASSWORD_BCRYPT, $option));
            $Login_Usuario->setEstado($estado);
            $Login_Usuario->setFecha_registro($fechaReg);
            $newlogin = $Login_Usuario->save();



            //Creamos un usuario
            $UsuarioEmpresa = new Usuario_Empresa($this->adapter);
            $UsuarioEmpresa->setNombre($nombre);
            $UsuarioEmpresa->setCiudad($ciudad);
            $UsuarioEmpresa->setEmail($email);
            $UsuarioEmpresa->setDireccion($direccion);
            $UsuarioEmpresa->setId_Usuario($newlogin);
            $UsuarioEmpresa->setContrasenna(password_hash($contrasena, PASSWORD_BCRYPT, $option));
            $UsuarioEmpresa->setFoto($fotos);
            $save = $UsuarioEmpresa->save();
//            if ($UsuarioEmpresa->validarLogin()) {
//                $this->view("usuarioempresa/admin");
//            } else {
//                $this->view("login_usuario/login", array(
//                    "errores" => "Error a iniciar sesion, por favor intentelo de nuevo"
//                ));
//            }
        }
        $this->view("usuarioempresa/create", array());
    }

    public function modificarUsuarioEmpresa() {

        $this->validateSession(array("Usuario Empresa", "Super Usuario"));

        if (isset($_POST["id_usuEmpresa"])) {


            $nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : "";
            $ciudad = isset($_POST["ciudad"]) ? $_POST["ciudad"] : "";
            $email = isset($_POST["email"]) ? $_POST["email"] : "";
            $direccion = isset($_POST["direccion"]) ? $_POST["direccion"] : "";
            $id_usuario = isset($_POST["id_usuario"]) ? $_POST["id_usuario"] : "";
            $contrasena = isset($_POST["contrasena"]) ? $_POST["contrasena"] : "";
            $id_usu_empresa = isset($_POST["id_usuEmpresa"]) ? $_POST["id_usuEmpresa"] : "";
            $estado = "Activo";
            $fechaReg = date("Y-m-d H:i:s");

            //ruta de foto   
            $nombre_foto = $_FILES["foto"]["name"];
            $tipo_foto = $_FILES["foto"]["type"];
            $tamano_foto = $_FILES["foto"]["size"];

            if (!((strpos($tipo_foto, "gif") || strpos($tipo_foto, "jpeg") || strpos($tipo_foto, "png")) && ($tamano_foto < 3000000))) {
                echo "La extensión o el tamaño de los archivos no es correcta. <br><br><table><tr><td><li>Se permiten archivos .gif .jpg o .png<br><li>Se permiten archivos de 3M máximo.</td></tr></table>";
            } else {
                $fotos = "fotos/usuarioempresa/usuempresa_foto" . $nombre_foto;
                if (move_uploaded_file($_FILES["foto"]["tmp_name"], $fotos)) {
                    echo "El archivo no ha sido cargado correctamente.";
                } else {
                    echo "Ocurrió algún error al subir el fichero. No pudo guardarse.";
                }
            }

            //Creamos un login
            $Login_Usuario = new Login_Usuario($this->adapter);
            $Login_Usuario->setId_usuario($id_usuario);
            $Login_Usuario->setTipo_usuario("Usuario Empresa");
            $Login_Usuario->setEmail($email);
            $Login_Usuario->setContrasena($contrasena);
            $Login_Usuario->setEstado($estado);
            $Login_Usuario->setFecha_registro($fechaReg);
            $newlogin = $Login_Usuario->modify();

            print_r($newlogin);

            //Creamos un usuario
            $UsuarioEmpresa = new Usuario_Empresa($this->adapter);
            $UsuarioEmpresa->setNombre($nombre);
            $UsuarioEmpresa->setCiudad($ciudad);
            $UsuarioEmpresa->setEmail($email);
            $UsuarioEmpresa->setDireccion($direccion);
            $UsuarioEmpresa->setId_Usuario($id_usuario);
            $UsuarioEmpresa->setContrasena($contrasena);
            $UsuarioEmpresa->setFoto($fotos);
            $UsuarioEmpresa->setId_Usu_Empresa($id_usu_empresa);
            $modify = $UsuarioEmpresa->modify();
            $this->redirect("usuarioempresa", "admin");
        }

        $this->view("usuarioempresa/modificar", array());
    }

    public function Actualizar() {
        $this->validateSession(array("Usuario Empresa", "Super Usuario"));

        if (isset($_GET["id_usuEmpresa"])) {
            $id_usu_empresa = (int) $_GET["id_usuEmpresa"];
            $UsuarioEmpresa = new Usuario_Empresa($this->adapter);
            $empresa = $UsuarioEmpresa->getById("id_usuEmpresa", $id_usu_empresa);
//            print_r($sucur);
            $this->view("usuarioempresa/modificar", array("empresa" => $empresa));
        }
    }

    public function Consultar() {

        $this->validateSession(array("Usuario Empresa", "Super Usuario"));

        if (isset($_GET["id_usuEmpresa"])) {

            $id_usu_empresa = (int) $_GET["id_usuEmpresa"];

            $UsuarioEmpresa = new Usuario_Empresa($this->adapter);

            $getById = $UsuarioEmpresa->getById("id_usuEmpresa", $id_usu_empresa);

            $this->view("usuarioempresa/view", array("getById" => $getById));
        }
    }

    public function eliminar() {

        $this->validateSession(array("Usuario Empresa", "Super Usuario"));

        if (isset($_GET["id_usuEmpresa"])) {
            $id_usu_empresa = (int) $_GET["id_usuEmpresa"];

            $UsuarioEmpresa = new Usuario_Empresa($this->adapter);
            $UsuarioEmpresa->deleteById("id_usuEmpresa", $id_usu_empresa);
        }
        //print_r($UsuarioEmpresa);
        $this->redirect("usuarioempresa", "admin");
    }

}

?>