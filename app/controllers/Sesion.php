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

    public function validar()
    { 
        session_start();
        if(!$_SESSION['dni']){
            if($this->Sesions->validar()){
                $_SESSION['dni'] = $this->Sesions->GetUser();
            }
        }     
    }

    public function Perfil()
    {
        $this->validar();
        if($_SESSION['dni']){
            $data = $this->Sesions->Perfil();
            $this->vista('Perfil', $data);
        }
        else{
            $this->vista('Login');
        }   
    }
    public function Actualiza()
    {
        $this->validar();
        if($_SESSION['dni']){
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
        session_start();
        if($_SESSION['dni']){
            
            $data = $this->Sesions->Perfil();
            $data1= $this->Sesions->TodasCasas();
            $this->vista('myItems', $data, $data1);
        }
        else{
            $this->vista('Login');
        }
    }

}       