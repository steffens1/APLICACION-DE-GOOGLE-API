<?php 
class Publicar_m {
    private $db;
    public function __construct()
    {
       $this->db  = new Base();
    }
    
    public function Perfil()
    {
        $dni=$_SESSION['dni'];
        $sql= "SELECT * FROM usuario WHERE usuario.dni ='".$dni."';";
        $this->db->query($sql);
        return  $this->db->registro();
    }

}