<?php

    class Item_m {
        private $db;
        private $user;
        private $id;
        public function __construct()
        {  
            $this->db=new Base;
        }
        public function asing($id)
        {
            $this->id=$id;
        }
        public function obtenerInm()
        {
            $this->db->query("
            SELECT  *  FROM  inmueble as a
            WHERE  a.id ='$this->id'");
            $resul =  $this->db->registros();
            $this->user=$resul[0];
            $this->user=$this->user->usuario_dni;
            return $resul[0];  
        }

        public function obtenerUsr()
        {

            $this->db->query("
            SELECT  *  FROM  usuario as a
            WHERE a.dni ='$this->user'");
            return $this->db->registro();
        }
        
        public function obtenerGal()
        {
            $this->db->query("
            SELECT  *  FROM  galeria as a
            WHERE a.inmueble_id='$this->id'");

            return $this->db->registros();
        }

        public function obtenerSer() 
        {
            $this->db->query("
            SELECT  *  FROM  servicios as a 
            WHERE a.inmueble_id='$this->id'");
            return $this->db->registros();
        }   
    
        public function obtenerHab()
        {
            $this->db->query("
            SELECT  *  FROM  habitaciones as a
            WHERE a.inmueble_id='$this->id'");
            return $this->db->registros();
        }

    }