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
        if($_SERVER['REQUEST_METHOD'] == 'POST'){            
            $genero=empty($_POST['genero']);        
            if($genero == false){
                $genero = "0";
            }            
            $datos = ['type' => trim($_POST['type_user']),
            'nombre' => trim($_POST['nombre']),
            'ap_paterno' => trim($_POST['ap_paterno']),
            'ap_materno' => trim($_POST['ap_materno']),
            'telefono' => trim($_POST['telefono']),
            'correo' => trim($_POST['correo']),
            'password' => trim($_POST['password']),
            'genero' => trim($genero),
            'status' => "1"];                           
            if($this->usuariosmodels->Agregaruser($datos)){
                rediccionar('/usuarios/agregar');
            }
        }
        $datos= ['tipos' => $tipo_usuarios];
        $this->vista('/Usuarios/Agregar', $datos);
    }
    
}