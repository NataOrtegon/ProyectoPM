<?php

class Login_Usuario extends EntidadBase {

    private $id_usuario;
    private $tipo_usuario;
    private $fecha_registro;
    private $estado;
    private $email;
    private $contrasena;

    public function __construct($adapter) {
        $table = "loginusuario";
        parent::__construct($table, $adapter);
    }
    
    public function getId_usuario() {
        return $this->id_usuario;
    }

    public function getTipo_usuario() {
        return $this->tipo_usuario;
    }

    public function getFecha_registro() {
        return $this->fecha_registro;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getContrasena() {
        return $this->contrasena;
    }

    public function setId_usuario($id_usuario) {
        $this->id_usuario = $id_usuario;
    }

    public function setTipo_usuario($tipo_usuario) {
        $this->tipo_usuario = $tipo_usuario;
    }

    public function setFecha_registro($fecha_registro) {
        $this->fecha_registro = $fecha_registro;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setContrasena($contrasena) {
        $this->contrasena = $contrasena;
    }

    public function save(){
    $query = "INSERT INTO loginusuario (tipo_usuario,email,contrasena,fecha_registro,estado)
                VALUES(
                       '" . $this->tipo_usuario . "',
                       '" . $this->email . "',
                       '" . $this->contrasena . "',
                       '" . $this->fecha_registro . "',
                       '" . $this->estado . "');";
        $save = $this->db()->query($query);
        $newId = $this->db()->insert_id;
         if(!$save && DEBUG)
         {
             echo "Error en base de datos" .$this->db()->error;
         }
        //$this->db()->error;
        return $newId;
    }


     public function modify(){

       
       $query = "UPDATE loginusuario SET tipo_usuario='$this->tipo_usuario', email='$this->email', contrasena='$this->contrasena', fecha_registro='$this->fecha_registro', estado='$this->estado' 
       WHERE id_usuario ='$this->id_usuario'";
       
         $modify = $this-> db()->query($query);
         $newId = $this->db()->insert_id;
         if(!$modify && DEBUG)
         {
             echo "Error en base de datos" .$this->db()->error;
         }

               $this->db()->error;
          return $newId;

    }


     public function consultar(){

       
       $query = "SELECT * FROM loginusuario";
       
         $consultar = $this-> db()->query($query);

          if(!$consultar && DEBUG)
         {
             echo "Error en base de datos" .$this->db()->error;
         }
               //$this->db()->error;
          return $consultar;
      }
      
}
?>