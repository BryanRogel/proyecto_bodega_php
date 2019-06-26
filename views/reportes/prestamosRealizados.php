<?php 
require_once '../../vendor/autoload.php';
require_once '../../model/Conexion.php';

		$sql = "SELECT * from v4_Persona";

		$con = conectar();
		$info = $con->query($sql);



		$html="<h3>PRESTAMOS REALIZADOS</h3>";
		$html.="<table border='1'>";
		$html.="<tr>
					<th>ID-PRESTAMO</th>
					<th>ID-PERSONA</th>
					<th>CODIGO</th>
					<th>FECHA</th>
					<th>CANTIDAD</th>
					<th>ID-HERRAMIENTA</th>
					<th>NOMBRE HERRAMIENTA</th>
					<th>ESTADO</th>
			   </tr>";
		foreach ($info as  $value) {
			
				$html.="<tr>
							<td>".$value['idPrestamo']."</td>
							<td>".$value['idPersona']."</td>
							<td>".$value['codigo']."</td>
							<td>".$value['fecha']."</td>
							<td>".$value['cantidad']."</td>
							<td>".$value['idHerramienta']."</td>
							<td>".$value['nombre']."</td>
							<td>".$value['estadoPrestamo']."</td>
						</tr>";	
		}

		$html.= "</table>";
		$mpdf = new \Mpdf\Mpdf();
        $html= utf8_encode($html);
        $mpdf->WriteHTML($html);
        $mpdf->Output();


 ?>