<?php 
require_once '../model/Devolucion.php';
if(isset($_POST['key']))
{
	$key = $_POST['key'];
	switch ($key) {
			case 'devolver':
			devolver();
			break;
			case 'consult':
			consult();
			break;
		
		default:
			# code...
			break;
	}
	//Fin del isset
}

function devolver()
{
	$info = $_POST["dataUsuario"];
	$decodeInfo = json_decode($info);
	$objDevolucion = new Devolucion();
	$idUser = $decodeInfo[0]->value;
	$idPrestamo = $decodeInfo[1]->value;
	$canti = $decodeInfo[2]->value;
	$idHerramienta = $decodeInfo[3]->value;
	//llena la clase para mandarle el idHerramienta,cantidad,idPrestamo :v

	

	$res = $objDevolucion->devolver($idUser,$idPrestamo,$canti,$idHerramienta);

	$jsonRes = json_encode($res);

	echo $jsonRes;
}

function eliminar()
{
	$info = $_POST["idUsuario"];
	$decodeInfo = json_decode($info);
	$objDevolucion = new Devolucion();
	

	$res = $objDevolucion->eliminarUser($decodeInfo);

	$jsonRes = json_encode($res);

	echo $jsonRes;
}

function consult()
{
	$info = $_POST['idUsuario'];
	$decodeInfo = json_decode($info);
	$objDevolucion = new Devolucion();

	$res = $objDevolucion->consult($info);
	echo $res;
}



 ?>