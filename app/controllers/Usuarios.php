<?php 
class Usuarios extends Controller{
    protected $asd;
    public function __construct()
    {
        $this->usuariosmodels = $this->modelo('Usuariomodels');
        $this->typeusuariomodels = $this->modelo('Typeusermodels');
        $this->privilegemodels = $this->modelo('Privilegiomodels');
    }
    public function Index(){
        $tipe_user=$this->usuariosmodels->tipos_usuarios();
     $datos = ['tipos_user' => $tipe_user];
        $this->vista('/Usuarios/Inicio', $datos);
    }
    public function agregar(){        
        $tipo_usuarios = $this->typeusuariomodels->tipo_user();
        $padre = $this->usuariosmodels->setfamiliar('padre');
        $alumno = $this->usuariosmodels->setfamiliar('alumno');         
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
            $this->usuariosmodels->Agregaruser($datos);                            
        }
        $datos= ['tipos' => $tipo_usuarios, 'padres' => $padre, 'alumnos' => $alumno];
        $this->vista('/Usuarios/Agregar', $datos);
    }
    public function monitoreo()
    {

        if($_SERVER['REQUEST_METHOD'] == 'POST'){                
            $values = $_POST['estudiantes'];
            var_dump($_POST['familiar']);
            $privilegio = $this->privilegemodels->setmonitoreo($_POST['familiar']);            
            var_dump($privilegio);            
            var_dump($values);            
            switch($privilegio){
                case true:
                //aca llenamos un  array para poder sacar las diferencias entre los privilegios que ya tiene
                // y los prospectos de  privilegios sobre alumnos que tendra
                for($t=0; $t<count($privilegio); $t++) {                        
                    $this->asd[$t]= $privilegio[$t]['privilege'];
            }                  
            //aca sacamos las diferencias entre los que tiene y los que tendra 
        $valor1 = array_diff($values, $this->asd);
        $valor2 = array_diff($this->asd, $values);
        //aca combinamos las diferencias
        $combinacion = array_merge($valor1,$valor2);        
        var_dump($combinacion);
        //aca mostramos el codigo de los prospectos y el codigo del familiar al cual sera asignada los privilegios
            for($i=0; $i<count($combinacion); $i++){
                echo "el alumno es: ".$combinacion[$i]." y el codigo del familiar es: ".$_POST['familiar']."<br>";    
            }      
                break;
                case false:
                    echo " mando todo de una porque no tiene la ningun privilegio esta cochinada ajajajaja";
                break;
            }                                    
        }
        $this->vista('/Usuarios/Monitoreo');
    }
}