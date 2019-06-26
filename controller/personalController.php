<?php 

	require_once '../model/Personal.php';


	if (isset($_POST['key'])) 
{
	$key = $_POST['key'];

	switch ($key) {
		case 'agregar':
		agregar();
		break;

		case 'solicitarInfo':
		solicitarInfo();
		break;

		case 'modificar':
		modificar();
		break;

		case 'eliminar':
		eliminar();
		break;

		case 'verificar':
		verificar();
		break;

		default:
				# code...
		break;
	}
}

function modificar()
{
	$data = $_POST['dataPersonal'];
	$dataDecode = json_decode($data);
	$objPersonal = new Personal();
	
	$objPersonal->setCodigo($dataDecode[0]->value);
	$objPersonal->setNombre($dataDecode[1]->value);
	$objPersonal->setApellido($dataDecode[2]->value);
	$objPersonal->setGenero($dataDecode[3]->value);
	$objPersonal->setEmail($dataDecode[4]->value);
	$objPersonal->setDireccion($dataDecode[5]->value);
	$objPersonal->setTelefono($dataDecode[6]->value);
	$objPersonal->setNacimiento($dataDecode[7]->value);
	$objPersonal->setIngreso($dataDecode[8]->value);
	$objPersonal->setEstado(1);
	$id = $dataDecode[9]->value;

	$data = $objPersonal->updatePersonal($dataDecode[9]->value);

	echo $data;


}

function agregar()
{
	$info = $_POST['dataPersona'];
	$dataDecode = json_decode($info);
	$objPersonal = new Personal();
	
	$objPersonal->setCodigo($dataDecode[0]->value);
	$objPersonal->setNombre($dataDecode[1]->value);
	$objPersonal->setApellido($dataDecode[2]->value);
	$objPersonal->setGenero($dataDecode[3]->value);
	$objPersonal->setEmail($dataDecode[4]->value);
	$objPersonal->setDireccion($dataDecode[5]->value);
	$objPersonal->setTelefono($dataDecode[6]->value);
	$objPersonal->setNacimiento($dataDecode[7]->value);
	$objPersonal->setIngreso($dataDecode[8]->value);
	$objPersonal->setEstado(1);
	$now = date('Y-m-d');
	$objPersonal->setFechaRegistro($now);

	
	$data = $objPersonal->savePersonal();
	echo $data;
}

function verificar()
{
	$data = $_POST['codigo'];
	$objPersonal = new Personal();
	$res = $objPersonal->verificar($data);
	echo $res;
}

function solicitarInfo()
{
	$objPersonal = new Personal();
	$idPersonal = $_POST['idPersonal'];
	$data = $objPersonal->getPersonal($idPersonal);
	echo $data;

}

function eliminar()
{
	$data = $_POST['idPersonal'];
	$dataDecode = json_decode($data);
	$objHerramienta = new Personal();
	$objHerramienta->setEstado(0);

	$data= $objHerramienta->deleteHerramienta($data);
	echo $data;
}

 ?>