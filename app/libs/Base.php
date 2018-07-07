<?php
    //conectar  ala base de datos y ejecutar consultas
    class Base {
        private $host =DB_HOST;
        private $user =DB_USER;
        private $password=DB_PASSWORD;
        private $name=DB_NOMBRE;

        private $dbh;//database handler 
        private $stmt; // statement
        private $error; 

        public function __construct(){
            //configurar conexion 
            $dsn = 'mysql:host='.$this->host.';dbname='.$this->name;
            $opciones =array(
                PDO::ATTR_PERSISTENT => true , 
                PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION
            );

            //crea una instancia de PDO 
            try{
                $this->dbh= new PDO($dsn,$this->user, $this->password,
                $opciones);
                $this->dbh->exec('set names utf8');
            }
            catch(PDOException $e){
                $this->error = $e->getMessage();
                echo $this->error;
            }
        }


        //preparamos la consulta
        public function query($sql){
            $this->stmt = $this->dbh->prepare($sql);
        }

        //vinculamos la consulta     
        public function bind($param, $valor , $tipo = null){
            if(is_null($tipo)){
                switch(true){
                    case is_int($valor):
                        $tipo=PDO::PARAM_INT;
                    break;
                    case is_bool($valor):
                        $tipo=PDO::PARAM_BOOL;
                    break;
                    case is_null($valor):
                        $tipo=PDO::PARAM_NULL;
                    break;
                    default:
                        $tipo=PDO::PARAM_STR;
                    break;
                }
            }

            $this->stmt->bindValue($param, $valor, $tipo);
        }

        //ejecuta la consulta 
        public function execute(){
           return $this->stmt->execute();
        }
        //obtener los registros 
        public function registros()
        {
            $this->execute();
            return $this->stmt->fetchAll(PDO::FETCH_OBJ);
        }

        //obtener registro
        public function registro()
        {
            $this->execute();
            return $this->stmt->fetch(PDO::FETCH_OBJ);
        }

        //Obtener cantidad de filas con metodo rowcount
        public function rowCount()
        {
            return $this->stmt->rowCount();
        }

    }