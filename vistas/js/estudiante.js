/*=============================================
SUBIENDO LA FOTO DEL ESTUDIANTE
=============================================*/
$(".nuevaFoto").change(function(){

	var imagen = this.files[0];
	
	/*=============================================
  	VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
  	=============================================*/

  	if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){

  		$(".nuevaFoto").val("");

		      alert("¡La imagen debe estar en formato JPG o PNG!");
		      
  	}else if(imagen["size"] > 2000000){

  		$(".nuevaFoto").val("");

  		 
		      alert("¡La imagen no debe pesar más de 2MB!");
		    

  	}else{

  		var datosImagen = new FileReader;
  		datosImagen.readAsDataURL(imagen);

  		$(datosImagen).on("load", function(event){

  			var rutaImagen = event.target.result;

  			$(".previsualizar").attr("src", rutaImagen);

  		})

  	}
})

/*=============================================
BOTON EDITAR ESTUDIANTE
=============================================*/
$(".tablas").on("click", ".btnEditarEstudiante", function(){

  var idEstudiante = $(this).attr("idEstudiante");

  window.location = "index.php?ruta=editar-estudiante&idEstudiante="+idEstudiante;


})

/*=============================================
ELIMINAR ESTUDIANTE
=============================================*/
$(".tablas").on("click", ".btnEliminarEstudiante", function(){
  

  var idEstudiante= $(this).attr("idEstudiante");
  var fotoEstudiante= $(this).attr("fotoEstudiante");
  var codigo= $(this).attr("codigo");

  swal({
    title: '¿Está seguro de borrar el estudiante?',
    text: "¡Si no lo está puede cancelar la accíón!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, borrar estudiante!'
  }).then(function(result){

    if(result.value){

      window.location = "index.php?ruta=estudiantes&idEstudiante="+idEstudiante+"&codigo="+codigo+"&fotoEstudiante="+fotoEstudiante;

    }

  })

})

