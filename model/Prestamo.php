<?php
class Prestamo
{
	function get(){
		$sql = "SELECT * FROM personal";
		global $cnx;
		return $cnx->query($sql);
	}
	
	function getById($id){
		$sql = "SELECT * FROM herramienta WHERE id=$id";
		global $cnx;
		return $cnx->query($sql);
	}

	function getEmpleado(){
		$sql = "SELECT * FROM personal";
		global $cnx;
		return $cnx->query($sql);
	}

	function getEmpleadoId($id){
		$sql = "SELECT * FROM personal WHERE id=$id";
		global $cnx;
		return $cnx->query($sql);
	}

	function guardarPrestamo($id){
		$sql = "INSERT INTO `prestamo`(`fecha`, `idPersonal`) VALUES (NOW(), $id)";
		global $cnx;
		return $cnx->query($sql);
	}

	function ultimaPrestamo(){
		$sql = "SELECT LAST_INSERT_ID() as ultimo";
		global $cnx;
		return $cnx->query($sql);
	}

	function guardarDetallePrestamo($idprestamo, $idherramienta, $cantidad){
		$sql = "INSERT INTO `prestamo_detalle`(`idprestamo`, `idherramienta`, `cantidad`, `estado`, `estadoPrestamo`) VALUES ($idprestamo, $idherramienta, $cantidad, 1, 'Prestado')";
		global $cnx;
		return $cnx->query($sql);
	}

	function actualizarCantidadHerramienta($idprestamo, $idherramienta, $cantidad){
		$sql = "UPDATE `herramienta` SET `cantidad`=`cantidad`-$cantidad WHERE id=$idherramienta";
		global $cnx;
		return $cnx->query($sql);
	}

	function guardarHerramientaAsignada($id){
		$sql = "INSERT INTO `herramientaasignada`(`fecha`, `idPersonal`) VALUES (NOW(), $id)";
		global $cnx;
		return $cnx->query($sql);
	}


	function guardarDetalleHerramientaAsignada($idprestamo, $idherramienta, $cantidad){
		$sql = "INSERT INTO `herramientaasignada_detalle`(`idherramientaasignada`, `idherramienta`, `cantidad`, `estadoPrestamo`, `estado`) VALUES($idprestamo, $idherramienta, $cantidad, 'Registrado', 1)";
		global $cnx;
		return $cnx->query($sql);
	}
}