<?php
class inicio_m{
    private $db;
    public function __construct()
    {
        $this->db= new Base ;
    }
    public function obtenerInm()
    {
        $this->db->query("
        SELECT  *  FROM  inmueble");
        return $this->db->registros();
    }
    public function obtenerUsr()
    {
        $this->db->query("
        SELECT  *  FROM  usuario");
        return $this->db->registros();
    }
    public function obtenerGal()
    {
        $this->db->query("
        SELECT  *  FROM  galeria");
        return $this->db->registros();
    }
    public function obtenerSer()
    {
        $this->db->query("
        SELECT  *  FROM  servicios");
        return $this->db->registros();
    }

    public function obtenerHab()
    {
        $this->db->query("
        SELECT  *  FROM  habitaciones");
        return $this->db->registros();
    }
}