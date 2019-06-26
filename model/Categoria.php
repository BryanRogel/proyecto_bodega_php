<?php 
require_once 'Conexion.php';
require_once 'rb.php';
R::setup('mysql:host=localhost;dbname=bodegaproyecto','root','');
	class Categoria
	{

		private $nombre;
        public $db;
        
		public function __construct()
		{
            
            $this->db = conectar();
            
		}


        public function getDb()
        {
            return $this->db;
        }


    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $username
     *
     * @return self
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }


    public function getAll()
    {
        $sqlAll = "SELECT * from categoria WHERE estado = 1";
        $info = $this->db->query($sqlAll);
        if ($info->num_rows>0) {
            
            $dato = $info;
        }else{

            $dato = false;
        }
        return $dato;
    }


    public function saveUser()
    {
        $sql = "INSERT INTO `categoria`(`nombre`, `estado`,`fechaRegistro`) VALUES('".$this->nombre."',1,NOW())";
        $res = $this->db->query($sql);
        $data = array();
        if($res){
            $data['estado'] = true;
            $data['descripcion'] = "Datos ingresados exitosamente";
        }else{
            $data['estado'] = false;
            $data['descripcion'] = "Error al ingresar los datos".$this->db->error;
        }

        return json_encode($data);
    }   

    public function findUser($nombre)
    {
        $sql = "SELECT COUNT(u.id) as numero from categoria u WHERE u.nombre='".$nombre."'";
        $info = $this->db->query($sql);
        $data =$info->fetch_assoc();
        $datos = array();
        if($data['numero']>0){
            $datos['estado']=false;
            $datos['descripcion']="Categoria ya registrado, intenta con otro.";
        }else{
            $datos['estado']=true;
            $datos['descripcion']="Categoria disponible";
        }
        return json_encode($datos);
    }

    public function getUser($id)
    {
        $sql = "SELECT c.nombre,c.id FROM categoria c WHERE c.id=".$id;

        $info = $this->db->query($sql);
        $res = $info->fetch_assoc();

        $data['nombre'] = $res['nombre'];
        $data['idCat']= $res['id'];

        return json_encode($data);
    }

    public function eliminarUser($id)
    {

        $sql = "UPDATE `categoria` SET `estado`=0,`fechaEliminacion`=NOW() WHERE id  = ".$id;
        $info = $this->db->query($sql);

         if($info)
            {
            $data['estado'] = true;
            $data['descripcion'] = "Categoria Eliminada exitosamente";
            }
            else
            {
            $data['estado'] = false;
            $data['descripcion'] = "Error al eliminar la categoria".$this->db->error;
            }

        return $data;
    }

    public function editUser($id)
    {
            $now = date('Y-m-d');
            $per = R::load('categoria',$id);


   
            $per->nombre = $this->nombre;
            $per->fechaModificacion = $now;


            $res = R::store($per);

            if($res>0)
            {
            $data['estado'] = true;
            $data['descripcion'] = "Categoria modificada exitosamente";
            }
            else
            {
            $data['estado'] = false;
            $data['descripcion'] = "Error al modificar la categoria".$this->db->error;
            }

        return json_encode($data);
    }

//Fin de la clase usuario

}


 ?>