<?php 
class Typeusermodels{
     private $db;
    public function __construct()
    {
        $this->db = new Base;        
    }
    public function tipo_user()
    {
        $this->db->query("select * from tb_type_user");
        return $this->db->registros();
     
    }


}