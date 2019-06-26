<?php 

	require_once 'Personal.php';
	require_once 'Operacion.php';
	require_once 'Conexion.php';

	/**
	* 
	*/
	class Registro
	{
		
		private $id;
		private $operacion;
		private $personal;
		private $fecha;
		private $estado;
		public $db;


		public function __construct()
		{
			$this->db = conectar();
		}


		public function getId()
		{
			return $this->id;
		}

		public function setId($id)
		{
			$this->id = $id;
		}


		public function getOperacion()
		{
			return $this->operacion;
		}

		public function setOperacion($operacion)
		{
			$this->operacion = $operacion;
		}


		public function getPersonal()
		{
			return $this->personal;
		}

		public function setPersonal($personal)
		{
			$this->personal = $personal;
		}


		public function getFecha()
		{
			return $this->fecha;
		}

		public function setFecha($fecha)
		{
			$this->fecha = $fecha;
		}


		public function getEstado()
		{
			return $this->estado;
		}

		public function setEstado($estado)
		{
			$this->estado = $estado;
		}



		public function agregar()
		{
			echo "Agregado";
		}

		public function modificar()
		{
			echo "Modificado";
		}

		public function eliminar()
		{
			echo "Eliminado";
		}

		public function consultar()
		{
			$sql = "SELECT idOperacion,fecha FROM registro WHERE idPersonal LIKE '%".$this->personal."%'";
			$info = $this->db->query($sql);
			if ($info->num_rows>0) {
				
				$data = $info->fetch_assoc();
				return $data;
			}
			
		}
	}
?>