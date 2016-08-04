<?php

class UsuarioPromocion_Publicacion extends EntidadBase {

    private $Id_UserPromo;
    private $Id_Publicaciones;
    private $Fecha_Accion;
    private $Comentario;

    public function __construct($adapter) {
        $table = "productos";
        parent::__construct($table, $adapter);
    }

    public function getId_UserPromo() {
        return $this->Id_UserPromo;
    }

    public function getId_Publicaciones() {
        return $this->Id_Publicaciones;
    }

    public function getFecha_Accion() {
        return $this->Fecha_Accion;
    }

    public function getComentario() {
        return $this->Comentario;
    }

    public function setId_UserPromo($Id_UserPromo) {
        $this->Id_UserPromo = $Id_UserPromo;
    }

    public function setId_Publicaciones($Id_Publicaciones) {
        $this->Id_Publicaciones = $Id_Publicaciones;
    }

    public function setFecha_Accion($Fecha_Accion) {
        $this->Fecha_Accion = $Fecha_Accion;
    }

    public function setComentario($Comentario) {
        $this->Comentario = $Comentario;
    }
    
    public function save(){
    $query = "INSERT INTO usuariopromocion_publicaciones (id_usuPromocion,id_publicaciones,fecha_accion, comentario)
                VALUES(
                       '" . $this->Id_Super . "',
                       '" . $this->Id_Publicacion . "',
                       '" . $this->Fecha_Accion . "',
                       '" . $this->Comentario . "');";
        $save = $this->db()->query($query);

         if(!$modify && DEBUG)
         {
             echo "Error en base de datos" .$this->db()->error;
         }
        //$this->db()->error;
        return $save;
    }
    
    
    public function modify(){

       
       $query = "UPDATE usuariopromocion_publicaciones SET id_usuPromocion='$this->Id_UserPromo', id_publicaciones='$this->Id_Publicacion', fecha_accion='$this->Fecha_Accion', fecha_accion='$this->Comentario' 
       WHERE id_usuPromocion ='$this->Id_UserPromo'";
       
         $modify = $this-> db()->query($query);

         if(!$modify && DEBUG)
         {
             echo "Error en base de datos" .$this->db()->error;
         }

               //$this->db()->error;
          return $modify;

    }
    
         public function consultar(){

       
       $query = "SELECT * FROM usuariopromocion_publicaciones";
       
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