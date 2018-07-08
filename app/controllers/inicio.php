<?php 
class inicio extends Controlador{
 
    private $inicios;
     public function __construct()
     {
         $this->inicios = $this->modelo('inicio_m');
     }
     public function index()
     {
         $this->vista('inicio');    
     }
     
}