<?php 
require_once '../../vendor/autoload.php';
require_once '../../model/Conexion.php';

		$sql = "SELECT * from v1_Persona";

		$con = conectar();
		$info = $con->query($sql);



		$html="<h3>PRESTAMOS DEVUELTOS</h3>";
		$html.="<table border='1'>";
		$html.="<tr>
					<th>ID-PRESTAMO</th>
					<th>CODIGO</th>
					<th>NOMBRE</th>
					<th>APELLIDO</th>
					<th>DEVOLUCION</th>
					<th>CANTIDAD</th>
					<th>NOMBRE HERRAMIENTA</th>
					<th>ESTADO</th>
			   </tr>";
		foreach ($info as  $value) {
			
				$html.="<tr>
							<td>".$value['idPrestamo']."</td>
							<td>".$value['codigo']."</td>
							<td>".$value['nombrePersonal']."</td>
							<td>".$value['apellido']."</td>
							<td>".$value['devolucion']."</td>
							<td>".$value['cantidad']."</td>
							<td>".$value['nombreHerramienta']."</td>
							<td>".$value['estadoPrestamo']."</td>
						</tr>";	
		}

		$html.= "</table>";
		$mpdf = new \Mpdf\Mpdf();
        $html= utf8_encode($html);
        $mpdf->WriteHTML($html);
        $mpdf->Output();


 ?>