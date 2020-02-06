<?php 
class Pagos extends Controller{
    public function __construct()
    {              
    }
    public function Index(){
       
        $this->vista('/Pagos/Inicio');   
    }
    
}