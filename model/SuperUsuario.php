<?php

class SuperUsuario extends EntidadBase {

    private $id_super;
    private $nombre;
    private $email;
    private $Tipo_User;
    private $id_usuario;
    private $contrasena;
    private $foto;

    public function __construct($adapter) {
        $table = "superusuario";
        parent::__construct($table, $adapter);
    }

    public function getId_super() {
        return $this->id_super;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getId_usuario() {
        return $this->id_usuario;
    }

    public function getContrasena() {
        return $this->contrasena;
    }

    public function getFoto() {
        return $this->foto;
    }

    function getTipo_User() {
        return $this->Tipo_User;
    }

    function setTipo_User($Tipo_User) {
        $this->Tipo_User = $Tipo_User;
    }

    public function setId_super($id_super) {
        $this->id_super = $id_super;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setId_usuario($id_usuario) {
        $this->id_usuario = $id_usuario;
    }

    public function setContrasena($contrasena) {
        $this->contrasena = $contrasena;
    }

    public function setFoto($foto) {
        $this->foto = $foto;
    }

    public function save() {
        echo $query = "INSERT INTO superusuario (nombre,email,id_usuario,contrasena,foto)
                VALUES(
                       '" . $this->nombre . "',
                       '" . $this->email . "',
                       '" . $this->id_usuario . "',
                       '" . $this->contrasena . "',
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
        echo $query = "UPDATE superusuario SET nombre='$this->nombre', email='$this->email', id_usuario='$this->id_usuario', contrasena='$this->contrasena', foto='$this->foto' WHERE id_super='$this->id_super'";

        $modify = $this->db()->query($query);
        //$newId = $this->db()->select_id;
        if (!$modify && DEBUG) {
            echo "Error en base de datos" . $this->db()->error;
        }

        //$this->db()->error;
        return $newId;
    }

    public function consultar() {


        $query = "SELECT * FROM superusuario";

        $consultar = $this->db()->query($query);

        if (!$consultar && DEBUG) {
            echo "Error en base de datos" . $this->db()->error;
        }
        //$this->db()->error;
        return $consultar;
    }

    public function validarLogin() {
        $resulSet = null;
        $query = $this->db()->query("SELECT * FROM loginusuario INNER JOIN superusuario on loginusuario.id_usuario = superusuario.id_usuario WHERE loginusuario.email='$this->email' AND loginusuario.contrasena ='$this->contrasena'");

        if ($row = $query->fetch_object()) {
            /* Se Compara las contraseñas ingresadas por el usuario en el login
             * Con la que se encuentra almacenada en la Base de Datos
             */
            $option = ['cost' => 12, 'salt' => 'This is the ADSI project salt'];
            $contrasena = (password_hash($this->contrasena, PASSWORD_BCRYPT, $option));

            if (($contrasena == $row->contrasena)) {
                $_SESSION["tipo_usuario"] = $row->tipo_usuario;
                $_SESSION["nombre"] = $row->nombre;
                $_SESSION["timeout"] = time();
                session_regenerate_id();
                return true;
            }
        }
        return false;
    }

}

?>
