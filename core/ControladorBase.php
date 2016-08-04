<?php

//Comienza_Session

session_start();

class ControladorBase {

    protected $layout = "/cms_layout";

    public function __construct() {
        require_once 'Conectar.php';
        require_once 'EntidadBase.php';
        require_once 'ModeloBase.php';

        //Incluir todos los modelos
        foreach (glob("model/*.php") as $file) {
            require_once $file;
        }

        /* Validar el tiempo de inactividad del usuario no supere un tiempo definido en la variable global
         *  TIEMPO_INACTIVIDAD
         */

        if (isset($_SESSION["timeout"])) {
            //Calcular tiempo de vida de la sesion
            $tiempoSesion = time() - $_SESSION["timeout"];
            if ($tiempoSesion > (TIEMPO_INACTIVIDAD * 60)) {
                session_destroy();
                $this->redirect("login_usuario", "logout");
            } else {
                //Establece nuevamente el tiempo de inicio de sesion
                $_SESSION["timeout"] = time();
            }
        }
    }

    /*
     * Metodo para validar que existia un usuario logeando u que este autorizado para accede a la accion
     * en caso contrario se redirigie a la vista login
     * Parametros:
     * TiposUsuarios = array con los tipos de usuarios permitidos para acceder a la accion  
     */

    public function validateSession($tipoUsuario = array()) {
        if (!isset($_SESSION['tipo_usuario'])) {
            $this->redirect("login_usuario", "login");
        } else {
            if (!in_array($_SESSION['tipo_usuario'], $tipoUsuario)) {
                $this->redirect("login_usuario", "error&msg=1");
            }
        }
    }

    //Plugins y funcionalidades

    public function view($vista, $datos = NULL) {
        if ($datos) {
            foreach ($datos as $id_assoc => $valor) {
                ${$id_assoc} = $valor;
            }
        }
        require_once 'core/AyudaVistas.php';
        $helper = new AyudaVistas();


        //require_once 'view/' . $vista . 'View.php';
//       echo "$vista";

        require_once 'view/layouts' . $this->layout . '.php';
    }

    public function redirect($controlador = CONTROLADOR_DEFECTO, $accion = ACCION_DEFECTO) {
        header("Location:index.php?controller=" . $controlador . "&action=" . $accion);
    }

    //Métodos para los controladores
}

?>