<?php

class SuperUsuario_Publicacion extends EntidadBase {

    private $Id_Super;
    private $Id_Publicacion;
    private $Fecha_Accion;

    public function __construct($adapter) {
        $table = "superusuario_publicaciones";
        parent::__construct($table, $adapter);
    }

    public function getId_Super() {
        return $this->Id_Super;
    }

    public function getId_Publicacion() {
        return $this->Id_Publicacion;
    }

    public function getFecha_Accion() {
        return $this->Fecha_Accion;
    }

    public function setId_Super($Id_Super) {
        $this->Id_Super = $Id_Super;
    }

    public function setId_Publicacion($Id_Publicacion) {
        $this->Id_Publicacion = $Id_Publicacion;
    }

    public function setFecha_Accion($Fecha_Accion) {
        $this->Fecha_Accion = $Fecha_Accion;
    }
    
    
    public function save(){
    $query = "INSERT INTO superusuario_publicaciones (id_super,id_publicaciones,fecha_accion)
                VALUES(
                       '" . $this->Id_Super . "',
                       '" . $this->Id_Publicacion . "',
                       '" . $this->Fecha_Accion . "');";
        $save = $this->db()->query($query);

         if(!$modify && DEBUG)
         {
             echo "Error en base de datos" .$this->db()->error;
         }
        //$this->db()->error;
        return $save;
    }
    
    
    public function modify(){

       
       $query = "UPDATE superusuario_publicaciones SET id_super='$this->Id_Super', id_publicaciones='$this->Id_Publicacion', fecha_accion='$this->Fecha_Accion' 
       WHERE id_super ='$this->Id_Super'";
       
         $modify = $this-> db()->query($query);

         if(!$modify && DEBUG)
         {
             echo "Error en base de datos" .$this->db()->error;
         }

               //$this->db()->error;
          return $modify;

    }
    
         public function consultar(){

       
       $query = "SELECT * FROM superusuario_publicaciones";
       
         $consultar = $this-> db()->query($query);

          if(!$modify && DEBUG)
         {
             echo "Error en base de datos" .$this->db()->error;
         }
               //$this->db()->error;
          return $consultar;
    }

    
}
?>