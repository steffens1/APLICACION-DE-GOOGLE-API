<?php 

    class Item extends Controlador {
        private $Items;
        public function __construct()
        {
            $this->Items=$this->modelo('Item_m');
        }

        public function index()
        {
            $this->vista('Item');

        }

        public function detalle($id)
        {   
            $data =[];

            $inmueble =  $this->Items->obtenerInm($id); 
            $usuario =  $this->Items->obtenerUsr();
            $galeria =  $this->Items->obtenerGal($id); 
            $habitacion =  $this->Items->obtenerHab($id); 
            $Servicios =  $this->Items->obtenerSer($id); 
          
            $inmueble=$inmueble;
            $usuario=$usuario;
            $auxGal =  $galeria;
            $auxSer = $Servicios;
            $auxHab= $habitacion; 

            foreach($galeria as $gal ){
                    $auxGal [] = $gal->path;
                    //break;
            }
            foreach($Servicios as $ser ){

                    $auxSer [] = array (
                        'nombre ' => $ser->nombre, 
                        'descripcion'=>$ser->descripcion
                    );
                    //break;         
            }   
            foreach($habitacion as $hab){
                        $auxHab [] = array (
                            'nombre'=> $hab->nombre,
                            'cantidad' => $hab->cantidad
                        );
                        //break;
                }



            $data[] = array (
                'id' => $inmueble->id, 
                'categoria'=> $inmueble->category, 
                'titulo' => $inmueble->nombre, 
                'direccion' => $inmueble->location, 
                'lat'=>$inmueble->lat, 
                'lng'=>$inmueble->lng, 
                'url'=> '', 
                'type' => $inmueble->type, 
                'type_icon'=>$inmueble->type_icon, 
                'galeria' => $auxGal, 
                'features'=> $auxSer, 
                'habitaciones'=>$auxHab,
                'color'=>'#0000ff',
                'url'=>'Item/detalle/',
                'featured'=> '0',
                'fecha_creada'=> $inmueble->fech_ofert, 
                'precio' => $inmueble->precio,
                'fecha_construida'=>$inmueble->fech_ofert,
                'rating'=>$inmueble->rainting,
                'descripcion'=>$inmueble->descripcion 
            );
            if(!isset($auxHab)) {unset($auxHab);}
            if(!isset($auxSer)) {unset($auxSer);}
            if(isset($auxGal)) {unset($auxGal);}
            $this->vista('Item' , $galeria , $usuario, $inmueble, $Servicios);
        }



        public function ajaxDetalle($id)
        {   
            $data =[];

            $inmueble =  $this->Items->obtenerInm($id); 
            $galeria =  $this->Items->obtenerGal($id); 
            $habitacion =  $this->Items->obtenerHab($id); 
            $Servicios =  $this->Items->obtenerSer($id); 
          
            $inmueble=$inmueble;
            $auxGal =  $galeria;
            $auxSer = $Servicios;
            $auxHab= $habitacion; 

            foreach($galeria as $gal ){
                    $auxGal [] = $gal->path;
                    //break;
            }
            foreach($Servicios as $ser ){

                    $auxSer [] = array (
                        'nombre ' => $ser->nombre, 
                        'descripcion'=>$ser->descripcion
                    );
                    //break;         
            }   
            foreach($habitacion as $hab){
                        $auxHab [] = array (
                            'nombre'=> $hab->nombre,
                            'cantidad' => $hab->cantidad
                        );
                        //break;
                }

            $data[] = array (
                'id' => $inmueble->id, 
                'categoria'=> $inmueble->category, 
                'titulo' => $inmueble->nombre, 
                'direccion' => $inmueble->location, 
                'lat'=>$inmueble->lat, 
                'lng'=>$inmueble->lng, 
                'url'=> '', 
                'type' => $inmueble->type, 
                'type_icon'=>$inmueble->type_icon, 
                'galeria' => $auxGal, 
                'features'=> $auxSer, 
                'habitaciones'=>$auxHab,
                'color'=>'#0000ff',
                'url'=>'Item/detalle/',
                'featured'=> '0',
                'fecha_creada'=> $inmueble->fech_ofert, 
                'precio' => $inmueble->precio,
                'fecha_construida'=>$inmueble->fech_ofert,
                'rating'=>$inmueble->rainting,
                'descripcion'=>$inmueble->descripcion 
            );
            if(!isset($auxHab)) {unset($auxHab);}
            if(!isset($auxSer)) {unset($auxSer);}
            if(isset($auxGal)) {unset($auxGal);}


            echo  json_encode($data, true);
        }
    }