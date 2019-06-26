$(document).ready(function(){

			//Configuracion del data table
	 		$("#listado").DataTable({
			    "language": {
			        "sProcessing":    "Procesando...",
			        "sLengthMenu":    "Mostrar _MENU_ registros",
			        "sZeroRecords":   "No se encontraron resultados",
			        "sEmptyTable":    "Ningún dato disponible en esta tabla",
			        "sInfo":          "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
			        "sInfoEmpty":     "Mostrando registros del 0 al 0 de un total de 0 registros",
			        "sInfoFiltered":  "(filtrado de un total de _MAX_ registros)",
			        "sInfoPostFix":   "",
			        "sSearch":        "Buscar:",
			        "sUrl":           "",
			        "sInfoThousands":  ",",
			        "sLoadingRecords": "Cargando...",
			        "oPaginate": {
			            "sFirst":    "Primero",
			            "sLast":    "Último",
			            "sNext":    "Siguiente",
			            "sPrevious": "Anterior"
			        },
			        "oAria": {
			            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
			            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
			        }
			    }
			    //fin de la configuracion del data table
			});

			$(document).on("click", ".prestamo", function(){
				$("#modalPrestamo").modal({backdrop: 'static',keyboard: false});


       			 idUsuario = $(this).attr("id");
       			 
       			 $('#idPrestar').val(idUsuario);
       			

			});


				$('#btnPrestar').click(function() {

					var dataUsuario = JSON.stringify($('#PrestarFrm  :input').serializeArray());
	       			$.ajax({

							type: 'POST',
							dataType: 'json',
							data: {idUsuario: idUsuario, key:'prestar'},
							url: "../controller/HerramientaAsignadaController.php",
							success: function(data)
							{
								
								if(data.estado== true){
								swal({
									title: "Exito!",
									text: data.descripcion,
									timer: 1000,
									type: 'success', //puede ser success, info, error o warning.
									closeOnConfirm: true,
									closeOnCancel: true
								});
								setTimeout(function(){
									location.reload();
								},1000);
							}
								
							}

					});

				});



			
				$(document).on("click", ".devolverPrestamo", function(){
				$("#modalDevolverPrestamo").modal({backdrop: 'static',keyboard: false});


       			 idUsuario = $(this).attr("id");
       			 
       			 $('#idDevolver').val(idUsuario);
       			

			});


				$('#btnDevolver').click(function() {

					var dataUsuario = JSON.stringify($('#DevolverPrestamoFrm  :input').serializeArray());
	       			$.ajax({

							type: 'POST',
							dataType: 'json',
							data: {idUsuario: idUsuario, key:'devolver'},
							url: "../controller/HerramientaAsignadaController.php",
							success: function(data)
							{
								
								if(data.estado== true){
								swal({
									title: "Exito!",
									text: data.descripcion,
									timer: 1000,
									type: 'success', //puede ser success, info, error o warning.
									closeOnConfirm: true,
									closeOnCancel: true
								});
								setTimeout(function(){
									location.reload();
								},1000);
							}
								
							}

					});

				});



				$(document).on("click", ".eliminar", function(){
				


       			 var idUsuario = $(this).attr("id");
       			 
       			 /*$('#idDevolverPrestamo').val(idUsuario);*/

       			 $.ajax({

							type: 'POST',
							dataType: 'json',
							data: {idUsuario: idUsuario, key:'consult'},
							url: "../controller/HerramientaAsignadaController.php",
							success: function(data)
							{
								
								$("#idCantidadDev").val(data.cantidad);
								$('#idPrestamoDev').val(data.idPrestamo);
								$('#idHerramientaDev').val(data.idHerramienta);
								$('#idUserDev').val(idUsuario);
							
								$("#modalEliminarPrestamo").modal({backdrop: 'static',keyboard: false});
							}
							

							
							

					});

       			 
		       		
			});


				$('#btnEliminar').click(function() {

					//Aqui ya van los datos 

					var dataUsuario = JSON.stringify($('.infoPrestamo :input').serializeArray());

	       			$.ajax({

							type: 'POST',
							dataType: 'json',
							data: {dataUsuario: dataUsuario, key:'eliminar'},
							url: "../controller/HerramientaAsignadaController.php",
							success: function(data)
							{
								
								if(data.estado== true){
								swal({
									title: "Exito!",
									text: data.descripcion,
									timer: 1000,
									type: 'success', //puede ser success, info, error o warning.
									closeOnConfirm: true,
									closeOnCancel: true
								});
								setTimeout(function(){
									location.reload();
								},1000);
							}
								
							}

					});



					});
			//fin del document ready
});