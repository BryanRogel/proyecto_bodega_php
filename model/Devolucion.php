<?php 
require_once 'Conexion.php';
 require_once 'rb.php';
R::setup('mysql:host=localhost;dbname=bodegaproyecto','root','');
	class Devolucion
	{
        public $db;
        
		public function __construct()
		{
            
            $this->db = conectar();
            
		}



    public function getAll()
    {
        $sqlAll = "select * from v4_Persona";
        $info = $this->db->query($sqlAll);
        if ($info->num_rows>0) {
            
            $dato = $info;
        }else{

            $dato = false;
        }
        return $dato;
    }

    public function consult($r)
    {
        $sqlAll = "select idPrestamo,cantidad, idHerramienta from v4_Persona WHERE idPrestamo=".$r;
        $info = $this->db->query($sqlAll);

        $res = $info->fetch_assoc();

        $data['cantidad']=$res['cantidad'];
        $data['idPrestamo'] = $res['idPrestamo'];
        $data['idHerramienta'] = $res['idHerramienta'];


        return json_encode($data);
    }

    public function devolver($idUser,$idPrestamo,$canti,$idHerramienta)
    {
        $sql = "update prestamo_detalle set estadoPrestamo = 'Devuelto', devolucion=NOW()  where id = ".$idUser;
        $info = $this->db->query($sql);

        $cant = "SELECT cantidad from herramienta WHERE id=".$idHerramienta;
        $h = $this->db->query($cant);
        $f = $h->fetch_assoc(); 

        $ca = $f['cantidad']+$canti;

        $per = R::load('herramienta', $idHerramienta);
        
        $per->cantidad = $ca;

        $res = R::store($per);


         if($info)
            {
            $data['estado'] = true;
            $data['descripcion'] = "Devuelto exitosamente";
            }
            else
            {
            $data['estado'] = false;
            $data['descripcion'] = "Error al devolver los datos".$this->db->error;
            }

        return $data;
    }

}


 ?>