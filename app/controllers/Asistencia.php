<?php 
class Asistencia extends Controller{     
    public function __construct()
    {
      
        $this->redi = $this->redireccion();
    }
    public function Index(){    
        $this->vista('/Asistencia/Inicio');   
    }
    
}