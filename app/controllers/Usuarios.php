<?php 
class Usuarios extends Controller{
    protected $asd;
    protected $extranjero;
    protected $privilegios; 
    protected $nothingprivilege;
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
            $privilegio = $this->privilegemodels->setmonitoreo($_POST['familiar']);                       
            //hacemos un switch case para ver si el padre de familia al cual se le va dar privilegios 
            //ya  tiene privilegios sobre un alumno o todavia no tiene  
            switch($privilegio){
                //si ya tiene privilegios entoncs filtra prospectos de privilegios con privilegios antiguos
                // y de este modo solo se agregen privilegios nuevos y no se repitan los que ya tienen
                case true:
                //aca llenamos un  array para poder sacar las diferencias entre los privilegios que ya tiene
                // y los prospectos de  privilegios sobre alumnos que tendra
                for($t=0; $t<count($privilegio); $t++) {                        
                    $this->asd[$t]= $privilegio[$t]['privilege'];
                }               
                    foreach ($this->asd as $value) {
                            if (in_array($value, $values)) {
                                $this->extranjero = true;
                                break;
                            } 
                        }                                                                                     
                switch($this->extranjero){
                    case true:                                               
                                //Si hay privilegio repetido en los valores        
                                $valor1 = array_diff($values, $this->asd);                                
                                //$valor1 = array_diff($this->asd, $values);                                 
                                    //aca combinamos las diferencias
                                    //$combinacion = array_merge($valor1, $valor2);
                                    foreach($valor1 as $indice){
                                        $this->privilegios[]=$indice;
                                    }                                                                
                                for($d = 0; $d<count($this->privilegios); $d++){                  
                                    $query[]= $_POST['familiar']."','".$this->privilegios[$d];
                                    $asd =  implode("'), ('", $query) ;                                    
                                }                      
                                // tiene solo una parte de los provilegios parecidos a los valores seleccionados    
                                //var_dump($this->privilegios);
                                if($this->privilegios){                                    
                                    $p = "('".$asd."')";
                                    $this->privilegemodels->agregarmonitoreo($p);
                                }
                                else{
                                    //tiene todos los privilegios parecidos a los valores seleccionados
                                    rediccionar('/usuarios/agregar?mensage=30000');                            
                                }
                    break;
                    case null:                        
                                //no hay ningun privilegio repetido en los valores                            
                                $valor1 = array_diff($values, $this->asd);
                                foreach($valor1 as $indice){
                                    $this->privilegios[]=$indice;
                                }
                                var_dump($this->privilegios);
                                for($d = 0; $d<count($this->privilegios); $d++){                  
                                    $query[]= $this->privilegios[$d]."','".$_POST['familiar'];
                                    $this->nothingprivilege =  implode("'), ('", $query) ;
                                }
                                $final = "('".$this->nothingprivilege."')";
                                $this->privilegemodels->agregarmonitoreo($final);
                    break; 
                    default:
                        echo "Ocurrio un error mey dey mey dey";                
                }                                                            
                break;
                // caso de que no contenga privilegios sobre ningun alumno se procedera a ejecutar el query
                case false:                    
                    for($d = 0; $d<count($values); $d++){                  
                        $query[]= $_POST['familiar']."','".$values[$d];
                        $this->nothingprivilege =  implode("'), ('", $query);                                                                    
                    }
                    $final = "('".$this->nothingprivilege."')";
                $this->privilegemodels->agregarmonitoreo($final);                
                break;
            }                                    
        }    
        $this->vista('/Usuarios/Monitoreo');
    }
    public function visualizar()
    {        
        $usuarios = $this->usuariosmodels->getusuarios();        
        $datos =['usuarios' => $usuarios];
        $this->vista('/Usuarios/Visualizar', $datos);        
    }
    
    public function exportar()
    {
        $this->vista('/Usuarios/Exportar');
    }


}
