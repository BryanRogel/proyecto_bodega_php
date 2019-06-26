<?php 
require_once '../model/HerramientaAsignada.php';
if(isset($_POST['key']))
{
	$key = $_POST['key'];
	switch ($key) {
			case 'prestar':
			prestar();
			break;
			case 'devolver':
			devolver();
			break;
			case 'eliminar':
			eliminar();
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
	$info = $_POST["idUsuario"];
	$decodeInfo = json_decode($info);
	$objHerramientaAsignada = new HerramientaAsignada();
	

	$res = $objHerramientaAsignada->devolver($decodeInfo);

	$jsonRes = json_encode($res);

	echo $jsonRes;
}

function eliminar()
{
	$info = $_POST["dataUsuario"];
	$decodeInfo = json_decode($info);
	$objHerramientaAsignada = new HerramientaAsignada();
	$idUser = $decodeInfo[0]->value;
	$idPrestamo = $decodeInfo[1]->value;
	$canti = $decodeInfo[2]->value;
	$idHerramienta = $decodeInfo[3]->value;
	//llena la clase para mandarle el idHerramienta,cantidad,idPrestamo :v

	

	$res = $objHerramientaAsignada->eliminar($idUser,$idPrestamo,$canti,$idHerramienta);

	$jsonRes = json_encode($res);

	echo $jsonRes;
}

function prestar()
{
	$info = $_POST["idUsuario"];
	$decodeInfo = json_decode($info);
	$objHerramientaAsignada = new HerramientaAsignada();
	

	$res = $objHerramientaAsignada->prestamo($decodeInfo);

	$jsonRes = json_encode($res);

	echo $jsonRes;
}

function consult()
{
	$info = $_POST['idUsuario'];
	$decodeInfo = json_decode($info);
	$objHerramientaAsignada = new HerramientaAsignada();

	$res = $objHerramientaAsignada->consult($info);
	echo $res;
}



 ?>