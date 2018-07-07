<?php
    class Home extends Controlador{
        
        private $home;
        public function __construct(){
            
            $this->home= $this->modelo('Home_m');
        }

        public function index()
        {
            $this->vista('Home');
        }
    }
    