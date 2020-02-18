<?php 
class Controller{
    protected $respuesta; 
    protected $permiso;
    protected $url;
    public function __construct()
    {
    }
    public function imprimir($codigo)
    {
        if($codigo == 2300){
          $respuesta = 'felfewkmfewmkfewfwefwe';
        }
        return $respuesta;
    }

    public function treeview($controlador, $codigo)
    {
        if($controlador == $codigo){
            echo "menu-open";} 
    }
    public function nav_item( $controlador, $codigo)
    {
        if($controlador == $codigo){
             echo "active";} 
    }
    // gestion de rol
    public function getpermiso($permiso){
        $this->permiso = $permiso;
        return new $this->permiso;
    }
    //cargamos la gestion de un modelo
    public function modelo($modelo){
        require_once '../app/models/'. $modelo. '.php';
        //instacioamos los modelos
        return new $modelo();
    }
    
    //cargamos la vista
    public function vista($vista, $datos = []){
         if(file_exists('../app/views/'.$vista.'.php')){
            //cargamos la vista
            require_once '../app/views/'.$vista. '.php';
         }else{
            //cargamos la vista
         echo "no existe la vista";
        }              
    }
    public function script($public = []){   
        for($i=0; $i<count($public); $i++){
            if(file_exists('../public/'.$public[$i])){
                echo "<script src=".'../public/'.$public[$i]."></script>";
            }
            else{
                echo "<p style='float:right;color:red;'>"."hey wey no existe el archivo(s)  .$public[$i]"."</p><br>";    
            }
        }
    }
    public function link($public = []){          
        echo "<link  rel='stylesheet' href="."https:code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css>";
            
        for($i=0; $i<count($public); $i++){
            if(file_exists('../public/'.$public[$i])){                
                echo "<link  rel='stylesheet' href=".'../public/'.$public[$i].">";
            }
            else{
                echo "<p style='float:right;color:red;'>"."hey wey no existe el archivo(s)  .$public[$i]"."</p><br>";
    
            }
        }
        echo "<link  rel='stylesheet' href="."https:fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700>";
    }


    
}