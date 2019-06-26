$(function(){
	var ENV_WEBROOT = "../";
	
	$(".btn-agregar-herramienta").off("click");
	$(".btn-agregar-herramienta").on("click", function(e) {
		var cantidad = $("#txt_cantidad").val();
		var herramienta_id = $("#cbo_herramienta").val();
		if(herramienta_id!=0){
			if(cantidad!=''){
				$.ajax({
					url: 'Controller/herramientasController.php?page=1',
					type: 'post',
					data: {'herramienta_id':herramienta_id, 'cantidad':cantidad},
					dataType: 'json',
					success: function(data) {
						if(data.success==true){
							$("#txt_cantidad").val('');
							alertify.success(data.msj);
							$(".detalle-herramienta").load('detalle.php');
						}else{
							alertify.error(data.msj);
						}
					},
					error: function(jqXHR, textStatus, error) {
						alertify.error(error);
					}
				});				
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
			url: 'Controller/HerramientaController.php?page=2',
			type: 'post',
			data: {'id':id},
			dataType: 'json'
		}).done(function(data){
			if(data.success==true){
				alertify.success(data.msj);
				$(".detalle-herramientaherramienta").load('detalle.php');
			}else{
				alertify.error(data.msj);
			}
		})
	});

	$(".guardar-prestamo").off("click");
	$(".guardar-prestamo").on("click", function(e) {
		$.ajax({
			url: 'Controller/HerramientaController.php?page=3',
			type: 'post',
			dataType: 'json',
			success: function(data) {
			if(data.success==true){
				$("#txt_cantidad").val('');
				alertify.success(data.msj);
					$(".detalle-herramienta").load('detalle.php');
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