<?php 

class Sesion extends Controlador{
    private $Sesions;
    public function __construct()
    {
        $this->Sesions= $this->modelo('Sesion_m');
    }
    public function Login()
    {
        $this->vista('Login');
    }

    public function index()
    {
        $this->vista('Login');
    }
    public function validar()
    {  
        if(empty($_SESSION['dni'])){
           print_r($this->Sesions->validar());
           header("location:".RUTA_URL."Sesion/Perfil");
        }
        else
        {
            $this->vista('Perfil');
        }     
    }

    public function Perfil()
    {   
        if(!empty($_SESSION['dni'])){
            $data = $this->Sesions->Perfil();
            $this->vista('Perfil', $data);
        }
        else{
            header("location:".RUTA_URL."Sesion/Login");
        }

    }

    public function Actualiza()
    {

        if(!empty($_SESSION['dni'])){
            $data = $this->Sesions->Actualiza();
            $data = $this->Sesions->Perfil();
            $this->vista('Perfil', $data);
        }
        else{
            $this->vista('Login');
        }
    }

    public function myItems()
    {
        
        if(!empty($_SESSION['dni'])){
            
            $data = $this->Sesions->Perfil();
            $data1= $this->Sesions->TodasCasas();
            $this->vista('myItems', $data, $data1);
        }
        else{
            $this->vista('Login');
        }
    }

    public function close()
    {
        
        session_destroy();
        header("location:".RUTA_URL."Sesion/Login");

    }

}       