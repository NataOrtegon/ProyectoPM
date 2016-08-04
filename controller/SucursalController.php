<?php

class SucursalController extends ControladorBase {

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
        $sucursal = new Sucursal($this->adapter);

        //Conseguimos todos los usuarios
        $allsucursal = $sucursal->getAll();


        //Cargamos la vista index y le pasamos valores

        $this->view("sucursal/admin", array(
            "allsucursal" => $allsucursal
        ));
    }

    public function create() {

        $this->validateSession(array("Usuario Empresa", "Super Usuario"));

        if (isset($_POST["direccion"])) {
            $direccion = isset($_POST["direccion"]) ? $_POST["direccion"] : "";
            $telefono = isset($_POST["telefono"]) ? $_POST["telefono"] : "";
            $id_usu_empresa = isset($_POST["id_usuEmpresa"]) ? $_POST["id_usuEmpresa"] : "";
            //Creamos un usuario
            $sucursal = new Sucursal($this->adapter);
            $sucursal->setDireccion($direccion);
            $sucursal->setTelefono($telefono);
            $sucursal->setId_Usu_Empresa($id_usu_empresa);
            $save = $sucursal->save();
            $this->redirect("sucursal", "admin");
        } else {
            $UsuarioEmpresa = new Usuario_Empresa($this->adapter);
            $allUsuarioEmpresa = $UsuarioEmpresa->getAll("id_usuEmpresa");

            $this->view("sucursal/create", array(
                "allUsuarioEmpresa" => $allUsuarioEmpresa
            ));
        }
    }

    public function modificarSucursal() {

        $this->validateSession(array("Usuario Empresa", "Super Usuario"));

        if (isset($_POST["id_sucursal"])) {

            $direccion = isset($_POST["direccion"]) ? $_POST["direccion"] : "";
            $telefono = isset($_POST["telefono"]) ? $_POST["telefono"] : "";
            $id_usu_empresa = isset($_POST["id_usuempresa"]) ? $_POST["id_usuempresa"] : "";
            $id_sucursal = isset($_POST["id_sucursal"]) ? $_POST["id_sucursal"] : "";
            //Creamos un usuario
            $sucursal = new Sucursal($this->adapter);
            $sucursal->setDireccion($direccion);
            $sucursal->setTelefono($telefono);
            $sucursal->setId_Usu_Empresa($id_usu_empresa);
            $sucursal->setId_Sucursal($id_sucursal);
            $modify = $sucursal->modify();
            $this->redirect("sucursal", "admin");
        }

        $this->view("sucursal/modificar", array());
    }

    public function Actualizar() {

        $this->validateSession(array("Usuario Empresa", "Super Usuario"));

        if (isset($_GET["id_sucursal"])) {
            $id_sucursal = (int) $_GET["id_sucursal"];
            $sucursal = new Sucursal($this->adapter);
            $sucur = $sucursal->getById("id_sucursal", $id_sucursal);
//            print_r($sucur);
            $this->view("sucursal/modificar", array("sucur" => $sucur));
        }
    }

    public function Consultar() {

        $this->validateSession(array("Usuario Empresa", "Super Usuario"));

        if (isset($_GET["id_sucursal"])) {
            $id_sucursal = (int) $_GET["id_sucursal"];
            $id_usuEmpresa = (int) $_GET["id_usuEmpresa"];

            $sucursal = new Sucursal($this->adapter);
            $getById = $sucursal->getById("id_sucursal", $id_sucursal);

            $usuEmpresa = new Usuario_Empresa($this->adapter);
            $usuE = $usuEmpresa->getById("id_usuEmpresa", $id_usuEmpresa);

            $this->view("sucursal/view", array(
                "getById" => $getById,
                "usuE" => $usuE
            ));
        }
    }

    public function eliminar() {

        $this->validateSession(array("Usuario Empresa", "Super Usuario"));

        if (isset($_GET["id_sucursal"])) {
            $id_sucursal = (int) $_GET["id_sucursal"];

            $sucursal = new Sucursal($this->adapter);
            $sucursal->deleteById("id_sucursal", $id_sucursal);
        }
        $this->redirect("sucursal", "admin");
    }

    //}        
}

?>