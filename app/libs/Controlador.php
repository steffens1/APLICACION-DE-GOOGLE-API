<?php
    class Controlador{

        public function modelo($modelo)
        {
            require_once '../app/models/'.$modelo.'.php';
            return new $modelo;
        }

        public function vista($vista , $dato=[], $dato1=[] , $dato2=[], $dato3=[] , $dato4=[])
        {
            if(file_exists('../app/views/paginas/'.$vista.'.php')){

                require RUTA_APP.'/views/inc/header.php';
                require_once '../app/views/paginas/'.$vista.'.php';
                require RUTA_APP.'/views/inc/footer.php';            
            }
            else{
                die("PAGINA NO EXISTE");
            }
        }
    }
