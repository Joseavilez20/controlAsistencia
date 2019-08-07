
/*=============================================
VERIFICAR LOCALSTORAGE
=============================================*/

if(localStorage.getItem("capturarRango") != null){

   $('#daterange-btn span').html(localStorage.getItem("capturarRango"));
}
else{

  $('#daterange-btn span').html("<i class='fa fa-calendar'></i> Rango de fecha");
}


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
DATE RANGE PICKER
=============================================*/
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Hoy'       : [moment(), moment()],
          'Ayer'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Ultimos 7 Dias' : [moment().subtract(6, 'days'), moment()],
          'Ultimos 30 Dias': [moment().subtract(29, 'days'), moment()],
          'Este Mes'  : [moment().startOf('month'), moment().endOf('month')],
          'Ultimo Mes'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment(),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      
      var fechaInicial = start.format('YYYY-MM-DD');

      var fechaFinal = end.format('YYYY-MM-DD');

      var capturarRango = $('#daterange-btn span').html();

      localStorage.setItem("capturarRango", capturarRango);

      window.location = "index.php?ruta=asistencias&fechaInicial="+fechaInicial+"&fechaFinal="+fechaFinal;

      }
    )

 /*=============================================
CANCELAR DATE RANGE PICKER
=============================================*/

$(".ranges .range_inputs .cancelBtn").on("click" , function(){

  localStorage.removeItem("capturarRango");
  localStorage.clear();
  window.location = "asistencias";

})

/*=============================================
CAPTURAR HOY
=============================================*/

$(".ranges li").on("click", function(){

  var textHoy = $(this).attr("data-range-key");

  if(textHoy == "Hoy"){
    var d = new Date()
    var mes = d.getMonth()+1;
    var año = d.getFullYear();
    var dia = d.getDate();

    if(mes<10){
      mes = "0"+mes;
    }

    if(dia<10){
     dia = "0"+dia;
    }
    var fechaInicial = año+"-"+mes+"-"+dia;
    var fechaFinal = año+"-"+mes+"-"+dia;

    localStorage.setItem("capturarRango", "Hoy");

      window.location = "index.php?ruta=asistencias&fechaInicial="+fechaInicial+"&fechaFinal="+fechaFinal;


  }

})

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

