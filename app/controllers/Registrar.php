<?php 
        class Registrar extends Controlador{
            private $Registrars;
                public function __construct()
                {
                    $this->Registrars = $this->modelo('Registrar_m');
                }

                public function registrar()
                {   
                    $this->Registrars->Registrars();
                    header('location:'.RUTA_URL.'Sesion');
                }

                public function index(Type $var = null)
                {
                    $this->vista('Registrar');
                }
        }   