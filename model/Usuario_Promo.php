<?php

class Usuario_Promo extends EntidadBase {

    private $id_userpromo;
    private $nombre;
    private $fecha_nacimiento;
    private $genero;
    private $ciudad;
    private $email;
    private $id_usuario;
    private $contrasena;
    private $foto;

    public function __construct($adapter) {
        $table = "usuariopromocion";
        parent::__construct($table, $adapter);
    }

    public function getId_UserPromo() {
        return $this->id_userpromo;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getFecha_Nacimiento() {
        return $this->fecha_nacimiento;
    }

    public function getGenero() {
        return $this->genero;
    }

    public function getCiudad() {
        return $this->ciudad;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getId_Usuario() {
        return $this->id_usuario;
    }

    public function getContrasena() {
        return $this->contrasena;
    }

    public function getFoto() {
        return $this->foto;
    }

    public function setId_UserPromo($id_userpromo) {
        $this->id_userpromo = $id_userpromo;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setFecha_Nacimiento($fecha_nacimiento) {
        $this->fecha_nacimiento = $fecha_nacimiento;
    }

    public function setGenero($genero) {
        $this->genero = $genero;
    }

    public function setCiudad($ciudad) {
        $this->ciudad = $ciudad;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setId_Usuario($id_usuario) {
        $this->id_usuario = $id_usuario;
    }

    public function setContrasena($contrasena) {
        $this->contrasena = $contrasena;
    }

    public function setFoto($foto) {
        $this->foto = $foto;
    }

    public function save() {
        $query = "INSERT INTO usuariopromocion (nombre,fecha_nacimiento,genero,ciudad,email,id_usuario,contrasena,foto)
                VALUES(
                       '" . $this->nombre . "',
                       '" . $this->fecha_nacimiento . "',
                       '" . $this->genero . "',
                       '" . $this->ciudad . "',
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


        $query = "UPDATE usuariopromocion SET nombre='$this->nombre', fecha_nacimiento='$this->fecha_nacimiento', genero='$this->genero', ciudad='$this->ciudad', email='$this->email', id_usuario='$this->id_usuario', contrasena='$this->contrasena', foto='$this->foto' 
       WHERE id_usuPromocion ='$this->id_userpromo'";

        $modify = $this->db()->query($query);
        $newId = $this->db()->insert_id;

        if (!$modify && DEBUG) {
            echo "Error en base de datos" . $this->db()->error;
        }

        //$this->db()->error;
        return $newId;
    }

    public function consultar() {


        $query = "SELECT * FROM usuariopromocion";

        $consultar = $this->db()->query($query);

        if (!$consultar && DEBUG) {
            echo "Error en base de datos" . $this->db()->error;
        }
        //$this->db()->error;
        return $consultar;
    }

    public function validarLogin() {
        $resulSet = null;
        $query = $this->db()->query("SELECT * FROM loginusuario INNER JOIN usuariopromocion on loginusuario.id_usuario = usuariopromocion.id_usuario WHERE loginusuario.email='$this->email'");

        if ($row = $query->fetch_object()) {
            /* Se Compara las contraseñas ingresadas por el usuario en el login
             * Con la que se encuentra almacenada en la Base de Datos
             */
            $option = ['cost' => 12, 'salt' => 'This is the ADSI project salt'];
            $contrasena = (password_hash($this->contrasena, PASSWORD_BCRYPT, $option));

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