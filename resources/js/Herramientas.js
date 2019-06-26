$(document).ready(function(){

			//Configuracion del data table
	 		$("#listadoHerramientas").DataTable({
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

$("#codigo").mask("9999", {placeholder: "xx xx"});



			//Evento click de nuevoHerramienta
			$("#nuevaHerramienta").on("click", function(){

				$("#modalNuevaHerramienta").modal({backdrop: 'static',keyboard: false});

			});
			//Envio de la informacion
			$("#agregarHerramienta").on("click", function(){

				var dataHerramienta = JSON.stringify($('#infoHerramienta  :input').serializeArray());
				$.ajax({

						type: 'POST',
						async: false,
						dataType: 'json',
						data: {dataHerramienta: dataHerramienta, key:'agregar'},
						url: "../controller/herramientasController.php",
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

				//Fin del click agregar Herramienta
			});

       	


/*Edicion Herramienta*/
	$(document).on("click",".editarHerramienta",  function(){   

		var idHerramienta = $(this).attr('id');


			$.ajax({
                                    type: 'POST',
                                    async: false,
                                    dataType: 'json',
                                    data: {idHerramienta:idHerramienta, key:'solicitarInfo'},
                                    url: "../controller/herramientasController.php",
                                    success: function (data)
                                    {
                                      $("#idHerramientaEdit").val(idHerramienta);
                                       $("#nombreEdit").val(data.nombre);
                                       $("#codigoEdit").val(data.codigo);
                                       $("#marcaEdit").val(data.marca);
                                       $("#cantidadEdit").val(data.cantidad);
                                   



										$("#categoriaEdit option[value="+ data.categoria +"]").attr("selected",true);


                                         
                                        
                                    },
                                    error: function (xhr, status)
                                    {
                      
                                    }
                                        
                       });
             

          $("#modalModificacionHerramienta").modal({backdrop: 'static',keyboard: false});
    });



     $("#editarHerramienta").on("click", function(){

     var dataHerramienta=  JSON.stringify($('#infoHerramientaEdit :input').serializeArray());
    

        $.ajax({
                                    type: 'POST',
                                    async: false,
                                    dataType: 'json',
                                    data: {dataHerramienta:dataHerramienta, key:'modificar'},
                                    url: "../controller/herramientasController.php",
                                    success: function (data)
                                    {
                                        if (data.estado==true) {
                                          swal({
                                                  title: "Exito!",
                                                  text: data.descripcion,
                                                  timer: 1500,
                                                  type: 'success',
                                                  closeOnConfirm: true,
                                                          closeOnCancel: true
                                                });
                                          setTimeout( function(){ 
                                              location.reload();
                                          }, 1000 );
                                          
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

/*FIN Edicion Herramienta*/
 

/*ELIMINAR Usuario*/

$(document).on('click','.eliminarHerramienta', function(){

	var idHerramienta = $(this).attr('id');

swal({
 title: "Esta Seguro?",
  text: "Se borrará la Herramienta!",
  type: "warning",
  showCancelButton: true,
  confirmButtonClass: "btn-danger",
  confirmButtonText: "Si, estoy seguro!",
  closeOnConfirm: false,
  cancelButtonText: "Cancelar"
},
function(){
  swal("Eliminada!", "Se borró la Herramienta.", "success");
  					$.ajax({
                                    type: 'POST',
                                    async: false,
                                    dataType: 'json',
                                    data: {idHerramienta:idHerramienta, key:'eliminar'},
                                    url: "../controller/herramientasController.php",
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


			//fin del document ready
});