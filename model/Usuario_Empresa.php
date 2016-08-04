<?php

class Usuario_Empresa extends EntidadBase {

    private $id_usu_empresa;
    private $nombre;
    private $ciudad;
    private $email;
    private $direccion;
    private $id_usuario;
    private $contrasenna;
    private $foto;

    public function __construct($adapter) {
        $table = "usuarioempresa";
        parent::__construct($table, $adapter);
    }

    public function getId_Usu_Empresa() {
        return $this->id_usu_empresa;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getCiudad() {
        return $this->ciudad;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getDireccion() {
        return $this->direccion;
    }

    public function getId_Usuario() {
        return $this->id_usuario;
    }

    function getContrasenna() {
        return $this->contrasenna;
    }

    public function getFoto() {
        return $this->foto;
    }

    public function setId_Usu_Empresa($id_usu_empresa) {
        $this->id_usu_empresa = $id_usu_empresa;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setCiudad($ciudad) {
        $this->ciudad = $ciudad;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    public function setId_Usuario($id_usuario) {
        $this->id_usuario = $id_usuario;
    }

    function setContrasenna($contrasenna) {
        $this->contrasenna = $contrasenna;
    }

    public function setFoto($foto) {
        $this->foto = $foto;
    }

    public function save() {
        $query = "INSERT INTO usuarioempresa (nombre,ciudad,email,direccion,id_usuario,contrasena,foto)
                VALUES(
                       '" . $this->nombre . "',
                       '" . $this->ciudad . "',
                       '" . $this->email . "',
                       '" . $this->direccion . "',
                       '" . $this->id_usuario . "',
                       '" . $this->contrasenna . "',
                       '" . $this->foto . "');";
        $save = $this->db()->query($query);
        $newId = $this->db()->insert_id;

        if (!$save && DEBUG) {
            echo "Error en base de datos" . $this->db()->error;
        }
        //$this->db()->error;
        return $newId;
    }

    public function modify() {


        $query = "UPDATE usuarioempresa SET nombre='$this->nombre', ciudad='$this->ciudad', email='$this->email', direccion='$this->direccion', id_usuario='$this->id_usuario', contrasena='$this->contrasenna', foto='$this->foto' 
       WHERE id_usuEmpresa ='$this->id_usu_empresa'";

        $modify = $this->db()->query($query);
        $newId = $this->db()->insert_id;

        if (!$modify && DEBUG) {
            echo "Error en base de datos" . $this->db()->error;
        }

        //$this->db()->error;
        return $newId;
    }

    public function consultar() {


        $query = "SELECT * FROM usuarioempresa";

        $consultar = $this->db()->query($query);

        if (!$consultar && DEBUG) {
            echo "Error en base de datos" . $this->db()->error;
        }
        //$this->db()->error;
        return $consultar;
    }

    public function validarLogin() {
        $resulSet = null;
        $query = $this->db()->query("SELECT * FROM loginusuario INNER JOIN usuarioempresa on loginusuario.id_usuario = usuarioempresa.id_usuario WHERE loginusuario.email='$this->email' AND loginusuario.contrasena ='$this->contrasenna' ");
//        echo "SELECT * FROM loginusuario INNER JOIN usuarioempresa on loginusuario.id_usuario = usuarioempresa.id_usuario WHERE loginusuario.email='$this->email' AND loginusuario.contrasena ='$this->contrasenna' ";
        if ($row = $query->fetch_object()) {
            /* Se Compara las contraseñas ingresadas por el usuario en el login
             * Con la que se encuentra almacenada en la Base de Datos
             */
            $option = ['cost' => 12, 'salt' => 'This is the ADSI project salt'];
            $contrasena = (password_hash($this->contrasenna, PASSWORD_BCRYPT, $option));
            
            if ($contrasena == $row->contrasena) {
                $_SESSION["tipo_usuario"] = $row->tipo_usuario;
                $_SESSION["nombre"] = $row->nombre;
                $_SESSION["timeout"] = time();
                session_regenerate_id();
                return true;
            }
        }
    }

}

?>