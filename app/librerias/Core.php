<?php 
/*Mapear la url ingresada en el navegador
    1-Controlador
    2-metodo
    3-parametro
*/
    class Core{
            protected $ControladorActual = 'Principal';
            protected $MetodoActual = 'index';
            protected $parametros = [];
            //constructor
            public function __construct(){
             //  print_r($this->getUrl());  
               //buscar existe el controllador
               $url = $this->getUrl();
             
               var_dump($url[0]);
               if(file_exists('../app/controllers/' .ucwords($url[0].'.php'))){                      
                //se setea como controlador
                    $this->ControladorActual = ucwords($url[0]);
                
                    //unset indi
                    unset($url[0]);                                        
               }
               //requerir el controlador
               require_once '../app/controllers/'.$this->ControladorActual.'.php';
               $this->ControladorActual = new $this->ControladorActual;
               //chekear la segunda parte de la url que seria el metodo
              if(isset($url[1])){
                if(method_exists($this->ControladorActual, $url[1])){
                    //chekeamos el metodo
                    $this->MetodoActual = $url[1];
                   //var_dump($this->MetodoActual);
                    //unset indice
                    unset($url[1]);
                }              
              }
              $this->parametros = $url ? array_values($url) : [];
              call_user_func_array([$this->ControladorActual, $this->MetodoActual], $this->parametros);
              //var_dump($this->MetodoActual);
            }
            public function getUrl(){
               // echo $_GET['url'];
               if(isset($_GET['url'])){
                        $url = rtrim($_GET['url'],'/');
                        $url = filter_var($url, FILTER_SANITIZE_URL);
                        $url = explode('/', $url);
                //        var_dump($url);
                        return $url;
               }
            }



            
    }