<?php 
@session_start();
?>
<?php if(count($_SESSION['detalle'])>0){?>
	<table class="table">
	    <thead>
	        <tr>
	            <th>Nombre</th>
	            <th>Cantidad</th>
	            <th></th>
	        </tr>
	    </thead>
	    <tbody>
	    	<?php 
	    	$total = 0;
	    	foreach($_SESSION['detalle'] as $k => $detalle){ 
			$total += $detalle['cantidad'];
	    	?> 
	        <tr>
	        	<td><?php echo $detalle['herramienta'];?></td>
	            <td><?php echo $detalle['cantidad'];?></td>

	            <td><button type="button" class="btn btn-sm btn-danger eliminar-herramienta" id="<?php echo $detalle['id'];?>">Eliminar</button></td>
	        </tr>
	        <?php }?>
	        <tr>
	        	<td colspan="3" class="text-right">Total</td>
	        	<td><?php echo $total;?></td>
	        	<td></td>
	        </tr>
	    </tbody>
	</table>
<?php }else{?>
<div class="panel-body">No hay herramientas agregadas</div>
<?php }?>

<script type="text/javascript" src="../libs/js/ajaxPrestamo.js"></script>