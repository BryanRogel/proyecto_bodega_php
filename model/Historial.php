<?php 
require_once 'Conexion.php';
 require_once 'rb.php';
R::setup('mysql:host=localhost;dbname=bodegaproyecto','root','');
	class Historial
	{
        public $db;
        
		public function __construct()
		{
            
            $this->db = conectar();
            
		}



    public function getAll()
    {
        $sqlAll = "select * from v1_Persona";
        $info = $this->db->query($sqlAll);
        if ($info->num_rows>0) {
            
            $dato = $info;
        }else{

            $dato = false;
        }
        return $dato;
    }

     public function eliminar($idUser)
    {
        $sql = "update prestamo_detalle set estado=0 where id = ".$idUser;
        $info = $this->db->query($sql);

         if($info)
            {
            $data['estado'] = true;
            $data['descripcion'] = "Prestado exitosamente";
            }
            else
            {
            $data['estado'] = false;
            $data['descripcion'] = "Error al prestar".$this->db->error;
            }

        return $data;
    }

}


 ?>