<?php 
class Privilegiomodels{
     private $db;
    public function __construct()
    {
        $this->db = new Base;        
    }
    public function setmonitoreo($codigo)
    {
        $this->db->query("SELECT privilege FROM tb_privilege WHERE cod_user= '$codigo' ");
        return $this->db->registros_array();     
    }


}