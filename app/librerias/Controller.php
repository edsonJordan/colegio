<?php 
class Controller{
    protected $respuesta; 
    protected $permiso;
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



}