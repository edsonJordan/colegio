<?php 
class Usuarios extends Controller{
    public function __construct()
    {
        $this->usuariosmodels = $this->modelo('Usuariomodels');
    }
    public function Index(){
        $tipe_user=$this->usuariosmodels->tipos_usuarios();
     //   var_dump($tipe_user);
     $datos = ['tipos_user' => $tipe_user];
        $this->vista('/Usuarios/Inicio', $datos);
    }
}