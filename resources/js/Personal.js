$(document).ready(function(){

	$('#codigo').mask("9999", {placeholder: 'xxxx'});
	$("#telefono").mask("9999-9999", {placeholder: "xxxx-xxxx"});
  $("#telefonoEdit").mask("9999-9999", {placeholder: "xxxx-xxxx"});




			//Configuracion del data table
	 		$("#listadoPersonal").DataTable({
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





			//Evento click de nuevoPersonal
			$("#nuevaPersonal").on("click", function(){

				$("#modalNuevaPersonal").modal({backdrop: 'static',keyboard: false});

			});
			//Envio de la informacion
			$("#agregarPersonal").on("click", function(){

       /* if ($('#codigo').val()=="") 
        {
          $('#fcodigo').addClass("has-error");
        }*/



				var dataPersona = JSON.stringify($('#infoPersonal  :input').serializeArray());

       
				$.ajax({

						type: 'POST',
						async: false,
						dataType: 'json',
						data: {dataPersona: dataPersona, key:'agregar'},
						url: "../controller/personalController.php",
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
							else{
								if(data.estado== false){
								
								swal({
									title: "Error!",
									text: data.descripcion,
									timer: 1000,
									type: 'error', //puede ser success, info, error o warning.
									closeOnConfirm: true,
									closeOnCancel: true
								});
								setTimeout(function(){
									
								},1000);
							}
							}
						},
						error: function(xhr, status)
						{

						}

				});

				//Fin del click agregar Personal
			});

       	


/*Edicion Personal*/
	$(document).on("click",".editarPersonal",  function(){   

		var idPersonal = $(this).attr('id');


			$.ajax({
                                    type: 'POST',
                                    async: false,
                                    dataType: 'json',
                                    data: {idPersonal:idPersonal, key:'solicitarInfo'},
                                    url: "../controller/PersonalController.php",
                                    success: function (data)
                                    {
                                      $("#idPersonalEdit").val(idPersonal);
                                       $("#nombreEdit").val(data.nombre);
                                       $("#apellidoEdit").val(data.apellido);
                                       $("#codigoEdit").val(data.codigo).prop('disabled', true);
                                       $("input[name=customRadioInline1][value=" + data.genero + "]").attr('checked', 'checked');
                                       $("#emailEdit").val(data.email);
                                       $("#direccionEdit").val(data.direccion);
                                       $("#telefonoEdit").val(data.telefono);
                                       $("#nacimientoEdit").val(data.nacimiento);
                                       $("#ingresoEdit").val(data.ingreso); 

                                        
                                    },
                                    error: function (xhr, status)
                                    {
                      
                                    }
                                        
                       });
             

          $("#modalModificacionPersonal").modal({backdrop: 'static',keyboard: false});
    });



     $("#editarPersonal").on("click", function(){
     $("#codigoEdit").removeAttr("disabled");


     var dataPersonal=  JSON.stringify($('#infoPersonalEdit :input').serializeArray());

        $.ajax({
                                    type: 'POST',
                                    async: false,
                                    dataType: 'json',
                                    data: {dataPersonal:dataPersonal, key:'modificar'},
                                    url: "../controller/PersonalController.php",
                                    success: function (data)
                                    {
                                        if(data.estado== true)
                                        {
								
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
											}else{
                                            swal({
                                                  title: "Error!",
                                                  text: data.descripcion,
                                                  timer: 1500,
                                                  type: 'error',
                                                  closeOnConfirm: true,
                                                          closeOnCancel: true
                                                });
                                        }
                                         
                                        
                                    },
                                    error: function (xhr, status)
                                    {
                      
                                    }
                                        
                       });



  			});

/*FIN Edicion Personal*/
 

/*ELIMINAR Usuario*/

$(document).on('click','.eliminarPersonal', function(){

	var idPersonal = $(this).attr('id');

swal({
  title: "Esta Seguro?",
  text: "Se borrará la Persona!",
  type: "warning",
  showCancelButton: true,
  confirmButtonClass: "btn-danger",
  confirmButtonText: "Si, estoy seguro!",
  closeOnConfirm: false,
  cancelButtonText: "Cancelar"
},
function(){
  swal("Eliminado!", "El campo se eliminó correctamente.", "success");
  					$.ajax({
                                    type: 'POST',
                                    async: false,
                                    dataType: 'json',
                                    data: {idPersonal:idPersonal, key:'eliminar'},
                                    url: "../controller/PersonalController.php",
                                    success: function (data)
                                    {
                                    	location.reload();
                                    },
                                    error: function (xhr, status)
                                    {
                      
                                    }
                                        
                       });


});
	

});

$('#codigoEdit').on('change', function(){

	var codigo = $(this).val();

		$.ajax({
                                    type: 'POST',
                                    async: false,
                                    dataType: 'json',
                                    data: {codigo:codigo, key:'verificar'},
                                    url: "../controller/personalController.php",
                                    success: function (data)
                                    {
                                    	if (data.estado==false) 
                                    	{
                                    		swal("Error!", "Codigo ya existe!", "error");
                                    		$('#codigoEdit').val('');
                                    	}
                                    	else
                                    	{
                                    		if (data.estado==true) 
                                    		{

                                    		}
                                    	}

                                    	
                                    },
                                    error: function (xhr, status)
                                    {
                      					
                                    }
                                        
                       });

});



$('#codigo').on('change', function(){

	var codigo = $(this).val();

		$.ajax({
                                    type: 'POST',
                                    async: false,
                                    dataType: 'json',
                                    data: {codigo:codigo, key:'verificar'},
                                    url: "../controller/personalController.php",
                                    success: function (data)
                                    {
                                    	if (data.estado==false) 
                                    	{
                                    		swal("Error!", "Codigo ya existe!", "error");
                                    		$('#codigo').val('');
                                    	}
                                    	else
                                    	{
                                    		if (data.estado==true) 
                                    		{

                                    		}
                                    	}

                                    	
                                    },
                                    error: function (xhr, status)
                                    {
                      					
                                    }
                                        
                       });

});


 



			//fin del document ready
});