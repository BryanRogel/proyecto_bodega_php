<?php 
require_once '../../vendor/autoload.php';
require_once '../../model/Conexion.php';

		$sql = "SELECT * from personal WHERE estado=1";

		$con = conectar();
		$info = $con->query($sql);



		$html="<h3>EMPLEADOS ACTIVOS</h3>";
		$html.="<table border='1'>";
		$html.="<tr>
					<th>ID-EMPLEADO</th>
					<th>CODIGO</th>
					<th>NOMBRE</th>
					<th>APELLIDO</th>
					<th>TELEFONO</th>
					<th>FECHA INGRESO</th>
					<th>FECHA REGISTRO</th>
					<th>GENERO</th>
			   </tr>";
		foreach ($info as  $value) {
			
				$html.="<tr>
							<td>".$value['id']."</td>
							<td>".$value['codigo']."</td>
							<td>".$value['nombre']."</td>
							<td>".$value['apellido']."</td>
							<td>".$value['telefono']."</td>
							<td>".$value['ingreso']."</td>
							<td>".$value['fecha_registro']."</td>
							<td>".$value['genero']."</td>
						</tr>";	
		}

		$html.= "</table>";
		$mpdf = new \Mpdf\Mpdf();
        $html= utf8_encode($html);
        $mpdf->WriteHTML($html);
        $mpdf->Output();


 ?>