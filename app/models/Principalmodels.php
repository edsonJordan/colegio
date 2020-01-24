<?php 
class Principalmodels{
     private $db;
    public function __construct()
    {
        $this->db = new Base;        
    }
    public function consulta()
    {
        $this->db->query("select * from amigos");
        return $this->db->registros();
     
    }


}