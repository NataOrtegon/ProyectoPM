<?php

class Sucursal extends EntidadBase {

    private $id_sucursal;
    private $direccion;
    private $telefono;
    private $id_usu_empresa;

    public function __construct($adapter) {
        $table = "sucursal";
        parent::__construct($table, $adapter);
    }

    public function getId_Sucursal() {
        return $this->id_sucursal;
    }

    public function getDireccion() {
        return $this->direccion;
    }

    public function getTelefono() {
        return $this->telefono;
    }

    public function getId_Usu_Empresa() {
        return $this->id_usu_empresa;
    }

    public function setId_Sucursal($id_sucursal) {
        $this->id_sucursal = $id_sucursal;
    }

    public function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    public function setId_Usu_Empresa($id_usu_empresa) {
        $this->id_usu_empresa = $id_usu_empresa;
    }
    
    public function save(){
    $query = "INSERT INTO sucursal (direccion,telefono,id_usuEmpresa)
                VALUES(
                       '" . $this->direccion . "',
                       '" . $this->telefono . "',
                       '" . $this->id_usu_empresa . "');";
        
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

       
       $query = "UPDATE sucursal SET direccion='$this->direccion', telefono='$this->telefono' 
       WHERE id_sucursal ='$this->id_sucursal'";
       
         $modify = $this-> db()->query($query);
        $newId = $this->db()->insert_id;

         if(!$modify && DEBUG)
         {
             echo "Error en base de datos" .$this->db()->error;
         }

               //$this->db()->error;
          return $newId;
    }
    
    public function consultar(){

       
       $query = "SELECT * FROM sucursal";
       
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