<?php 

require_once '../model/Herramienta.php';



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

		default:
				# code...
		break;
	}
}

function solicitarInfo()
{
	$objHerramienta = new Herramienta();
	$idHerramienta = $_POST['idHerramienta'];
	$data = $objHerramienta->getCategoria($idHerramienta);
	echo $data;
	

}


function agregar()
{
	$info = $_POST['dataHerramienta'];
	$dataDecode = json_decode($info);
	$objHerramienta = new Herramienta();
	$objHerramienta->setNombre($dataDecode[0]->value);
	$objHerramienta->setCodigo($dataDecode[1]->value);
	$objHerramienta->setMarca($dataDecode[2]->value);
	$objHerramienta->setIdCategoria($dataDecode[3]->value);
	$objHerramienta->setCantidad($dataDecode[4]->value);
	$objHerramienta->setEstado(1);
	$data = $objHerramienta->saveHerramienta();

	echo $data;

}

function modificar()
{
	$data = $_POST['dataHerramienta'];
	$dataDecode = json_decode($data);
	$objHerramienta = new Herramienta();
	$objHerramienta->setNombre($dataDecode[0]->value);
	$objHerramienta->setCodigo($dataDecode[1]->value);
	$objHerramienta->setMarca($dataDecode[2]->value);
	$objHerramienta->setIdCategoria($dataDecode[3]->value);
	$objHerramienta->setCantidad($dataDecode[4]->value);

	$data = $objHerramienta->updateHerramienta($dataDecode[5]->value);
	echo $data;

}

function eliminar()
{
	$data = $_POST['idHerramienta'];
	$dataDecode = json_decode($data);
	$objHerramienta = new Herramienta();
	$objHerramienta->setEstado(0);

	$data= $objHerramienta->deleteHerramienta($data);
	echo $data;
}




?>