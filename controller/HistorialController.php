<?php 
require_once '../model/Historial.php';
if(isset($_POST['key']))
{
	$key = $_POST['key'];
	switch ($key) {
			case 'prestar':
			prestar();
			break;
		default:
			# code...
			break;
	}
	//Fin del isset
}


function prestar()
{
	$info = $_POST["idUsuario"];
	$decodeInfo = json_decode($info);
	$objHistorial = new Historial();
	

	$res = $objHistorial->eliminar($decodeInfo);

	$jsonRes = json_encode($res);

	echo $jsonRes;
}


 ?>