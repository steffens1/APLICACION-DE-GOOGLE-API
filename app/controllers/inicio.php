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
     public function consulta()
     {
        $data =[];

        $inmueble =  $this->inicios->obtenerInm(); 
        $usuario =  $this->inicios->obtenerUsr();
        $galeria =  $this->inicios->obtenerGal(); 
        $habitaciones =  $this->inicios->obtenerHab(); 
        $Servicios =  $this->inicios->obtenerSer(); 
        
        
        foreach($inmueble as $in){
            $auxGal;
            $auxSer;
            $auxHab;

            foreach($galeria as $gal ){
                if($in->id == $gal->inmueble_id){
                    $auxGal [] = $gal->path;
                    //break;
                }
            }
            
            foreach($Servicios as $ser ){
                if($in->id == $ser->inmueble_id){
                    $auxSer [] = array (
                           'nombre ' => $ser->nombre, 
                           'descripcion'=>$ser->descripcion
                    );
                    //break;
                }                
            }   
            foreach($habitaciones as $hab){
                if($in->id == $hab->inmueble_id){
                    $auxHab [] = array (
                           'nombre'=> $hab->nombre,
                           'cantidad' => $hab->cantidad
                    );

                    //break;
                }   
            }

            $data[] = array (
                'id' => $in->id, 
                'categoria'=> $in->category, 
                'titulo' => $in->nombre, 
                'direccion' => $in->location, 
                'lat'=>$in->lat, 
                'lng'=>$in->lng, 
                'url'=> '', 
                'type' => $in->type, 
                'type_icon'=>$in->type_icon, 
                'galeria' => $auxGal, 
                'features'=> $auxSer, 
                'habitaciones'=>$auxHab,
                'color'=>'#0000ff',
                'featured'=> '1',
                'fecha_creada'=> $in->fech_ofert, 
                'precio' => $in->precio,
                'fecha_construida'=>$in->fech_ofert,
                'rating'=>$in->rainting,
                'descripcion'=>$in->descripcion 
            ) ;

            if(!isset($auxHab)) {unset($auxHab);}
            if(!isset($auxSer)) {unset($auxSer);}
            if(isset($auxGal)) {unset($auxGal);}
        
        }   

        echo json_encode($data, true);
    
    }
}   