<?php 
class Asistencias extends Controller{     
    public function __construct()
    {
        $this->principalmodels = $this->modelo('Principalmodels');
        $this->redi = $this->redireccion();
    }
    public function Index(){
        $amigos = $this->principalmodels->consulta();        
        $this->vista('/Asistencias/Inicio');   
    }
    
}