<?php 
class Usuarios extends Controller{
    public function __construct()
    {
        $this->usuariosmodels = $this->modelo('Usuariomodels');
        $this->typeusuariomodels = $this->modelo('Typeusermodels');
    }
    public function Index(){
        $tipe_user=$this->usuariosmodels->tipos_usuarios();
     $datos = ['tipos_user' => $tipe_user];
        $this->vista('/Usuarios/Inicio', $datos);
    }
    public function agregar(){
        
        $tipo_usuarios = $this->typeusuariomodels->tipo_user();
        /* var_dump($tipo_usuarios); */
        $datos= ['tipos' => $tipo_usuarios];
        $this->vista('/Usuarios/Agregar', $datos);
    }
    
}