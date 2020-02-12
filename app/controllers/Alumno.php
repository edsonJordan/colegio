<?php 

class Alumno extends Controller{

    public function __construct() {
        

    }
    public function Index()
    {
        $datos = [];
        $this->vista('/Usuarios/Alumno/Index', $datos);
    }

    public function Ver($codigo)
    {        
        $datos = [];
        $this->vista('/Usuarios/Alumno/Ver', $datos);
    }
}

?>