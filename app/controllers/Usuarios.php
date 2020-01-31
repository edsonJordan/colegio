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
        
       
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $genero = $_POST['genero'];
            if(!is_null($genero)){
                
               echo "asñld aslmladskndaskndaksnlldksn" .'   sadasd  '.$genero;
               
            }

            $datos = ['type' => trim($_POST['type_user']),
            'nombre' => trim($_POST['nombre']),
            'ap_paterno' => trim($_POST['ap_paterno']),
            'ap_materno' => trim($_POST['ap_materno']),
            'telefono' => trim($_POST['telefono']),
            'correo' => trim($_POST['correo']),
            'password' => trim($_POST['password'])];
            var_dump($datos);            
        }
        $datos= ['tipos' => $tipo_usuarios];
        $this->vista('/Usuarios/Agregar', $datos);
    }
    
}