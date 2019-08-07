
	<!--div class="h-100" style="background-image: url(vistas/img/fondoColegio.jpg); background-repeat: no-repeat; background-position: center; background-size: cover;  position: relative; ">
	<div class="container col-12 col-sm-3 mx-auto  mt-5 bg-info p-3 text-light " style="position: absolute; ">
		<h3 class="display-6 text-center ">Iniciar Sesión</h3>
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

	       // $login = new ControladorUsuarios();
	       // $login -> ctrIngresoUsuario();
	        
	      ?>
		</form>
   
    </div>
 
</div-->


<div id="back"></div>

<div class="login-box">
  
  <div class="login-logo">

    <img src="vistas/img/logo.png" class="img-responsive" style="width: 50%; padding-top: 30px;">

  </div>

  <div class="login-box-body">

    <p class="login-box-msg">Ingresar al sistema</p>

    <form method="post">

      <div class="form-group has-feedback">

        <input type="text" class="form-control" placeholder="Usuario"  id="inputUser" name="inputUser" required>
      

      </div>

      <div class="form-group has-feedback">

        <input type="password" class="form-control" placeholder="Contraseña"  id="inputPassword" name="inputPassword" required>
        
      
      </div>

      <div class="row">
       
        <div class="col-xs-4 mx-auto " >

          <button type="submit" class="btn btn-info  btn-flat">Ingresar</button>
           <a class="btn btn-outline-warning " href="recuperarCuenta" role="button">Olvide mi contraseña</a>
        
        </div>

      </div>

      <?php

        $login = new ControladorUsuarios();
        $login -> ctrIngresoUsuario();
        
      ?>

    </form>

  </div>

</div>




