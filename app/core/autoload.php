<?php 



spl_autoload_register(function($class){
    include './api/core/apps.php';
    $ruta = "";
    $test_app = false;
    foreach($apps as $app){
        
        
        
        
       if(strstr(strtolower($class), $app)){
            
            if(strstr($class,'Model')){
                
                $ruta = ROOT . "/$app/" .  'models' . '.php';
               // echo $ruta;
                
            }else if(strstr($class,'View')){

                $ruta =  ROOT . "/$app/" .  'views' . '.php';
                
            }else{
                echo "no se ha encontrado la ruta";
                exit;
            }
            
            
            $test_app = true;
            break;

        }
    }
    if(!$test_app){
        switch($class){
            case strstr($class,'Model'):
                $ruta = ROOT .  '/models/models' .  '.php';
                break;
            case strstr($class,'Router'):
                $ruta = ROOT .  '/core/router' .  '.php';
                break;
            case strstr($class,'View'):
                $ruta = ROOT .  '/views/views' .  '.php';
                break;


        }
        

    }
    include $ruta;

   
})


?>