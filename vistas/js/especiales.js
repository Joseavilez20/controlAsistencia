$(document).ready(function() {
var myInterval;
	
 $("#btnSincronizar").click(function(){

    myInterval = setInterval(
	$.fn.readData,
	1000);



})


$.fn.readData = function(){ 
	var content;
	jQuery.get('datos.txt', function(data) {
	 content= '<button class="btn btn-primary" id="btnLoading" type="button" disabled>'+
                  '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>'+
                  'Esperando a que pase la tarjeta por el lector...'+
                '</button>';
       $( "span.btnStatus" ).html(content);

		if(data!=""){
			
			content = "";
			$("#inputCode").val(data);
			$( "span.btnStatus" ).html(content);
			$.fn.myStopInterval(myInterval);

			
			
		}
   
	});	 

      
 }

 $.fn.myStopInterval = function(myInterval) {

  clearInterval(myInterval);
}

 
});





