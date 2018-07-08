<?php 
class inicio extends Controlador{
 
    private $inicios;
     public function __construnct()
     {
         $this->inicios = $this->modelo('inicio_m');
     }
     public function index()
     {
         $this->vista('inicio');    
     }
     
}