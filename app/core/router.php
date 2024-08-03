<?php


class Router {
        private $routes = [
            ['path'=>'/crud_php/','views'=>'ViewClient'],
            ['path'=>'/crud_php/usuarios/','views'=>'ViewUser'],
            ['path'=>'/crud_php/usuarios/@int/','views'=>'ViewUserDetail'],
            ['path'=>'/project/cliente/editar/@str/','views'=>'UsuarioController','method'=>'detalle']
        ];

       function run(){

            $url = $_SERVER['REQUEST_URI']; 
            
            
            foreach ($this->routes as $key => $value) {
               $ruta_registrada = preg_quote($value['path'], '/');

                // Reemplaza los segmentos variables con patrones de expresión regular apropiados
                if(strpos($ruta_registrada,"@int") != false){
                    $ruta_registrada = preg_replace('/@int/', '(\d+)', $ruta_registrada);
                    
                }else if(strpos($ruta_registrada,"@str") != false){
                    $ruta_registrada = preg_replace('/@str/', '(.*)', $ruta_registrada);

                }
               // print_r($ruta_registrada_expresion);
                
                // Crea la expresión regular completa para comparar las rutas
               $expresion_regular = '/^' . $ruta_registrada . '$/';


                if (preg_match($expresion_regular, $url,$matches)) {
                    $controller = $value['views'];
                    if(!isset($matches[1])){
                        $controller = new $controller();
                        
                    }else{
                        $controller = new $controller($matches[1]);
                        

                    }

                    
                    exit;
                }
                
                
                
            }
            echo "esa ruta no existe";
       }

    }

?>