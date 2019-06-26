$(document).ready(function(){

			//Configuracion del data table
	 		$("#listadoCategorias").DataTable({
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
			//Evento click de nuevoUsuario
			$("#nuevaCategoria").on("click", function(){

				$("#modalIngresoCategoria").modal({backdrop: 'static',keyboard: false});

			});
			//Envio de la informacion
			$("#agregarCategoria").on("click", function(){

				if ($('#nombre').val()=="") 
				{
					swal("Error!", "Campo vacio!", "error");
                                    		$('#nombre').val('');
				}
				else
				{
					var dataCategoria = $('#nombre').val();


			       		$.ajax({

									type: 'POST',
									async: false,
									dataType: 'json',
									data: {dataCategoria: dataCategoria, key:'findUser'},
									url: "../controller/CategoriaController.php",
									success: function(data)
									{
										if(data.estado== false){
											swal("Error!", "Categoria ya existe!", "error");
                                    		$('#nombre').val('');
										}

										if (data.estado==true) 
							       		{
							       	$.ajax({

										type: 'POST',
										async: false,
										dataType: 'json',
										data: {dataCategoria: dataCategoria, key:'agregar'},
										url: "../controller/CategoriaController.php",
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
										},
										error: function(xhr, status)
										{

										}

									});
							       		
							       }
													},
													error: function(xhr, status)
													{

													}

							

						});

			       		
				
				}

				

				//Fin del click agregar usuario
			});

       	$("#nombre").on("change", function(){

       		var valor = $(this).val();
       		$.ajax({

						type: 'POST',
						async: false,
						dataType: 'json',
						data: {valor: valor, key:'findUser'},
						url: "../controller/CategoriaController.php",
						success: function(data)
						{
							if(data.estado== false){
								swal({
									title: "Error!",
									text: data.descripcion,
									timer: 1000,
									type: 'error', //puede ser success, info, error o warning.
									closeOnConfirm: true,
									closeOnCancel: true
								});
							}
						},
						error: function(xhr, status)
						{

						}

				});




       	});

		var id;

       		$(document).on("click", ".editarCategoria", function(){

				
					/*var dataCategoria = $('#nombre').val();*/
					id = $(this).attr("id");
					$.ajax({

						type: 'POST',
						dataType: 'json',
						data: {id: id, key:'getUser'},
						url: "../controller/CategoriaController.php",
						success: function(data)
						{
							$("#nombreEdit").val(data.nombre);
							$("#idCate").val(data.idCat);

							
						},
						error: function(xhr, status)
						{

						}

				});

					$("#modalModificacionCategoria").modal({backdrop: 'static',keyboard: false});
       			

			});




				$("#ModificarCategoria").on("click", function(){

				if ($('#nombreEdit').val()=="") 
				{
					swal("Error!", "Campo vacio!", "error");
                                    		$('#nombreEdit').val('');
				}
				else
				{

					var dataCategoria = $('#nombreEdit').val();


			       		$.ajax({

									type: 'POST',
									async: false,
									dataType: 'json',
									data: {dataCategoria: dataCategoria, key:'findUser'},
									url: "../controller/CategoriaController.php",
									success: function(data)
									{
										if(data.estado== false){
											swal("Error!", "Categoria ya existe!", "error");
                                    		$('#nombreEdit').val('');
										}

										if (data.estado==true) 
							       		{
							       		
							       			var dataCategoria= JSON.stringify($('#infoCategoriaEdit  :input').serializeArray());

													$.ajax({

														type: 'POST',
														dataType: 'json',
														data: {dataCategoria: dataCategoria,key:'modificar'},
														url: "../controller/CategoriaController.php",
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
														},
														error: function(xhr, status)
														{

														}

													});
							      		}
													},
													error: function(xhr, status)
													{

													}

							

						});
				}

					
       			

				});

				$(document).on("click", ".eliminarCategoria", function(){
       			$("#modalEliminarCategoria").modal({backdrop: 'static',keyboard: false});


       			 id= $(this).attr("id");
       			 
       			 $('#idEliminarCategoria').val(id);
       			

			});


				$('#btnEliminarCategoria').click(function() {

					var dataUsuario = JSON.stringify($('#eliminarCategoriaFrm  :input').serializeArray());
	       			$.ajax({

							type: 'POST',
							dataType: 'json',
							data: {id: id, key:'eliminar'},
							url: "../controller/CategoriaController.php",
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