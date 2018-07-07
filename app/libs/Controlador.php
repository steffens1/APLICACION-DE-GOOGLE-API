<?php
    class Controlador{

        public function modelo($modelo)
        {
            require_once '../app/models/'.$modelo.'.php';
            return new $modelo;
        }

        public function vista($vista , $dato=[])
        {
            if(file_exists('../app/views/paginas/'.$vista.'.php')){
                require_once '../app/views/paginas/'.$vista.'.php';
                //return new $vista;
            }
            else{
                die("PAGINA NO EXISTE");
            }
        }

    }
