<?php 
class Publicar_m {
    private $db;
    public function __construct()
    {
       $this->db  = new Base();
    }
    
    public function Perfil()
    {
        $dni=$_SESSION['dni'];
        $sql= "SELECT * FROM usuario WHERE usuario.dni ='".$dni."';";
        $this->db->query($sql);
        return  $this->db->registro();
    }
    
    public function ingresar()
    {
        
        $dni=$_SESSION['dni'];
        $nombre=$_POST['titulo'];
        $precio=$_POST['precio'];
        $categoria=$_POST['categoria'];
        $fecha =$_POST['fecha'];
        $estado=$_POST['estado'];
        $ciudad=$_POST['ciudad'];
        $direccion=$_POST['direccion'];
        $latitud=$_POST['latitudx'] ;
        $longitud=$_POST['longitudx'];
        $servicios=$_POST['features'];  
        $descripcion=$_POST['descripcion'];
        //foreach($_FILES['fotos']['tmp_name'] as $file=>$tmp_name){
            $ruta =  ROOT."/public/img/items/";
            $nombreImg ="image".date("dHis").".".pathinfo($_FILES['fotos']['name'], PATHINFO_EXTENSION);
            $guardar = $ruta.$nombreImg;
            move_uploaded_file($_FILES['fotos']['tmp_name'],$guardar);
            $galeria = "img/items/".$nombreImg;
            unset($_FILES['fotos']);
        //}

    

        
        $sql="INSERT INTO inmueble(usuario_dni , nombre , location , lat , lng ,precio , category, descripcion, fech_construct) 
            VALUES ('".$dni."', '".$nombre."' , '".$direccion."','".$latitud."','".$longitud."','".$precio."','".$categoria."','".$descripcion."' , '".$fecha."')"; 
        $this->db->query($sql);
        $this->db->execute();


        $sql = "SELECT  id FROM  inmueble  ORDER by id desc;";
        $this->db->query($sql);
        $ok = $this->db->registros();
        $id_in=$ok[0]->id;


        foreach($servicios as $aux ){
            $sql= "INSERT INTO servicios(nombre, inmueble_id ) 
                VALUES('".$aux."', '".$id_in."') ;";
            $this->db->query($sql);
            $this->db->execute();
        }

        $sql= "INSERT INTO galeria(path, inmueble_id ) 
            VALUES('".$galeria."', '".$id_in."') ;";
        $this->db->query($sql);
        $this->db->execute(); 
    }
}