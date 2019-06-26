<?php 
require_once '../../vendor/autoload.php';
require_once '../../model/Conexion.php';

		$sql = "SELECT h.id,h.nombre,h.codigo,h.marca,h.idCategoria,h.creacion,h.cantidad,c.nombre as nomCat from herramienta h INNER JOIN categoria c ON h.idCategoria=c.id WHERE h.estado=1";

		$con = conectar();
		$info = $con->query($sql);



		$html="<h3>HERRAMIENTAS</h3>";
		$html.="<table border='1'>";
		$html.="<tr>
					<th>ID-HERRAMIENTA</th>
					<th>NOMBRE</th>
					<th>CODIGO</th>					
					<th>MARCA</th>
					<th>ID-CATEGORIA</th>
					<th>NOMBRE CATEGORIA</th>
					<th>FECHA CREACION</th>
					<th>CANTIDAD</th>
			   </tr>";
		foreach ($info as  $value) {
			
				$html.="<tr>
							<td>".$value['id']."</td>							
							<td>".$value['nombre']."</td>
							<td>".$value['codigo']."</td>
							<td>".$value['marca']."</td>
							<td>".$value['idCategoria']."</td>
							<td>".$value['nomCat']."</td>
							<td>".$value['creacion']."</td>
							<td>".$value['cantidad']."</td>
						</tr>";	
		}

		$html.= "</table>";
		$mpdf = new \Mpdf\Mpdf();
        $html= utf8_encode($html);
        $mpdf->WriteHTML($html);
        $mpdf->Output();


 ?>