<?php

class producto extends EntidadBase {

    private $id_producto;
    private $nombre;
    private $descripcion;
    private $precio_actual;
    private $foto;
    private $id_usuEmpresa;
    private $id_categoria;


    public function __construct($adapter) {
        $table = "producto";
        parent::__construct($table, $adapter);
    }

    public function getId_producto() {
        return $this->id_producto;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function getPrecio_Actual() {
        return $this->precio_actual;
    }

    public function getFoto() {
        return $this->foto;
    }

    public function getid_usuEmpresa() {
        return $this->id_usuEmpresa;
    }

    public function getId_Categoria() {
        return $this->id_categoria;
    }

    public function setId_producto($id_producto) {
        $this->id_producto = $id_producto;
    }


    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function setPrecio_Actual($precio_actual) {
        $this->precio_actual = $precio_actual;
    }

    public function setFoto($foto) {
        $this->foto = $foto;
    }

    public function setid_usuEmpresa($id_usuEmpresa) {
        $this->id_usuEmpresa = $id_usuEmpresa;
    }

    public function setId_Categoria($id_categoria) {
        $this->id_categoria = $id_categoria;
    }
    
    public function save(){
    $query = "INSERT INTO producto (nombre,descripcion,precio_actual,foto,id_usuEmpresa,id_categoria)
            VALUES('" . $this->nombre . "',
                    '" . $this->descripcion . "',
                    '" . $this->precio_actual . "',
                    '" . $this->foto . "',
                    '" . $this->id_usuEmpresa . "',
                    '" . $this->id_categoria . "');";
            $save = $this->db()->query($query);
         if(!$save && DEBUG)
         {
             echo "Error en base de datos " .$this->db()->error;
         }
        //$this->db()->error;
        return $save;
    }


    public function modify(){

       
       $query = "UPDATE producto SET nombre='$this->nombre', descripcion='$this->descripcion', precio_actual='$this->precio_actual', foto='$this->foto', nombre='$this->nombre', id_categoria='$this->id_categoria' WHERE id_producto ='$this->id_producto'";
       
         $modify = $this-> db()->query($query);

         if(!$modify && DEBUG)
         {
             echo "Error en base de datos" .$this->db()->error;
         }

               //$this->db()->error;
          return $modify;

    }


    public function consultar(){

       
       $query = "SELECT * FROM producto";
       
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