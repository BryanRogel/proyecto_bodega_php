$(document).ready(function(){
  $.ajax({
    type: 'POST',
    url: '../model/cargarHerramientas.php'
  })
  .done(function(listas_rep){
    $('#herramienta').html(listas_rep)
  })
  .fail(function(){
    alert('Hubo un errror al cargar las herramientas')
  })

  $('#herramienta').on('change', function(){
    var id = $('#herramienta').val()
    $.ajax({
      type: 'POST',
      url: '../model/cargarCantidad.php',
      data: {'id': id}
    })
    .done(function(listas_rep){
      $('#cantidad').html(listas_rep)
    })
    .fail(function(){
      alert('Hubo un errror al cargar las cantidades')
    })
  })

})