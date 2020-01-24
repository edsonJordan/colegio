<?php 
class Principal extends Controller{
    public function __construct()
    {
        $this->principalmodels = $this->modelo('Principalmodels');
        $this->redi = $this->redireccion();
    }
    public function index(){
        $amigos = $this->principalmodels->consulta();
                
        $this->vista('principal/index');   
    }



}