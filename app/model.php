<?php

class Model {
        //se crean las variables contenedoras de los datos para realizar la conexion a la base de datos
        private $dsn = 'mysql:host=localhost;dbname=chapulin';
        private $username = 'jr';
        private $password = 'jr12345'; 
        public function conexion (){
            
                $conexion = new PDO($this->dsn,$this->username,$this->password);
                return $conexion;
            }


        
    }

class Login extends Model{
    private $con = '';
    


    function __construct(){
        //cuando se instacie va a hacer la conexion
        $this->con = $this->conexion();

    }
    //hace la seleccion del usuario
    public function selectUser($usuario){
        
        $query = $this->con->query("SELECT * FROM seguridad where usuario='$usuario'");
        return $query;
    }
}


?>