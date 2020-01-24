<?php 
class Base {

    private $host= DB_HOST;
    private $user = DB_USER;
    private $pass= DB_PASSWORD;
    private $data_base= DB_NAME;

    private $dbh;
    private $stmt;
    private $error;

    public function __construct()
    {
        //seteamos valores de host y declaramos atributos pdo
        $dsn ='mysql:host='.$this->host.';dbname='.$this->data_base;
        $opciones= array(
            PDO::ATTR_PERSISTENT=>true, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );
        //creamos una instancia de PDO
        try{
            $this->dbh = new PDO($dsn, $this->usuario, $this->pass, $opciones);
            $this->dbh->exec('set names utf8');
        }catch(PDOException $e){
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }
    public function query($sql)
    {
        $this->stmt=$this->dbh->prepare($sql);
    }
    //declaramos el tipo de  datos con la funcion bind
    public function bind($parametro, $valor, $tipo=null)
    {
        if(is_null($tipo)){
            switch(true){
                case is_int($valor):
                    $tipo = PDO::PARAM_INT;
                break;
                case is_bool($valor):
                    $tipo = PDO::PARAM_BOOL;
                break;
                case is_null($valor):
                    $tipo = PDO::PARAM_NULL;
                break;
                default:
                    $tipo = PDO::PARAM_STR;
                break;
            }
        }
        $this->stmt->bindValue($parametro, $valor, $tipo);
    }
    //funcion que ejecuta el query
    public function execute()
    {
        return $this->stmt->execute();
    }
    //creamos una funcion donde ejecuta el query y devuelve todos los registros de la consulta
    public function registros()
    {
        $this->execute();
        return $this->stmt->fetchALL(PDO::FETCH_OBJ);
    }
    //creamos una funcion donde ejecuta el query y solo devuelve una registro
    public function registro()
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);  
    }
    //obtenemos la cantidad de registros
    public function conteo()
    {
        $this->execute();
        return $this->stmt->rowCount();
    }
}