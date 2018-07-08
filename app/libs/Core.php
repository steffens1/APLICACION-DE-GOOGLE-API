 <?php 

    /*
        Mapear la url  ingresada en el 
        navegador
        1- controlador
        2- metodo
        3- parametro
    */

    class Core{

        protected $controladorActual='Home';
        protected $metodoActual='index';
        protected $parametros=[];
        
        public function __construct(){

            $url = $this->getUrl();
            //buscar en controladores si el controlador existe
            if(file_exists('../app/controllers/'.ucwords($url[0]).'.php')){
                //si existe se setea como controlador 
                $this->controladorActual=ucwords($url[0]);
                //unset  indece 
                unset($url[0]);
            }
            
            //requirir el nuevo 
            require_once '../app/controllers/'.$this->controladorActual.'.php';
            $this->controladorActual = new $this->controladorActual;

            if(isset($url[1])){
                if(method_exists($this->controladorActual,$url[1])){
                    //asignamos metodo actual
                    $this->metodoActual = $url[1];
                    unset($url[1]);
                }
            }

             //echo $this->metodoActual;
            //obtener parametros
             $this->parametros=$url? array_values($url):[];    

             //llamar calback con parametro array 
             call_user_func_array([$this->controladorActual, $this->metodoActual], $this->parametros);
        
            }



        public function getUrl(){
            if(isset($_GET['url'])){
                $url=rtrim($_GET['url'],'/');
                $url=filter_var($url, FILTER_SANITIZE_URL);
                $url=explode('/', $url);
                return $url;
            }
        }

}