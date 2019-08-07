<?php if(isset($_GET["key"])  &&  isset($_GET["id"])){

	if($_GET["id"] != "" &&  $_GET["key"] != ""){

		$encriptar = crypt($_GET["key"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
					
		$item = "key_recovery";
		$valor = $encriptar;
		$tabla = "usuarios";

				
		$respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item, $valor);
		 

		 if($respuesta == null || $respuesta["id"] != $_GET["id"]){
		 	 echo '<script>
				window.location = "login";
	   		</script>';

		 }


	}else{
		echo '<script>
			window.location = "login";
   		</script>';
	}

	
   
  
}else{
	echo '<script>
			window.location = "login";
   		</script>';
}

 
?>
<div class="jumbotron jumbotron-fluid h-auto mx-auto">
	<div class="container col-12 col-sm-3 bg-info p-3 text-light mx-auto">
		<h3 class="display-6 text-center ">Nueva contraseña</h3>
		 <form method="POST">
		  <div class="form-group">
		  
		    <input type="password" class="form-control" id="inputNewPassword" name="inputNewPassword" placeholder="Nueva contraseña">
		   
		  </div>
		  <div class="form-group">
		    
		    <input type="password" class="form-control" id="inputAgainPassword" name="inputAgainPassword" placeholder="Escriba nuevamente la contraseña">
		  </div>
		 
		  <button type="submit" class="btn btn-success w-100 ">Guardar</button>

		  <?php

	        $cambiar = new ControladorRecuperacion();
	        $cambiar -> ctrCambiarCredenciales();
	        
	      ?>
		</form>
   
    </div>
 
</div>