<?php

class View {
    public $model = null;
    public $object = null;
    public function dispath(){
        if($_SERVER['REQUEST_METHOD'] === 'GET'){
            $this->get();
        }
        if($_SERVER["REQUEST_METHOD"] === 'POST'){
            $this->post();
        }
    }

   public function get(){
        if(!$this->object){
            echo(json_encode($this->model->getALL()));
            $this->model->disconnect();
            
            
        }else{
            echo (json_encode($this->model->getDetail($this->object)));
            $this->model->disconnect();
            
        }
        //print_r(json_encode($this->model->getALL()));
    }
    public function post(){
        
            $dato = json_decode(file_get_contents("php://input"));
            
            $this->model->create($dato);
            

      
    }
     public function __construct()
    {
        $this->dispath();
    }

}


?>