$(function(){
	var ENV_WEBROOT = "../";
	
	$(".btn-agregar-herramienta").off("click");
	$(".btn-agregar-herramienta").on("click", function(e) {
		var cantidad = $("#cantidad").val();
		var herramienta_id = $("#herramienta").val();
		var empleado = $("#cbo_empleado").val();
		if(herramienta_id!=0){
			if(cantidad!=0){
				if(empleado!=0){
						$.ajax({
							url: '../controller/PrestamoController.php?page=1',
							type: 'post',
							data: {'herramienta_id':herramienta_id, 'cantidad':cantidad, 'empleado':empleado},
							dataType: 'json',
							success: function(data) {
								if(data.success==true){
									$("#cantidad").load('detallePrestamo.php');
									$("#empleado").load('detallePrestamo.php');
									alertify.success(data.msj);
									$(".detalle-herramienta").load('detallePrestamo.php');
								}else{
									alertify.error(data.msj);
								}
							},
							error: function(jqXHR, textStatus, error) {
								alertify.error(error);
							}
						});
						}else{
					alertify.error('Ingrese un empleado');
				}			
			}else{
				alertify.error('Ingrese una cantidad');
			}
		}else{
			alertify.error('Seleccione una herramienta');
		}
	});
	
	$(".eliminar-herramienta").off("click");
	$(".eliminar-herramienta").on("click", function(e) {
		var id = $(this).attr("id");
		$.ajax({
			url: '../controller/PrestamoController.php?page=2',
			type: 'post',
			data: {'id':id},
			dataType: 'json',
		}).done(function(data){
			if(data.success==true){
				alertify.success(data.msj);
				$(".detalle-herramienta").load('detallePrestamo.php');
			}else{
				alertify.error(data.msj);
			}
		})
	});

	$(".guardar-prestamo").off("click");
	$(".guardar-prestamo").on("click", function(e) {
		$.ajax({
			url: '../controller/PrestamoController.php?page=3',
			type: 'post',
			dataType: 'json',
			success: function(data) {
			if(data.success==true){
				$("cantidad").val('');
				alertify.success(data.msj);
					$(".detalle-herramienta").load('detallePrestamo.php');

					//Para restablecer los select
					var select = $('#herramienta');
					select.val($('option:first', select).val());

					var select1 = $('#cbo_empleado');
					select1.val($('option:first', select1).val());

					var select1 = $('#cantidad');
					select2.val($('option:first', select2).val());


				}else{
					alertify.error(data.msj);
					}
				},
				error: function(jqXHR, textStatus, error) {
					alertify.error(error);
			}
		});				
	});



	$(".guardar-herramientaAsignada").off("click");
	$(".guardar-herramientaAsignada").on("click", function(e) {
		$.ajax({
			url: '../controller/PrestamoController.php?page=4',
			type: 'post',
			dataType: 'json',
			success: function(data) {
			if(data.success==true){
				$("cantidad").val('');
				alertify.success(data.msj);
					$(".detalle-herramienta").load('detallePrestamo.php');

					//Para restablecer los select
					var select = $('#herramienta');
					select.val($('option:first', select).val());

					var select1 = $('#cbo_empleado');
					select1.val($('option:first', select1).val());

					var select1 = $('#cantidad');
					select2.val($('option:first', select2).val());


				}else{
					alertify.error(data.msj);
					}
				},
				error: function(jqXHR, textStatus, error) {
					alertify.error(error);
			}
		});				
	});
	
});