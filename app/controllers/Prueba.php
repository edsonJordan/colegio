<?php 
class Prueba extends Controller{

    public function __construct()
    {
        
    }

    public function index(){
        echo "prueba";
        $this->vista('prueba/prueba');
    }



}