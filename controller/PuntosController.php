<?php

class PuntosController extends ControladorBase {

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
        $puntos = new Puntos($this->adapter);

        //Conseguimos todos los usuarios
        $allpuntos = $puntos->getAll();


        //Cargamos la vista index y le pasamos valores

        $this->view("puntos/admin", array(
            "allpuntos" => $allpuntos
        ));
    }

    public function create() {

        $this->validateSession(array("Usuario Promocion", "Super Usuario"));

        if (isset($_POST["tipo_puntuacion"])) {
            $tipo_puntuacion = isset($_POST["tipo_puntuacion"]) ? $_POST["tipo_puntuacion"] : "";
            $fecha = date("Y-m-d H:i:s");
            $cantidad = isset($_POST["cantidad"]) ? $_POST["cantidad"] : "";
            $id_usupromocion = isset($_POST["id_usuPromocion"]) ? $_POST["id_usuPromocion"] : "";
            //Creamos un usuario
            $puntos = new Puntos($this->adapter);
            $puntos->setTipo_Puntuacion($tipo_puntuacion);
            $puntos->setFecha($fecha);
            $puntos->setCantidad($cantidad);
            $puntos->setid_usuPromocion($id_usupromocion);
            $save = $puntos->save();
            //print_r($save);
            $this->redirect("puntos", "admin");
        } else {
            $User_Promo = new Usuario_Promo($this->adapter);
            $allUser_Promo = $User_Promo->getAll("id_usuPromocion");

            $this->view("puntos/create", array(
                "allUser_Promo" => $allUser_Promo
            ));
        }
    }

    public function modificarPuntos() {

        $this->validateSession(array("Usuario Promocion", "Super Usuario"));

        if (isset($_POST["id_puntos"])) {

            $tipo_puntuacion = isset($_POST["tipo_puntuacion"]) ? $_POST["tipo_puntuacion"] : "";
            //$fecha = isset($_POST["fecha"]) ? $_POST["fecha"] : "";
            $cantidad = isset($_POST["cantidad"]) ? $_POST["cantidad"] : "";
            //$id_usupromocion = isset($_POST["id_usupromocion"])?$_POST["id_usupromocion"]:"";       
            $id_puntos = isset($_POST["id_puntos"]) ? $_POST["id_puntos"] : "";
            //Creamos un usuario
            $puntos = new Puntos($this->adapter);
            $puntos->setTipo_Puntuacion($tipo_puntuacion);
            //$puntos->setFecha($fecha);
            $puntos->setCantidad($cantidad);
            //$puntos->setid_usuPromocion($id_usupromocion);
            $puntos->setId_Puntos($id_puntos);
            $modify = $puntos->modify();
            $this->redirect("puntos", "admin");
        }

        $this->view("puntos/modificar", array());
    }

    public function Actualizar() {

        $this->validateSession(array("Usuario Promocion", "Super Usuario"));

        if (isset($_GET["id_puntos"])) {
            $id_puntos = (int) $_GET["id_puntos"];
            $puntos = new Puntos($this->adapter);
            $punto = $puntos->getById("id_puntos", $id_puntos);
            $this->view("puntos/modificar", array("punto" => $punto));
        }
    }

    public function Consultar() {

        $this->validateSession(array("Usuario Promocion", "Super Usuario"));

        if (isset($_GET["id_puntos"])) {
            $id_puntos = (int) $_GET["id_puntos"];
            $id_usuPromocion = (int) $_GET["id_usuPromocion"];


            $puntos = new Puntos($this->adapter);
            $getById = $puntos->getById("id_puntos", $id_puntos);

            $User_Promo = new Usuario_Promo($this->adapter);
            $usupromo = $User_Promo->getById("id_usuPromocion", $id_usuPromocion);

            $this->view("puntos/view", array(
                "getById" => $getById,
                "usupromo" => $usupromo
            ));
        }
    }

    public function eliminar() {

        $this->validateSession(array("Usuario Promocion", "Super Usuario"));

        if (isset($_GET["id_puntos"])) {
            $id_puntos = (int) $_GET["id_puntos"];

            $puntos = new Puntos($this->adapter);
            $puntos->deleteById("id_puntos", $id_puntos);
        }
        $this->redirect("puntos", "admin");
    }

}

?>