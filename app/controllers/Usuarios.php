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
    public function Editar()
    {
        $this->vista('/Usuarios/Editar');
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
            echo "padre de familia";
            var_dump($_POST['familiar']);
            $privilegio = $this->privilegemodels->setmonitoreo($_POST['familiar']);      
            var_dump($privilegio);
            //var_dump($privilegio, $values);            
            //hacemos un switch case para ver si el padre de familia al cual se le va dar privilegios 
            //ya  tiene privilegios sobre un alumno o todavia no tiene  
            switch($privilegio){
                //si ya tiene privilegios entoncs filtra prospectos de privilegios con privilegios antigos
                // y de este modo solo se agregen privilegios nuevos y no se repitan los que ya tienen
                case true:
                //aca llenamos un  array para poder sacar las diferencias entre los privilegios que ya tiene
                // y los prospectos de  privilegios sobre alumnos que tendra
                for($t=0; $t<count($privilegio); $t++) {                        
                    $this->asd[$t]= $privilegio[$t]['privilege'];
                }                  
                echo "values";
                var_dump($values);
                echo "sacando privilegios";
                var_dump($this->asd);            
            //aca sacamos las diferencias entre los que tiene y los que tendra 
            $valor1 = array_diff($values, $this->asd);
            $valor2 = array_diff($this->asd, $values);
            echo "sacando diferencia lo que hay de valor y no  hay en privilegio";
            var_dump($valor1);
            echo "sacando diferencia lo que hay de privilegio y no  hay en valor";
            var_dump($valor2);
            //aca combinamos las diferencias
            $combinacion = array_merge($valor1, $valor2);        
            echo "combinacion";
            var_dump($combinacion);
            //aca mostramos el codigo de los prospectos y el codigo del familiar al cual sera asignada los privilegios
            for($i=0; $i<count($combinacion); $i++){
               // echo "insert into  tb_privilege  (cod_user, privilege) value  (:".$combinacion[$i].", :".$_POST['familiar'].")"."<br>";
                //echo "el alumno es: ".$combinacion[$i]." y el codigo del familiar es: ".$_POST['familiar']."<br>";    
                $datos[$i]['cod_user'] = $combinacion[$i];
                $datos[$i]['cod_padre'] = $_POST['familiar'];                
            }      
            

            for($d = 0; $d<count($datos); $d++){
                //echo $datos[$d]['cod_user']." docente =".$datos[$d]['cod_padre']."<br>";
                $datoquery[$d] = ['usuarios' => $datos[$d]['cod_user'], 'padre'=> $datos[$d]['cod_padre']];
                //echo $datoquery[$d]['usuarios'].$datoquery[$d]['padre']."<br>";
                $query[]= $datos[$d]['cod_user'].", ".$datos[$d]['cod_padre'];
                $asd =  implode("'), ('", $query) ;
            }
            var_dump($asd);
            
                        
                break;
                // caso de que no contenga privilegios sobre ningun alumno se procedera a ejecutar el query
                case false:
                    echo " mando todo de una porque no tiene la ningun privilegio esta cochinada ajajajaja";
                break;
            }                                    
        }
        $this->vista('/Usuarios/Monitoreo');
    }


}
