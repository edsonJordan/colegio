<?php 
class Matricula extends Controller{
    public function __construct()
    {
   
        $this->redi = $this->redireccion();
    }
    public function Index(){
    
        $this->vista('/Matricula/Inicio');   
    }
    
}