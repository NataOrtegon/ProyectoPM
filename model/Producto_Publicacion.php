<?php

class Producto_Publicacion extends EntidadBase {

    private $id_Producto;
    private $Id_Publicacion;
    private $Precio_Publicacion;
    private $Cantidad;

    public function __construct($adapter) {
        $table = "producto_publicaciones";
        parent::__construct($table, $adapter);
    }
    
    public function getId_Producto() {
        return $this->id_Producto;
    }

    public function getId_Publicacion() {
        return $this->Id_Publicacion;
    }

    public function getPrecio_Publicacion() {
        return $this->Precio_Publicacion;
    }

    public function getCantidad() {
        return $this->Cantidad;
    }

    public function setId_Producto($id_Producto) {
        $this->id_Producto = $id_Producto;
    }

    public function setId_Publicacion($Id_Publicacion) {
        $this->Id_Publicacion = $Id_Publicacion;
    }

    public function setPrecio_Publicacion($Precio_Publicacion) {
        $this->Precio_Publicacion = $Precio_Publicacion;
    }

    public function setCantidad($Cantidad) {
        $this->Cantidad = $Cantidad;
    }
    
    public function save(){
    $query = "INSERT INTO producto_publicaciones (id_producto,id_publicaciones,precio_publicacion,cantidad)
                VALUES(
                       '" . $this->id_Producto . "',
                       '" . $this->Id_Publicacion . "',
                       '" . $this->Precio_Publicacion . "',
                       '" . $this->Cantidad . "');";
        $save = $this->db()->query($query);

         if(!$modify && DEBUG)
         {
             echo "Error en base de datos" .$this->db()->error;
         }
        //$this->db()->error;
        return $save;
    }
    
    
    public function modify(){

       
       $query = "UPDATE producto_publicaciones SET id_producto='$this->id_Producto', id_publicaciones='$this->Id_Publicacion', precio_publicacion='$this->Precio_Publicacion', cantidad='$this->Cantidad' 
       WHERE id_producto ='$this->id_Producto'";
       
         $modify = $this-> db()->query($query);

         if(!$modify && DEBUG)
         {
             echo "Error en base de datos" .$this->db()->error;
         }

               //$this->db()->error;
          return $modify;

    }
    
         public function consultar(){

       
       $query = "SELECT * FROM producto_publicaciones";
       
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