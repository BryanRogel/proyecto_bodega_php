<?php 
	require_once 'Conexion.php';
	require_once 'rb.php';
/**
 * 
 */
class Herramienta
{

		private $nombre;
		private $codigo;
		private $marca;
		private $idCategoria;
		private $estado;
		private $creacion;
		private $modificacion;
		private $eliminacion;
		private $cantidad;
		public $db;

	
	function __construct()
	{
		$this->db = conectar();
	}




    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }



    /**
     * @param mixed $nombre
     *
     * @return self
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

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
    public function getMarca()
    {
        return $this->marca;
    }

    /**
     * @param mixed $marca
     *
     * @return self
     */
    public function setMarca($marca)
    {
        $this->marca = $marca;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdCategoria()
    {
        return $this->idCategoria;
    }

    /**
     * @param mixed $idCategoria
     *
     * @return self
     */
    public function setIdCategoria($idCategoria)
    {
        $this->idCategoria = $idCategoria;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * @param mixed $estado
     *
     * @return self
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCreacion()
    {
        return $this->creacion;
    }

    /**
     * @param mixed $creacion
     *
     * @return self
     */
    public function setCreacion($creacion)
    {
        $this->creacion = $creacion;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getModificacion()
    {
        return $this->modificacion;
    }

    /**
     * @param mixed $modificacion
     *
     * @return self
     */
    public function setModificacion($modificacion)
    {
        $this->modificacion = $modificacion;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getEliminacion()
    {
        return $this->eliminacion;
    }

    /**
     * @param mixed $eliminacion
     *
     * @return self
     */
    public function setEliminacion($eliminacion)
    {
        $this->eliminacion = $eliminacion;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * @param mixed $cantidad
     *
     * @return self
     */
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;

        return $this;
    }

    public function getAll()
    {
    	$sqlAll = "SELECT * from herramienta WHERE estado = 1";
        $info = $this->db->query($sqlAll);
        if ($info->num_rows>0) {
            
            $dato = $info;
        }else{

            $dato = false;
        }
        return $dato;
    }

    public function getAllCategoria()
    {
    	$sql = "SELECT * FROM categoria WHERE estado=1";
        $info = $this->db->query($sql);

        if ($info->num_rows>0) {
           $data = $info;
        }else{
            $data= null;
        }

        return $data;
    }

    public function saveHerramienta()
    {
    	$now = date('Y/m/d');
 		$sql = "INSERT INTO herramienta values (0,'".$this->nombre."',".$this->codigo.",'".$this->marca."',".$this->idCategoria.",".$this->estado.",'".$now."','NULL','".$now."','".$this->cantidad."');";
       $res = $this->db->query($sql);

       if ($res) 
       {
       	$data['estado']=true;
       }
       else
       {
       	$data['estado']=false;
       }
       
       return json_encode($data);


    }

    public function getCategoria($idHerramienta)
    {
    	$sql = "SELECT c.id as idCategoria, h.id, h.nombre,h.codigo,h.marca,h.cantidad,c.id from herramienta h 
        INNER JOIN categoria c ON h.idCategoria = c.id
        WHERE h.id = ".$idHerramienta;

        $result = $this->db->query($sql);
        $res = $result->fetch_assoc();

        $data['id']=$res['id'];
        $data['nombre'] = $res['nombre'];
        $data['categoria'] = $res['id'];
        $data['codigo'] = $res['codigo'];
        $data['marca'] = $res['marca'];
        $data['cantidad'] = $res['cantidad'];


        return json_encode($data);
    }

    public function updateHerramienta($idHerramienta)
    {
    	$now = date('Y-m-d');
       	$sql = "UPDATE  herramienta SET nombre = '".$this->nombre."',codigo= '".$this->codigo."',marca='".$this->marca."',idCategoria=".$this->idCategoria.",modificacion=".$now.",cantidad=cantidad+".$this->cantidad." WHERE id=".$idHerramienta;
       $res = $this->db->query($sql);

        if ($res) {
            $data['estado']=true;
            $data['descripcion']="Datos modificados exitosamente";
        }else{
            $data['estado']=false;
            $data['descripcion']="Error en la modificacion ".$this->db->error;
        }

    return json_encode($data);
       


    }
    public function deleteHerramienta($idHerramienta)
    {
    	$now = date('Y-m-d');
    	
       	$sql = "UPDATE `herramienta` SET `estado` = '".$this->estado."', `eliminacion` = '".$now."' WHERE `herramienta`.`id` = '".$idHerramienta."'";
       $res = $this->db->query($sql);

        if ($res) {
            $data['estado']=true;
            $data['descripcion']="Datos Eliminados";
        }else{
            $data['estado']=false;
            $data['descripcion']="Error en la Eliminacion".$this->db->error;
        }

    return json_encode($data);
       


    }

//NAVAGA

    function get(){
        $sql = "SELECT * FROM herramienta";
        global $cnx;
        return $cnx->query($sql);
    }
    
    function getById($id){
        $sql = "SELECT * FROM herramienta WHERE id=$id";
        global $cnx;
        return $cnx->query($sql);
    }

    function guardarPrestamo(){
        $sql = "INSERT INTO prestamo (fecha) VALUES (NOW())";
        global $cnx;
        return $cnx->query($sql);
    }

    function ultimaPrestamo(){
        $sql = "SELECT LAST_INSERT_ID() as ultimo";
        global $cnx;
        return $cnx->query($sql);
    }

    function guardarDetallePrestamo($idprestamo, $idherramienta, $cantidad){
        $sql = "INSERT INTO `prestamo_detalle`(`idprestamo`, `idherramienta`, `cantidad`) VALUES($idprestamo, $idherramienta, $cantidad)";
        global $cnx;
        return $cnx->query($sql);
    }


}

 ?>