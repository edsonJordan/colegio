<?php
class Usuariomodels{
     private $db;
     public $geterror;
    public function __construct()
    {
        $this->db = new Base;        
    }     
    public function getusuarios()
    {
        $this->db->query("SELECT u.cod_user, t.type, u.name, u.ap_materno, u.ap_paterno, u.phone, u.status FROM tb_user u, tb_type_user t WHERE u.cod_type_user=t.cod_type_user");
        return $this->db->registros();
    }
    public function tipos_usuarios()
    {
        $this->db->query("SELECT t.type, COUNT(u.cod_type_user) as 'cantidad' FROM tb_user u, tb_type_user t WHERE t.cod_type_user = u.cod_type_user GROUP BY t.type, t.cod_type_user");
        return $this->db->registros_array();    
    }
    public function Agregaruser($datos){
        $this->db->query("INSERT INTO tb_user
        (cod_type_user, name, ap_materno, ap_paterno, genero, pass, phone, email, status)
         VALUES(:cod_type_user, :name, :ap_materno, :ap_paterno, :genero, :pass, :phone, :email, :status)");
         $this->db->bind(':cod_type_user', $datos['type']);
         $this->db->bind(':name', $datos['nombre']);
         $this->db->bind(':ap_materno', $datos['ap_materno']);
         $this->db->bind(':ap_paterno', $datos['ap_paterno']);
         $this->db->bind(':genero', $datos['genero']);
         $this->db->bind(':pass', $datos['password']);
         $this->db->bind(':phone', $datos['telefono']);
         $this->db->bind(':email', $datos['correo']);
         $this->db->bind(':status', $datos['status']);         
        try{           
            $this->db->execute();
            rediccionar('/usuarios/agregar?mensage=10000');
        }catch(PDOException $e){
            $this->mensaje = $e->getMessage();
            $this->error = $e->getCode();                
            switch($this->error){
                case 23000:                                     
                    rediccionar('/usuarios/agregar?mensage='.$this->error);
                break;
                case "HY000":
                    rediccionar('/usuarios/agregar?mensage=20000');
                break;
            }       
        }         
    }   
    public function setfamiliar($codigo)
    {
        $this->db->query("SELECT u.cod_user, u.name, u.ap_paterno, u.ap_materno from tb_user u, tb_type_user t WHERE u.cod_type_user = t.cod_type_user and t.type= '$codigo' ");
        return $this->db->registros();
    }
    
}
?>


