<?php 
class General extends Controller{
    public function __construct()
    {
        $this->principalmodels = $this->modelo('Generalmodels');     
    }
    public function Index(){
       
        $this->vista('/General/Inicio');   
    }
    


}