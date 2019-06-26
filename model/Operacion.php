<?php 

	/**
	* 
	*/
	class Operacion
	{
		
		protected $id ;
		protected $nombre;

		public function __construct()
		{
		}


		public function getId ()
		{
			return $this->id;
		}

		public function setId ($id)
		{
			$this->id  = $id;
		}


		public function getNombre()
		{
			return $this->nombre;
		}

		public function setNombre($nombre)
		{
			$this->nombre = $nombre;
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
			echo "Buscando";
		}
	}
?>