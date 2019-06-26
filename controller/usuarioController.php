<?php 

require_once '../model/Usuario.php';
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

			case 'ingresar':
				ingresar();
				break;
			case 'solicitarInfo':
			solicitarInfo();
			break;
			
		
		
			default:
			# code...
			break;
	}
	//Fin del isset
}

function solicitarInfo()
{
	$objUsuario = new Usuario();
	$idUsuario = $_POST['idUsuario'];
	$data = $objUsuario->getInfo($idUsuario);
	echo $data;
	
}


function ingresar()
	{
		$objUsuario = new Usuario();
		$data = $_POST['dataUsuario'];

		$dataDecode = json_decode($data);
		$objUsuario->setUsername($dataDecode[0]->value);
		$objUsuario->setPassword($dataDecode[1]->value);
		$res = $objUsuario->ingresar();
		$jsonRes = json_encode($res);
		echo $jsonRes;
		
	}

function eliminar()
{
	$info = $_POST["idUsuario"];
	$decodeInfo = json_decode($info);
	$objUsuario = new Usuario();
	

	$res = $objUsuario->eliminarUser($decodeInfo);

	$jsonRes = json_encode($res);

	echo $jsonRes;
}

function modificar()
{
	$info = $_POST['dataUsuario'];
	$decodeInfo = json_decode($info);

	$objUsuario = new Usuario();
	$objUsuario->setUsername($decodeInfo[1]->value);
	$objUsuario->setPassword($decodeInfo[2]->value);
	$objUsuario->setRol($decodeInfo[4]->value);
	$res = $objUsuario->editUser($decodeInfo[5]->value);
echo $res;

	
}

function getUser()
{
	$objUsuario = new Usuario();
	$idUsuario = $_POST['idUsuario'];
	$res = $objUsuario->getUser($idUsuario);
	echo $res;
}

function findUser()
{
	$objUsuario = new Usuario();
	$user = $_POST['codigo'];
	$res = $objUsuario->findUser($user);
	echo $res;
}

function agregar()
{
	$info = $_POST['dataUsuario'];
	$decodeInfo = json_decode($info);
	$objUsuario = new Usuario();
	$objUsuario->setUsername($decodeInfo[0]->value);
	$objUsuario->setPassword($decodeInfo[1]->value);
	$objUsuario->setEstado(1);
	$objUsuario->setRol($decodeInfo[3]->value);
	$res = $objUsuario->saveUser();
	echo $res;
}



 ?>