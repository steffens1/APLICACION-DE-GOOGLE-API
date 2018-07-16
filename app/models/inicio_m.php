<?php
class inicio_m{
    private $db;
    public function __construct()
    {
        $this->db= new Base ;
    }
    public function obtenerTodo()
    {
        $this->db->query("
        SELECT  *
        FROM  inmueble as a
        INNER JOIN galeria as c  
        on a.id = c.inmueble_id
        GROUP by a.id");
        return $this->db->registros();
    
    }

}