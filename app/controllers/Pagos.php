<?php 
class Pagos extends Controller{
    public function __construct()
    {      
        $this->redi = $this->redireccion();
    }
    public function Index(){
       
        $this->vista('/Pagos/Inicio');   
    }
    
}