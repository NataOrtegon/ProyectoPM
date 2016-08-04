<?php

require_once 'libs/password.php';

class Login_UsuarioController extends ControladorBase {

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
        $Login_Usuario = new Login_Usuario($this->adapter);

        //Conseguimos todos los usuarios
        $allLogin_Usuario = $Login_Usuario->getAll();


        //Cargamos la vista index y le pasamos valores

        $this->view("login_usuario/admin", array(
            "allLogin_Usuario" => $allLogin_Usuario
        ));
    }

    public function create() {

        $this->validateSession(array("Super Usuario"));

        if (isset($_POST["tipo_usuario"])) {
            $tipo_usuario = isset($_POST["tipo_usuario"]) ? $_POST["tipo_usuario"] : "";
            $email = isset($_POST["email"]) ? $_POST["email"] : "";
            $contrasena = isset($_POST["contrasena"]) ? $_POST["contrasena"] : "";
            //Creamos un usuario
            $Login_Usuario = new Login_Usuario($this->adapter);
            $Login_Usuario->setTipo_usuario($tipo_usuario);
            $Login_Usuario->setEmail($email);
            $Login_Usuario->setContrasena($contrasena);
            $save = $Login_Usuario->save();
            $this->redirect("login_usuario", "admin");
        }
        $this->view("login_usuario/create", array());
    }

    public function modificarLogin_Usuario() {

        $this->validateSession(array("Super Usuario"));

        if (isset($_POST["email"])) {
            $tipo_usuario = isset($_POST["tipo_usuario"]) ? $_POST["tipo_usuario"] : "";
            $email = isset($_POST["email"]) ? $_POST["email"] : "";
            $contrasena = isset($_POST["contrasena"]) ? $_POST["contrasena"] : "";
            $id_usuario = isset($_POST["id_usuario"]) ? $_POST["id_usuario"] : "";

            //Creamos un usuario
            $Login_Usuario = new Login_Usuario($this->adapter);
            $Login_Usuario->setTipo_usuario($tipo_usuario);
            $Login_Usuario->setEmail($email);
            $Login_Usuario->setContrasena($contrasena);
            $Login_Usuario->setId_usuario($id_usuario);

            $modify = $Login_Usuario->modify();

            $this->redirect("login_usuario", "admin");
        }

        $this->view("login_usuario/modificar", array());
    }

    public function eliminar() {

        $this->validateSession(array("Super Usuario"));

        if (isset($_GET["id_usuario"])) {
            $id_usuario = (int) $_GET["id_usuario"];

            $Login_Usuario = new Login_Usuario($this->adapter);
            $Login_Usuario->deleteById("id_usuario", $id_usuario);
        }
        $this->redirect("login_usuario", "admin");
    }

    public function Actualizar() {

        $this->validateSession(array("Super Usuario"));

        if (isset($_GET["id_usuario"])) {
            $id_usuario = (int) $_GET["id_usuario"];
            //  $id_categoria = 4;

            $Login_Usuario = new Login_Usuario($this->adapter);

            $login = $Login_Usuario->getById("id_usuario", $id_usuario);

            $this->view("login_usuario/modificar", array("login" => $login));
        }
    }

    public function Consultar() {

        $this->validateSession(array("Super Usuario"));


        if (isset($_GET["id_usuario"])) {
            $id_usuario = (int) $_GET["id_usuario"];
            // $id_usuario = 1;

            $Login_Usuario = new Login_Usuario($this->adapter);

            $login = $Login_Usuario->getById("id_usuario", $id_usuario);

            $this->view("Login_Usuario/view", array("login" => $login));
        }
    }

    public function login() {
        if (isset($_POST["email"]) && $_POST["contrasena"]) {
            $email = isset($_POST["email"]) ? trim($_POST["email"]) : "";
            $contrasena = isset($_POST["contrasena"]) ? trim($_POST["contrasena"]) : "";
            $tipo_Usuario = isset($_POST["tipo_usuario"]) ? trim($_POST["tipo_usuario"]) : "";

            if ($email == "" || $contrasena == "") {
                $this->view("login_usuario/login", array(
                    "errores" => "El Usuario o la contraseña no pueden estar vacios"
                ));
            }

//            $option = ['cost' => 12, 'salt' => 'This is the ADSI project salt'];
//            $contrasena=(password_hash($contrasea, PASSWORD_BCRYPT, $option));

            if ($tipo_Usuario == "SuperUsuario") {
                //Creamos un usuario
                $SuperUsuario = new SuperUsuario($this->adapter);
                $SuperUsuario->setEmail($email);
                $SuperUsuario->setContrasena($contrasena);
                $SuperUsuario->setTipo_User("Super Usuario");
                if ($SuperUsuario->validarLogin()) {
                    $this->view("Superusuario/admin");
                } else {
                    $this->view("login_usuario/login", array(
                        "errores" => "El Usuario o las contraseñas son incorrectos"
                    ));
                }
            } else if ($tipo_Usuario == "UsuarioEmpresa") {
                $UsuarioEmpresa = new Usuario_Empresa($this->adapter);
                $UsuarioEmpresa->setEmail($email);
                $UsuarioEmpresa->setContrasenna($contrasena);
                if ($UsuarioEmpresa->validarLogin()) {
                    $this->view("usuarioempresa/admin");
                } else {
                    $this->view("login_usuario/login", array(
                        "errores" => "El Usuario o las contraseñas son incorrectos"
                    ));
                }
            } else if ($tipo_Usuario == "UsuarioPromocion") {
                $User_Promo = new Usuario_Promo($this->adapter);
                $User_Promo->setEmail($email);

                $User_Promo->setContrasena($contrasena);
                if ($User_Promo->validarLogin()) {
                    $this->view("usuariopromocion/admin");
                } else {
                    $this->view("login_usuario/login", array(
                        "errores" => "El Usuario o las contraseñas son incorrectos"
                    ));
                }
            }
        } else {
            $this->view("login_usuario/login");
        }
    }

    public function logout() {
        //Destruir todas las sesiones
        session_destroy();
        $this->redirect("login_usuario", "Login");
    }

    public function error($code = 0) {
        $codeMessagge = (isset($_GET['msg']) ? $_GET['msg'] : $code );

        $message = "";

        switch ($message) {
            case 1:
                $message = "No esta autorizado para acceder";
                break;
            case 2:
                $message = "La accion que intenta cargar no existe";
                break;
            case 3:
                $message = "Error desconocido";
                break;
        }

        $this->view("login_usuario/error", array(
            "message" => $message
        ));
    }

}

?>