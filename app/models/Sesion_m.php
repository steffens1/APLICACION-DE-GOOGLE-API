<?php

    class Sesion_m{
        private $db;
        private $var ;
        public function __construct()
        {
            $this->db=new Base;
        }
        public function validar()
        {
            $email =  $_POST['form-sign-in-email'];
            $contraseña = $_POST['form-sign-in-password'];
            $this->db->query("SELECT dni ,  correo  , contraseña FROM usuario  as  a WHERE a.correo ='".$email."' AND a.contraseña='".$contraseña."';");
            $result  = $this->db->registro();

           if($email == $result->correo &&  $contraseña == $result->contraseña){
                $this->var=$result->dni;
                return true ;
            }
            else return false;
        }
        public function GetUser()
        {
            if($this->validar()){
                return $this->var;
            }
            else return 0;
        }

        public function Perfil()
        {
            $dni=$_SESSION['dni'];
            $sql= "SELECT * FROM usuario WHERE usuario.dni ='".$dni."';";
            $this->db->query($sql);
            return  $this->db->registro();
        }

        public function Actualiza()
        {

            $dni=$_SESSION['dni'];
            $nombre = $_POST['nombre'];
            $correo = $_POST['correo'];
            $telefono=$_POST['telefono'];
            $estado= $_POST['estado'];
            $ciudad= $_POST['ciudad'];
            $direccion=$_POST['direccion'];
            $acerca_yo=$_POST['acerca_yo'];
            $sql = "UPDATE usuario SET nombre = '".$nombre."', correo= '" .$correo ."' ,telefono ='".$telefono."',  estado = '".$estado."', ciudad = '".$ciudad."',  direccion = '".$direccion."', acerca_yo = '".$acerca_yo."' WHERE usuario.dni ='".$dni."' ;";
            $this->db->query($sql);
            $this->db->execute();
        
        }

        public function TodasCasas()
        {
            $dni=$_SESSION['dni'];
            $sql="SELECT  *
            FROM  inmueble as a
            INNER JOIN galeria as c  
            on a.id = c.inmueble_id
            WHERE a.usuario_dni='".$dni."'
            GROUP by a.id ;";

            $this->db->query($sql);
            return $this->db->registros();
        }

    }

