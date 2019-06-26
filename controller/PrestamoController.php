<?php
session_start();
if(isset($_GET["page"])){
	$page=$_GET["page"];
}else{
	$page=0;
}

require_once '../model/Conexion.php';
require_once '../model/Prestamo.php';

switch($page){

	case 1:
		$objPrestamo = new Prestamo();

		$json = array();
		$json['msj'] = 'Herramienta Agregada';
		$json['success'] = true;
	
		if (isset($_POST['herramienta_id']) && $_POST['herramienta_id']!='' && isset($_POST['cantidad']) && $_POST['cantidad']!='' && isset($_POST['empleado']) && $_POST['empleado']!='') {
			try {
				$cantidad = $_POST['cantidad'];
				$herramienta_id = $_POST['herramienta_id'];
				$empleado = $_POST['empleado'];
				
				$resultado_prestamo = $objPrestamo->getById($herramienta_id);
				$prestamo = $resultado_prestamo->fetchObject();
				$nombre = $prestamo->nombre;
				
				$_SESSION['detalle'][$herramienta_id] = array('id'=>$herramienta_id, 'herramienta'=>$nombre, 'cantidad'=>$cantidad, 'empleado'=>$empleado);

				$json['success'] = true;

				echo json_encode($json);
	
			} catch (PDOException $e) {
				$json['msj'] = $e->getMessage();
				$json['success'] = false;
				echo json_encode($json);
			}
		}else{
			$json['msj'] = 'Ingrese una herramienta y/o ingrese cantidad';
			$json['success'] = false;
			echo json_encode($json);
		}
		break;

	case 2:
		$json = array();
		$json['msj'] = 'Herramienta eliminada';
		$json['success'] = true;
	
		if (isset($_POST['id'])) {
			try {
				unset($_SESSION['detalle'][$_POST['id']]);
				$json['success'] = true;
	
				echo json_encode($json);
	
			} catch (PDOException $e) {
				$json['msj'] = $e->getMessage();
				$json['success'] = false;
				echo json_encode($json);
			}
		}
		break;
		
	case 3:
		$objPrestamo = new Prestamo();
		$json = array();
		$json['msj'] = 'Guardado correctamente';
		$json['success'] = true;
	
		if (count($_SESSION['detalle'])>0) {
			try {
				foreach ($_SESSION['detalle'] as $detalle):
					$empleado = $detalle['empleado'];
				endforeach;
				$objPrestamo->guardarPrestamo($empleado);
				$registro = $objPrestamo->ultimaPrestamo();
				$resultado = $registro->fetchObject();
				$idprestamo = $resultado->ultimo;

				foreach ($_SESSION['detalle'] as $detalle):

					$idherramienta = $detalle['id'];
					$cantidad = $detalle['cantidad'];
					$objPrestamo->guardarDetallePrestamo($idprestamo, $idherramienta, $cantidad);
					$objPrestamo->actualizarCantidadHerramienta($idprestamo, $idherramienta, $cantidad);	
				endforeach;

				$_SESSION['detalle'] = array();

				$json['success'] = true;

				echo json_encode($json);
	
			} catch (PDOException $e) {
				$json['msj'] = $e->getMessage();
				$json['success'] = false;
				echo json_encode($json);
			}
		}else{
			$json['msj'] = 'No hay herramientas agregados';
			$json['success'] = false;
			echo json_encode($json);
		}
		break;


		case 4:
		$objPrestamo = new Prestamo();
		$json = array();
		$json['msj'] = 'Guardado correctamente';
		$json['success'] = true;
	
		if (count($_SESSION['detalle'])>0) {
			try {
				foreach ($_SESSION['detalle'] as $detalle):
					$empleado = $detalle['empleado'];
				endforeach;
				$objPrestamo->guardarHerramientaAsignada($empleado);
				$registro = $objPrestamo->ultimaPrestamo();
				$resultado = $registro->fetchObject();
				$idprestamo = $resultado->ultimo;

				foreach ($_SESSION['detalle'] as $detalle):

					$idherramienta = $detalle['id'];
					$cantidad = $detalle['cantidad'];
					$objPrestamo->guardarDetalleHerramientaAsignada($idprestamo, $idherramienta, $cantidad);
					$objPrestamo->actualizarCantidadHerramienta($idprestamo, $idherramienta, $cantidad);	
				endforeach;

				$_SESSION['detalle'] = array();

				$json['success'] = true;

				echo json_encode($json);
	
			} catch (PDOException $e) {
				$json['msj'] = $e->getMessage();
				$json['success'] = false;
				echo json_encode($json);
			}
		}else{
			$json['msj'] = 'No hay herramientas agregados';
			$json['success'] = false;
			echo json_encode($json);
		}
		break;
}
?>

