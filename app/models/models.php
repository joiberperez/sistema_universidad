<?php

    class Model {

        private $conn;
        private $table;

        public function getTable($tabla){
            $this->table = $tabla;
        }

        function __construct()
        {
            //echo "constructor de model";
            $this->conexion();
        }


        function conexion(){
            $this->conn = new PDO('mysql:host=localhost;dbname=api','root','');

        }
        
        public function getAll(){
           $consulta =  $this->conn->query('SELECT * FROM '.$this->table);
           
           $consulta = $consulta->fetchAll(PDO::FETCH_ASSOC);
           return $consulta;
        }
        public function getDetail($id){
           $consulta =  $this->conn->query('SELECT * FROM '.$this->table . ' WHERE id='.$id);
           $consulta = $consulta->fetch(PDO::FETCH_ASSOC);
           return $consulta;
        }
        public function disconnect(){
            $this->conn = null;
        }
        function create($datos){
            
           $this->conn->query("INSERT INTO ".$this->table . ' ' . $this->consultaPost($datos));
           echo json_encode(["error" => "se ha creado el usuario con exito"]);

        }
        function consultaPost($datos){
            $fields = "(";
            $dataFields = " VALUES (";
            foreach($datos as $key => $valor){
                $fields.= $key. ',';
                $dataFields .= '"'. $valor . '"' . ',';
            }
            $fields[-1] = ")";
            $dataFields[-1] = ")"; 
            return $fields . $dataFields;
        }

    }


?>