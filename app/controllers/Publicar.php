<?php 
Class Publicar extends Controlador {
    
    private $Publicars;
    protected $data ;
    public function __construct()
    {
        
        $this->Publicars= $this->modelo('Publicar_m');
        
        if(!empty($_SESSION['dni'])){
            $this->data = $this->Publicars->Perfil();
        }

    }
    public function index()
    {

        if(!empty($_SESSION['dni'])){
            $this->vista('Publicar', $this->data);
        }
        else{
            $this->vista('Login');
        }
    }

    public function location()
    {
        if(!empty($this->data->direccion) || !empty($this->data->ciudad) || !empty($this->data->estado)){
            $aux = $this->data->direccion.", ".$this->data->ciudad." , ".$this->data->estado ;
            echo $aux;
        }
        else {
            echo  "puno"; // corregir -  autocentrado de mapa
        }
    }

    function publicar_nuevo()
    {
        $this->Publicars->ingresar();
        //$this->vista('Publicar', $this->data);
        header('location:'.RUTA_URL);
    }
}