<?php
    class Home extends Controlador{
        
        private $homes;
        public function __construct(){
            
            $this->homes= $this->modelo('Home_m');
        }

        public function index()
        {
            $this->vista('Home', $datos);
            
        }
    }