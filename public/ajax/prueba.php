<?php  
require_once '../../app/librerias/Base.php';
 $user = "root";
 $pass = "";
 $host = "localhost";
$db = "db_colegio";
$almacen ;
$const;
$codigo = $_POST['buscar'];
 $conexion = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
 $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 $conexion->exec('set names utf8');
 $result = $conexion->prepare("SELECT privilege FROM tb_privilege WHERE cod_user = '$codigo' ");
 $result->execute();
 $consulta["datos"]  = $result->fetchALL(PDO::FETCH_ASSOC) ; 
    for($i = 0; $i < count($consulta['datos']); $i++ ){
        $almacen[$i]=$consulta['datos'][$i]['privilege'];    
    }            
  for($e = 0; $e < count($almacen); $e++){
    $otro[$e] = $conexion->prepare("SELECT cod_user, name, ap_paterno, ap_materno FROM tb_user WHERE cod_user = ".$almacen[$e]." ");
    //$otro = $conexion->prepare("SELECT cod_user, name, ap_paterno, ap_materno FROM tb_user WHERE cod_user = 17");
    $otro[$e]->execute();
    $consulta["otro"][$e]  = $otro[$e]->fetchALL(PDO::FETCH_ASSOC); 
  } 
//var_dump($almacen);
//var_dump($consulta['otro']);
header('Content-Type: application/json');
 echo json_encode($consulta['otro']);
?>