<?php 
class Usuarios extends Controller{

    public function __construct()
    {
        
    }

    public function Index(){

        $this->vista('/Usuarios/Inicio');
    }
}