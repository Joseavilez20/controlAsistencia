
$("#btnRecovery").click(function(){

	var email= $("#inputEmail").val();


	var datos = new FormData();
	datos.append("generateKey", "");
	datos.append("email", email);

	 $.ajax({
	    url:"ajax/recovery.ajax.php",
	    method:"POST",
	    data: datos,
	    cache: false,
	    contentType: false,
	    processData: false,
	    dataType: "text",
	    success:function(respuesta){
	    	console.log("->"+respuesta);
	    	if(respuesta != ""){
	    			$("#msj-alert").html('<div class="alert alert-success mt-2" role="alert">'+
				 ' Se ha enviado un correo de recuperación '+
				'</div>');
	    		}else{
	    			$("#msj-alert").html('<div class="alert alert-danger mt-2" role="alert">'+
					 ' El correo proporcionado no es valido '+
					'</div>');

	    		}
	    

	    }, error:function(respuesta){
	    	console.log(respuesta);

	    	
	    }

	})
	

})


