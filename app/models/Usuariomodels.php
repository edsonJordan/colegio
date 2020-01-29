<?php
class Usuariomodels{
     private $db;
    public function __construct()
    {
        $this->db = new Base;        
    }
    public function tipos_usuarios()
    {
        $this->db->query("SELECT t.type, COUNT(u.cod_type_user) as 'cantidad' FROM tb_user u, tb_type_user t WHERE t.cod_type_user = u.cod_type_user GROUP BY t.type, t.cod_type_user");
        return $this->db->registros_array();    
    }
    


}
