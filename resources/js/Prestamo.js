$(document).ready(function(){

	$("#busqueda").on('input', function(){
		var s = $("#busqueda").val();
		$.ajax({

						type: 'POST',
						async: false,
						dataType: 'json',
						data: {s:s, key:'buscar'},
						url: "../controller/prestamoController.php",
						success: function(data)
						{
							alert(data);
						},
						error: function(xhr, status)
						{

						}

				});

				//Fin de campo BUSQUEDA
	});
});