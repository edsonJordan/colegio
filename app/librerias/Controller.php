<?php 
class Controller{
    //cargamos la gestion de un modelo
    public function modelo($modelo){
        require_once '../app/models/'. $modelo. 'models.php';
        //instacioamos los modelos
        return new $modelo();
    }
    //cargamos la vista
    public function vista($vista, $datos = []){
        if(file_exists('../app/views/'.$vista.'.php')){
            //cargamos la vista
            require_once '../app/views/'.$vista. '.php';
        }else{
            echo "no existe la vista";
        }
        
    }



}