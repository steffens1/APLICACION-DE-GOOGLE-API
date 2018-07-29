<?php
    class Registrar_m{
        private $db;
        public function __construct()
        {
            $this->db= new Base ;
        }
        public function registrars()
            {
            $dni =$_POST['dni'];
            $nombre = $_POST['Nombre'];
            $apellido = $_POST['Apellido'];
            $Correo = $_POST['Correo'];
            $contrasena = $_POST['Contrasena'];

            $sql = "
                INSERT  INTO  usuario(dni , nombre, apellido , correo , contrasena) 
                values ('".$dni."','".$nombre."','".$apellido."'  ,  '".$Correo."' ,'".$contrasena."' );
            ";
            $this->db->query($sql);
            $this->db->execute();
        }
    }
    