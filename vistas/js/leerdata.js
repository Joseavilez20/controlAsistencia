
var myInterval;
$("#btnSincronizar").click(function(){


	myInterval = setInterval(
	$.fn.readData,
	1500);

})


$.fn.readData = function(){ 
	var content="";
	content= '<button class="btn btn-primary" id="btnLoading" type="button" disabled>'+
                  '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>'+
                  'Esperando a que pase la tarjeta por el lector...'+
                '</button>';
       $( "span.btnStatus" ).html(content);

	
	var data = "hola";
   var datos = new FormData();
   datos.append("readData", data);

   $.ajax({

		url:"ajax/data.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "text",
		success: function(respuesta){

			
			content = "";
			if(respuesta != ""){

				$( "span.btnStatus" ).html(content);
			
			
				$("#inputCode").val(respuesta);
				
				$.fn.myStopInterval(myInterval);
			}
			
		

		},
		error: function(a){
			console.log("error:"+a);
		}

	});
	 
      
 }


  $.fn.myStopInterval = function(myInterval) {

  clearInterval(myInterval);
}