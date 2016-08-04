<?php

class Publicaciones extends EntidadBase {

    private $id_publicacion;
    private $estado;
    private $fecha_creacion;
    private $fecha_inicio;
    private $fecha_final;
    private $descripcion;
    private $nombre;
    private $fecha_registro;
    private $id_usu_empresa;
    private $foto;

    public function __construct($adapter) {
        $table = "publicaciones";
        parent::__construct($table, $adapter);
    }

    public function getId_Publicacion() {
        return $this->id_publicacion;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function getFecha_Creacion() {
        return $this->fecha_creacion;
    }

    public function getFecha_Inicio() {
        return $this->fecha_inicio;
    }

    public function getFecha_Final() {
        return $this->fecha_final;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getFecha_Registro() {
        return $this->fecha_registro;
    }

    public function getId_Usu_Empresa() {
        return $this->id_usu_empresa;
    }

    public function getFoto() {
        return $this->foto;
    }

    public function setId_Publicacion($id_publicacion) {
        $this->id_publicacion = $id_publicacion;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }

    public function setFecha_Creacion($fecha_creacion) {
        $this->fecha_creacion = $fecha_creacion;
    }

    public function setFecha_Inicio($fecha_inicio) {
        $this->fecha_inicio = $fecha_inicio;
    }

    public function setFecha_Final($fecha_final) {
        $this->fecha_final = $fecha_final;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setFecha_Registro($fecha_registro) {
        $this->fecha_registro = $fecha_registro;
    }

    public function setId_Usu_Empresa($id_usuEmpresa) {
        $this->id_usuEmpresa = $id_usuEmpresa;
    }

    public function setFoto($foto) {
        $this->foto = $foto;
    }

    public function save() {
        $query = "INSERT INTO publicaciones (estado,fecha_creacion,fecha_inicio,fecha_final,descripcion,nombre,fecha_registro,id_usuEmpresa,foto)
                VALUES(
                       '" . $this->estado . "',
                       '" . $this->fecha_creacion . "',
                       '" . $this->fecha_inicio . "',
                       '" . $this->fecha_final . "',
                       '" . $this->descripcion . "',
                       '" . $this->nombre . "',
                       '" . $this->fecha_registro . "',
                       '" . $this->id_usuEmpresa . "',
                       '" . $this->foto . "');";
        //  echo $query;
        $save = $this->db()->query($query);

        if (!$save && DEBUG) {
            echo "Error en base de datos" . $this->db()->error;
        }
        //$this->db()->error;
        return $save;
    }

    public function modify() {


        $query = "UPDATE publicaciones SET  fecha_inicio='$this->fecha_inicio', fecha_final='$this->fecha_final', descripcion='$this->descripcion', nombre='$this->nombre', foto='$this->foto' 
       WHERE id_publicaciones ='$this->id_publicacion'";

        $modify = $this->db()->query($query);

        if (!$modify && DEBUG) {
            echo "Error en base de datos" . $this->db()->error;
        }

        //$this->db()->error;
        return $modify;
    }

    public function consultar() {


        $query = "SELECT * FROM publicaciones";

        $consultar = $this->db()->query($query);

        if (!$modify && DEBUG) {
            echo "Error en base de datos" . $this->db()->error;
        }
        //$this->db()->error;
        return $consultar;
    }

}

?>