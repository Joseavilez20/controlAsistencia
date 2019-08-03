<div class="jumbotron jumbotron-fluid h-auto mx-auto">
	<div class="container col-12 col-sm-3  bg-info p-3 text-light mx-auto">
		<h3 class="display-6 text-center ">Iniciar Sesión</h1>
		 <form method="POST">
		  <div class="form-group">
		    <label for="exampleInputEmail1">Usuario</label>
		    <input type="text" class="form-control" id="inputUser" name="inputUser" placeholder="Nombre de usuario">
		   
		  </div>
		  <div class="form-group">
		    <label for="inputPassword">Contraseña</label>
		    <input type="password" class="form-control" id="inputPassword" name="inputPassword" placeholder="Password">
		  </div>
		 
		  <button type="submit" class="btn btn-success w-100 ">iniciar</button>
		  <a class="btn btn-outline-warning mt-2 " href="recuperarCuenta" role="button">Olvide mi contraseña</a>
		  <?php

	        $login = new ControladorUsuarios();
	        $login -> ctrIngresoUsuario();
	        
	      ?>
		</form>
   
    </div>
 
</div>