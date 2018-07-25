<?php

    class Item_m {
        private $db;
        private $user ;
        public function __construct()
        {
            $this->db=new Base;
        }
        public function obtenerInm($id)
        {
            $this->db->query("
            SELECT  *  FROM  inmueble as a
            WHERE  a.id ='".$id."'");
            $resul =  $this->db->registro();
            $this->user=$resul->usuario_dni;
            return $resul;
        }

        public function obtenerUsr()
        {
            $this->db->query("
            SELECT  *  FROM  usuario as a
            WHERE a.dni ='".$this->user."'");
            return $this->db->registro();
        }

        public function obtenerGal($id)
        {
            $this->db->query("
            SELECT  *  FROM  galeria as a
            WHERE a.inmueble_id='".$id."'");
            return $this->db->registros();
        }
        public function obtenerSer($id) 
        {
            $this->db->query("
            SELECT  *  FROM  servicios as a 
            WHERE a.inmueble_id='".$id."'");
            return $this->db->registros();
        }   
    
        public function obtenerHab($id)
        {
            $this->db->query("
            SELECT  *  FROM  habitaciones as a
            WHERE a.inmueble_id='".$id."'");
            return $this->db->registros();
        }

    }