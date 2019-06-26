$(document).ready(function(){

			//Configuracion del data table
	 		$("#listadoHistorial").DataTable({
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
							url: "../controller/HistorialController.php",
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