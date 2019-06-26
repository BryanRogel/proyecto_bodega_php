<?php 
require_once '../model/Categoria.php';
if(isset($_POST['key']))
{
	$key = $_POST['key'];
	switch ($key) {
		case 'agregar':
			agregar();
			break;
			case 'findUser':
			findUser();
			break;
			case 'modificar':
			modificar();
			break;
			case 'getUser':
			getUser();
			break;
			case 'eliminar':
			eliminar();
			break;
		
		
		default:
			# code...
			break;
	}
	//Fin del isset
}

function eliminar()
{
	$info = $_POST["id"];
	$decodeInfo = json_decode($info);
	$objCategoria = new Categoria();
	$res = $objCategoria->eliminarUser($decodeInfo);
	$jsonRes = json_encode($res);
	echo $jsonRes;
}

function modificar()
{
	$info = $_POST['dataCategoria'];
	$decodeInfo = json_decode($info);
	$objCategoria = new Categoria();
	$objCategoria->setNombre($decodeInfo[1]->value);
	$id = $decodeInfo[0]->value;
	$res = $objCategoria->editUser($id);

	echo $res;
}

function getUser()
{
	$objCategoria = new Categoria();
	$id = $_POST['id'];
	$res = $objCategoria->getUser($id);
	echo $res;
}


function findUser()
{
	$objCategoria = new Categoria();
	$user = $_POST['dataCategoria'];
	$res = $objCategoria->findUser($user);
	echo $res;
}

function agregar()
{
	$info = $_POST['dataCategoria'];
	$decodeInfo = json_decode($info);
	$objCategoria = new Categoria();
	$objCategoria->setNombre($info);
	$res = $objCategoria->saveUser();
	echo $res;
}



 ?>