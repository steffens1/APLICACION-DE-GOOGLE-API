<?php 
Class Publicar extends Controlador {
    
    private $Publicars;
    protected $data ;
    public function __construct()
    {
        
        $this->Publicars= $this->modelo('Publicar_m');
        session_start();
        if($_SESSION['dni']){
            $this->data = $this->Publicars->Perfil();
        }

    }
    public function index()
    {

        if($_SESSION['dni']){
            $this->vista('Publicar', $this->data);
        }
        else{
            $this->vista('Login');
        }
    }

    public function location()
    {
        $aux = $this->data->direccion.", ".$this->data->ciudad." , ".$this->data->estado ;
        print_r($aux);
        //echo  json_encode($aux, true); 
        echo "hola";
    }

    function publicar_nuevo()
    {
        $this->Publicars->ingresar();
        $this->vista('Publicar', $this->data);
    }
}