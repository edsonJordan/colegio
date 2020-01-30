<?php 
class General extends Controller{
    public function __construct()
    {
        $this->principalmodels = $this->modelo('Generalmodels');
        $this->redi = $this->redireccion();
    }
    public function Index(){
       
        $this->vista('/General/Inicio');   
    }
    


}