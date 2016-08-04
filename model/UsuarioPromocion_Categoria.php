<?php

class UsuarioPromocion_Categoria extends EntidadBase {

    private $Id_UserPromo;
    private $Id_Categoria;

    public function __construct($adapter) {
        $table = "usuariopromocion_categoria";
        parent::__construct($table, $adapter);
    }

    public function getId_UserPromo() {
        return $this->Id_UserPromo;
    }

    public function getId_Categoria() {
        return $this->Id_Categoria;
    }

    public function setId_UserPromo($Id_UserPromo) {
        $this->Id_UserPromo = $Id_UserPromo;
    }

    public function setId_Categoria($Id_Categoria) {
        $this->Id_Categoria = $Id_Categoria;
    }
    
    
    public function save(){
    $query = "INSERT INTO usuariopromocion_categoria (id_usuPromocion,id_categoria)
                VALUES(
                       '" . $this->Id_UserPromo . "',
                       '" . $this->Id_Categoria . "');";
        $save = $this->db()->query($query);

         if(!$modify && DEBUG)
         {
             echo "Error en base de datos" .$this->db()->error;
         }
        //$this->db()->error;
        return $save;
    }
    
    
    public function modify(){

       
       $query = "UPDATE usuariopromocion_categoria SET id_usuPromocion='$this->Id_UserPromo', id_categoria='$this->id_categoria'
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

       
       $query = "SELECT * FROM usuariopromocion_categoria";
       
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