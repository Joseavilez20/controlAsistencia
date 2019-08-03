$(document).ready( function () {
    $('#table_id').DataTable({

"language":{
    "decimal":        "",
    "emptyTable":     "No hay datos disponibles",
    "info":           "Mostrando _START_ a _END_ de _TOTAL_ entradas",
    "infoEmpty":      "Mostrando 0 a 0 de 0 entradas",
    "infoFiltered":   "(filtrado de _MAX_ total entradas)",
    "infoPostFix":    "",
    "thousands":      ",",
    "lengthMenu":     "Mostrar _MENU_ entradas",
    "loadingRecords": "Cargando...",
    "processing":     "Procesando...",
    "search":         "Buscar:",
    "zeroRecords":    "No se encontraron coincidencias",
    "paginate": {
        "first":      "Primero",
        "last":       "Ultimo",
        "next":       "Proximo",
        "previous":   "Anterior"
    },
    "aria": {
        "sortAscending":  ": activate to sort column ascending",
        "sortDescending": ": activate to sort column descending"
    
}
}
    });
} );

/*=============================================
ELIMINAR ASISTENCIA
=============================================*/
$(".table").on("click", ".btnEliminarAsistencia", function(){
  

  var idAsistencia= $(this).attr("idAsistencia");
  var fotoEstudiante= $(this).attr("fotoEstudiante");
  var codigo= $(this).attr("codigo");

  swal({
    title: '¿Está seguro de borrar la asistencia?',
    text: "¡Si no lo está puede cancelar la accíón!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, borrar asistencia!'
  }).then(function(result){

    if(result.value){

      window.location = "index.php?ruta=asistencias&idAsistencia="+idAsistencia+"&codigo="+codigo+"&fotoEstudiante="+fotoEstudiante;

    }

  })

})