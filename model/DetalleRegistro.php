<?php 

	/**
	* 
	*/
	class DetalleRegistro
	{
		
		protected $id;
		protected $herramienta;
		protected $registro;
		protected $comentario;



		public function __construct()
		{
		}


		public function getId()
		{
			return $this->id;
		}

		public function setId($id)
		{
			$this->id = $id;
		}


		public function getHerramienta()
		{
			return $this->herramienta;
		}

		public function setHerramienta($herramienta)
		{
			$this->herramienta = $herramienta;
		}


		public function getRegistro()
		{
			return $this->registro;
		}

		public function setRegistro($registro)
		{
			$this->registro = $registro;
		}


		public function getComentario()
		{
			return $this->comentario;
		}

		public function setComentario($comentario)
		{
			$this->comentario = $comentario;
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