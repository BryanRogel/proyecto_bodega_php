$(document).ready(function(){


$("#modificarUsuario").attr("disabled", "disabled");


			//Configuracion del data table
	 		$("#listadoUsuarios").DataTable({
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


$('#repasswordEdit').on('input', function(){
	var rePass = $(this).val();
	var pass = $('#passwordEdit').val();
	if (rePass==pass) 
	{
		$("#modificarUsuario").removeAttr("disabled");
	}
	else
	{
		$("#modificarUsuario").attr("disabled", "disabled");
	}
});


$('#repassword').on('input', function(){
	var rePass = $(this).val();
	var pass = $('#password').val();

	if (rePass==pass) 
	{
		$("#agregarUsuario").removeAttr("disabled");
	}

		

});


			//Evento click de nuevoUsuario
			$("#nuevoUsuario").on("click", function(){

				$("#modalIngresoUsuario").modal({backdrop: 'static',keyboard: false});
				$("#agregarUsuario").attr("disabled", "disabled");

			});
			//Envio de la informacion
			$("#agregarUsuario").on("click", function(){



				var dataUsuario = JSON.stringify($('#infoUsuario  :input').serializeArray());
				$.ajax({

						type: 'POST',
						async: false,
						dataType: 'json',
						data: {dataUsuario: dataUsuario, key:'agregar'},
						url: "../controller/usuarioController.php",
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

				//Fin del click agregar Usuario
			});

       	


/*Edicion Usuario*/
	$(document).on("click",".editarUsuario",  function(){   

		var idUsuario = $(this).attr('id');
		$("#usernameEdit").attr("disabled", "disabled");

			$.ajax({
                                    type: 'POST',
                                    async: false,
                                    dataType: 'json',
                                    data: {idUsuario:idUsuario, key:'solicitarInfo'},
                                    url: "../controller/usuarioController.php",
                                    success: function (data)
                                    {
                                      $("#usernameEdit").val(data.username);

                                      $('#idUsuarioEdit').val(idUsuario);
                                      $("#rolEdit option[value="+ data.rol_id +"]").attr("selected",true);

                                        
                                    },
                                    error: function (xhr, status)
                                    {
                      
                                    }
                                        
                       });
             

          $("#modalModificacionUsuario").modal({backdrop: 'static',keyboard: false});
    });



     $("#modificarUsuario").on("click", function(){
     	
     $("#usernameEdit").removeAttr("disabled");


     var dataUsuario=  JSON.stringify($('#infoUsuarioEdit :input').serializeArray());

        $.ajax({
                                    type: 'POST',
                                    async: false,
                                    dataType: 'json',
                                    data: {dataUsuario:dataUsuario, key:'modificar'},
                                    url: "../controller/usuarioController.php",
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

/*FIN Edicion Usuario*/
 

/*ELIMINAR Usuario*/

$(document).on('click','.eliminarUsuario', function(){

	var idUsuario = $(this).attr('id');

swal({
  title: "Esta Seguro?",
  text: "Se borrará el Usuario!",
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
                                    data: {idUsuario:idUsuario, key:'eliminar'},
                                    url: "../controller/UsuarioController.php",
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
                                    url: "../controller/UsuarioController.php",
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



$('#username').on('change', function(){

	var codigo = $(this).val();

		$.ajax({
                                    type: 'POST',
                                    async: false,
                                    dataType: 'json',
                                    data: {codigo:codigo, key:'findUser'},
                                    url: "../controller/usuarioController.php",
                                    success: function (data)
                                    {
                                    	if (data.estado==false) 
                                    	{
                                    		swal("Error!", "Usuario ya existe!", "error");
                                    		$('#username').val('');
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