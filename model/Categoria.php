<?php

class Categoria extends EntidadBase {

    private $id_categoria;
    private $nombre;
    private $descripcion;

    public function __construct($adapter) {
        $table = "categoria";
        parent::__construct($table, $adapter);
    }
    
    public function getId_Categoria() {
        return $this->id_categoria;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function setId_Categoria($id_categoria) {
        $this->id_categoria = $id_categoria;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function save(){
    $query = "INSERT INTO categoria (nombre,descripcion)
                VALUES('" . $this->nombre . "',
                       '" . $this->descripcion . "');";
        $save = $this->db()->query($query);
         if(!$save && DEBUG)
         {
             echo "Error en base de datos" .$this->db()->error;
         }
        //$this->db()->error;
        return $save;
    }


    public function modify(){

       
       $query = "UPDATE categoria SET nombre='$this->nombre', descripcion='$this->descripcion' "
               . "WHERE id_categoria ='$this->id_categoria'";
       
        $modify = $this-> db()->query($query);

         if(!$modify && DEBUG)
         {
             echo "Error en base de datos" .$this->db()->error;
         }

               //$this->db()->error;
          return $modify;

    }


     public function consultar(){

       
       $query = "SELECT * FROM categoria";
       
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