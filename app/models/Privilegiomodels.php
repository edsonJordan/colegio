<?php 
class Privilegiomodels{
     private $db;
    public function __construct()
    {
        $this->db = new Base;        
    }
    public function setmonitoreo($codigo)
    {
        $this->db->query("SELECT privilege FROM tb_privilege WHERE cod_user= '$codigo' order by  privilege asc");
        return $this->db->registros_array();     
    }
    public function agregarmonitoreo($valores)
    {
        $this->db->query("INSERT INTO tb_privilege (cod_user, privilege) VALUES $valores ");
        try{           
            $this->db->execute();
            rediccionar('/usuarios/agregar?mensage=10000');
        }catch(PDOException $e){
            $this->mensaje = $e->getMessage();
            $this->error = $e->getCode();                
            echo $this->mensaje;
            }       
        } 
        



}