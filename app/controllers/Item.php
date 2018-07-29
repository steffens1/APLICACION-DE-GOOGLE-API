<?php 

    class Item extends Controlador {
        private $Items;
        public function __construct()
        {
            $this->Items=$this->modelo('Item_m');
        }

        public function detalle($id)
        { 
            if(!empty($id)){ 
            $data =[];
            $this->Items->asing($id);
            $inmueble =  $this->Items->obtenerInm(); 
            $usuario =  $this->Items->obtenerUsr();
            $galeria =  $this->Items->obtenerGal(); 
            $habitacion =  $this->Items->obtenerHab(); 
            $Servicios =  $this->Items->obtenerSer(); 
            $inmueble=$inmueble;
            $usuario=$usuario;
            $auxGal =  $galeria;
            $auxSer = $Servicios;
            $auxHab= $habitacion; 
            foreach($galeria as $gal ){
                    $auxGal [] = array(
                        $gal->path,
                        $gal->id
                );
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
                'url'=>'Item/detelle',
                'featured'=> '0',
                'fecha_creada'=> $inmueble->fech_ofert, 
                'precio' => $inmueble->precio,
                'fecha_construida'=>$inmueble->fech_ofert,
                'rating'=>$inmueble->rainting,
                'descripcion'=>$inmueble->descripcion 
            );
            $this->vista('Item' , $galeria , $usuario, $inmueble, $Servicios);
        }
        }

        public function ajaxDetalle($id)
        {   
            if(!empty($id))  
            {            
            $data =[];
            $this->Items->asing($id);
            $inmueble =  $this->Items->obtenerInm(); 
            $usuario =  $this->Items->obtenerUsr();
            $galeria =  $this->Items->obtenerGal(); 
            $habitacion =  $this->Items->obtenerHab(); 
            $Servicios =  $this->Items->obtenerSer(); 
            $inmueble=$inmueble;
            $usuario=$usuario;
            $auxGal =  $galeria;
            $auxSer = $Servicios;
            $auxHab= $habitacion; 
            foreach($galeria as $gal ){

                    $auxGal [] =  array($gal->path);
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
                'url'=> 'Item/detalle/', 
                'type' => $inmueble->type, 
                'type_icon'=>$inmueble->type_icon, 
                'galeria' => $auxGal, 
                'features'=> $auxSer, 
                'habitaciones'=>$auxHab,
                'color'=>'#0000ff',
                'featured'=> '0',
                'fecha_creada'=> $inmueble->fech_ofert, 
                'precio' => $inmueble->precio,
                'fecha_construida'=>$inmueble->fech_ofert,
                'rating'=>$inmueble->rainting,
                'descripcion'=>$inmueble->descripcion 
            );
            echo  json_encode($data);
        }}

        public function modal($id)
        { 
            if(!empty($id)){ 
            $data =[];
            $this->Items->asing($id);
            $inmueble =  $this->Items->obtenerInm(); 
            $usuario =  $this->Items->obtenerUsr();
            $galeria =  $this->Items->obtenerGal(); 
            $habitacion =  $this->Items->obtenerHab(); 
            $Servicios =  $this->Items->obtenerSer(); 
            $inmueble=$inmueble;
            $usuario=$usuario;
            $auxGal =  $galeria;
            $auxSer = $Servicios;
            $auxHab= $habitacion; 
            foreach($galeria as $gal ){
                    $auxGal [] = array(
                        $gal->path,
                        $gal->id
                );
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
                'url'=>'Item/detelle',
                'featured'=> '0',
                'fecha_creada'=> $inmueble->fech_ofert, 
                'precio' => $inmueble->precio,
                'fecha_construida'=>$inmueble->fech_ofert,
                'rating'=>$inmueble->rainting,
                'descripcion'=>$inmueble->descripcion 
            );
            $this->vista('modal' , $galeria , $habitacion, $inmueble, $Servicios);
        }
     }
}