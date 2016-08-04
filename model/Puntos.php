<?php

class Puntos extends EntidadBase {

    private $id_puntos;
    private $tipo_puntuacion;
    private $fecha;
    private $cantidad;
    private $id_usupromocion;

    public function __construct($adapter) {
        $table = "puntos";
        parent::__construct($table, $adapter);
    }
    
    public function getId_Puntos() {
        return $this->id_puntos;
    }

    public function getTipo_Puntuacion() {
        return $this->tipo_puntuacion;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function getCantidad() {
        return $this->cantidad;
    }

    public function getid_usuPromocion() {
        return $this->id_usupromocion;
    }

    public function setId_Puntos($id_puntos) {
        $this->id_puntos = $id_puntos;
    }

    public function setTipo_Puntuacion($tipo_puntuacion) {
        $this->tipo_puntuacion = $tipo_puntuacion;
    }

    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    public function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }

    public function setid_usuPromocion($id_usuPromocion) {
        $this->id_usuPromocion = $id_usuPromocion;
    }
    
    public function save(){
    $query = "INSERT INTO puntos (tipo_puntuacion,fecha,cantidad,id_usuPromocion)
                VALUES(
                       '" . $this->tipo_puntuacion . "',
                       '" . $this->fecha . "',
                       '" . $this->cantidad . "',
                       '" . $this->id_usuPromocion . "');";
    
        $save = $this->db()->query($query);
        $newId = $this->db()->insert_id;
        
         if(!$save && DEBUG)
         {
             echo "Error en base de datos " .$this->db()->error;
         }
        //$this->db()->error;
        return $newId;
    }
    
    public function modify(){

       
       $query = "UPDATE puntos SET tipo_puntuacion='$this->tipo_puntuacion',  cantidad='$this->cantidad' 
       WHERE id_puntos ='$this->id_puntos'";
       
        $modify = $this-> db()->query($query);
        $newId = $this->db()->insert_id;
        
        echo $query;
        
         if(!$modify && DEBUG)
         {
             echo "Error en base de datos " .$this->db()->error;
         }

               //$this->db()->error;
          return $newId;
    }
    
    public function consultar(){

       
       $query = "SELECT * FROM puntos";
       
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