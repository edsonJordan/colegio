<?php 
class Principal extends Controller{
    public function __construct()
    {
        
    }
    public function index(){
        $this->vista('principal/index');   
    }



}