<?php 
		require_once 'Conexion.php';
		require_once 'rb.php';
		R::setup('mysql:host=localhost;dbname=bodegaproyecto','root','');
	/**
	* 
	*/
	class Personal
	{
		
		private $codigo;
		private $nombre;
		private $apellido;
		private $genero;
		private $email;
		private $direccion;
		private $telefono;
		private $nacimiento;
		private $fechaRegistro;
		private $estado;
		private $ingreso;
		public $db;

		public function __construct()
		{
			$this->db= conectar();
		}


		public function getId()
		{
			return $this->id;
		}

		public function setId($id)
		{
			$this->id = $id;
		}


		public function getNombre()
		{
			return $this->nombre;
		}

		public function setNombre($nombre)
		{
			$this->nombre = $nombre;
		}


		public function getApellido()
		{
			return $this->apellido;
		}

		public function setApellido($apellido)
		{
			$this->apellido = $apellido;
		}


		public function getEmail()
		{
			return $this->email;
		}

		public function setEmail($email)
		{
			$this->email = $email;
		}

		public function getDireccion()
		{
			return $this->direccion;
		}

		public function setDireccion($direccion)
		{
			$this->direccion= $direccion;
		}


		public function getTelefono()
		{
			return $this->telefono;
		}

		public function setTelefono($telefono)
		{
			$this->telefono = $telefono;
		}


		public function getNacimiento()
		{
			return $this->nacimiento;
		}

		public function setNacimiento($nacimiento)
		{
			$this->nacimiento = $nacimiento;
		}


		public function getFechaRegistro()
		{
			return $this->fechaRegistro;
		}

		public function setFechaRegistro($fechaRegistro)
		{
			$this->fechaRegistro = $fechaRegistro;
		}


		public function getEstado()
		{
			return $this->estado;
		}

		public function setEstado($estado)
		{
			$this->estado = $estado;
		}

		public function getAll()
		{
			$sql = "SELECT * from personal WHERE estado=1";
			$info = $this->db->query($sql);
			if ($info->num_rows>0) 
			{
            
            $dato = $info;
        	}
	        else
	        {
	           	$dato = false;
	        }

        		return $dato;
		}

		public function savePersonal()
		{
			
			
						
			// CREATE 
			$per = R::dispense('personal');
			$per->codigo = $this->codigo;
			$per->nombre = $this->nombre;
			$per->apellido= $this->apellido;
			$per->genero = $this->genero;
			$per->email=$this->email;
			$per->direccion= $this->direccion;
			$per->telefono= $this->telefono;
			$per->nacimiento = $this->nacimiento;
			$per->fechaRegistro = $this->fechaRegistro;
			$per->ingreso = $this->ingreso;	
			$per->estado = $this->estado;
			$res = R::store($per);


			if ($res>0) 
			{
				$data['estado'] =true;
			}
			else
			{
				$data['estado'] =false;
			}

			
			return json_encode($data);
		}

		public function getPersonal($idPersonal)
    	{
	    	$sql = "SELECT * FROM personal WHERE id=".$idPersonal;
	        $result = $this->db->query($sql);
	        $res = $result->fetch_assoc();

	        $data['id']=$res['id'];
	        $data['codigo'] = $res['codigo'];
	        $data['nombre'] = $res['nombre'];
	        $data['apellido'] = $res['apellido'];
	        $data['genero'] = $res['genero'];
	        $data['email'] = $res['email'];
	        $data['direccion'] = $res['direccion'];
	        $data['telefono'] = $res['telefono'];
	        $data['nacimiento'] = $res['nacimiento'];
	        $data['ingreso'] = $res['ingreso'];

	        return json_encode($data);
    	}

		 public function updatePersonal($idPersonal)
	    {
	    	$now = date('Y-m-d');

	       	$per = R::load('personal', $idPersonal);


			$per->codigo = $this->codigo;
			$per->nombre = $this->nombre;
			$per->apellido= $this->apellido;
			$per->email=$this->email;
			$per->genero = $this->genero;
			$per->direccion= $this->direccion;
			$per->telefono= $this->telefono;
			$per->nacimiento = $this->nacimiento;
			$per->ingreso = $this->ingreso;	
			$per->estado = $this->estado;
			$per->modificacion = $now;

			$res = R::store($per);

	        if ($res>0) {
	            $data['estado']=true;
	            $data['descripcion']="Datos modificados exitosamente";
	        }else{
	            $data['estado']=false;
	            $data['descripcion']="Error en la modificacion ".$this->db->error;
	        }

	    return json_encode($data);
	       


	    }

		public function verificar($cod)
		{
			$sql = "SELECT p.codigo FROM personal p WHERE p.codigo= '".$cod."'";

			$info = $this->db->query($sql);

			if ($info->num_rows>0) 
			{
				$data['estado'] =false;
			}
			else
			{
				$data['estado'] =true;
			}

			return json_encode($data);
		}


		public function deleteHerramienta($idPersonal)
	    {
	    	$now = date('Y-m-d');
	    	$per = R::load('personal', $idPersonal);
	    	$per->estado = $this->estado;
	    	$per->eliminacion = $now;
	    	$res = R::store($per);
	       	

	        if ($res>0) {
	            $data['estado']=true;
	            $data['descripcion']="Datos Eliminados";
	        }else{
	            $data['estado']=false;
	            $data['descripcion']="Error en la Eliminacion".$this->db->error;
	        }

	    	return json_encode($data);

    	}
	
    /**
     * @param mixed $ingreso
     *
     * @return self
     */
    public function setIngreso($ingreso)
    {
        $this->ingreso = $ingreso;

    }


    /**
     * @return mixed
     */
    public function getIngreso()
    {
        return $this->ingreso;
    }

    /**
     * @param mixed $db
     *
     * @return self
     */
    public function setDb($db)
    {
        $this->db = $db;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * @param mixed $codigo
     *
     * @return self
     */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getGenero()
    {
        return $this->genero;
    }

    /**
     * @param mixed $genero
     *
     * @return self
     */
    public function setGenero($genero)
    {
        $this->genero = $genero;

        return $this;
    }
}
?>