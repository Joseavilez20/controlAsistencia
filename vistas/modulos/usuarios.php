
  <section id="section-content" class="col-10">
          <nav aria-label="breadcrumb" class="mt-2">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
              <li class="breadcrumb-item active" aria-current="page">Usuarios</li>
            </ol>
          </nav>

          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#usuarioModal">
 		Agregar usuario
		</button>

            


         <table class="table tablas">

		  <thead  class="head-table">
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">Nombre</th>
		      <th scope="col">Usuario</th>
		      <th scope="col">Foto</th>
		      <th scope="col">Email</th>
		      <th scope="col">Fecha registro</th>
		     
		      
		      <th scope="col">Acciones</th>
		    </tr>
		  </thead>
		  <tbody>
		<?php
		  	$item = null;
          $valor = null;

        $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);
        

       foreach ($usuarios as $key => $value){
         
          echo ' <tr>
                  <td>'.($key+1).'</td>
                  

                 

                  <td>'.$value["nombre"].'</td>
                  <td>'.$value["usuario"].'</td>';

                   if($value["foto"] != ""){

                    echo '<td><img src="'.$value["foto"].'" class="img-thumbnail" width="40px"></td>';

                  }else{

                    echo '<td><img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail" width="40px"></td>';

                  }
                  
                  echo '<td>'.$value["email"].'</td>
                  <td>'.$value["fecha_registro"].'</td>';

           
                      

                  echo '<td>

                    <div class="btn-group" role="group" aria-label="Basic example">

                    
                      <button class="btn btn-warning btnEditarUsuario" idUsuario="'.$value["id"].'" data-toggle="modal" data-target="#usuarioModalEditar"><i class="fa fa-pencil"></i></button>

                      <button class="btn btn-danger btnEliminarUsuario" idUsuario="'.$value["id"].'" fotoUsuario="'.$value["foto"].'" usuario="'.$value["usuario"].'"><i class="fa fa-times"></i></button>

                    </div>  

                  </td>

                </tr>';
        }


		 ?>
		   
		  </tbody>
		</table>


        </section>

        <!-- Modal -->
	<div class="modal fade" id="usuarioModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

	  <div class="modal-dialog" role="document">

	    <div class="modal-content">

	      <form role="form" method="post" enctype="multipart/form-data">

		      <div class="modal-header bg-primary text-light">

		        <h5 class="modal-title" id="exampleModalLabel">Agregar usuario</h5>

		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

		          <span aria-hidden="true">&times;</span>

		        </button>

		      </div>

		      <div class="modal-body">
		         <!-- ENTRADA PARA EL NOMBRE -->
	            
	            <div class="form-group">
	              
	              <div class="input-group">
	              
	                <div class="input-group-prepend">

	                  <div class="input-group-text">

	                  	<span class="input-group-addon"><i class="fa fa-user"></i></span> 

	                  </div>

	                </div> 

	                <input type="text" class="form-control input-lg" name="nuevoNombre" placeholder="Ingresar nombre" required>

	              </div>

	            </div>

	            <!-- ENTRADA PARA EL USUARIO -->

	             <div class="form-group">
	              
	              <div class="input-group">


	                <div class="input-group-prepend">

	                  <div class="input-group-text">

	                  	<span class="input-group-addon"><i class="fa fa-key"></i></span> 
	                  	
	                  </div>

	                </div> 
	              
	              

	                <input type="text" class="form-control input-lg verificarUsuario" name="nuevoUsuario" placeholder="Ingresar usuario" id="nuevoUsuario" required>

	              </div>

	            </div>

	                <!-- ENTRADA PARA EL CORREO -->

	             <div class="form-group">
	              
	              <div class="input-group">


	                <div class="input-group-prepend">

	                  <div class="input-group-text">

	                  	<span class="input-group-addon"><i class="fa fa-address-card"></i></span> 
	                  	
	                  </div>

	                </div> 
	              
	              

	                <input type="email" class="form-control input-lg" name="nuevoCorreo" placeholder="Ingresar el correo"  required>

	              </div>

	            </div>

	             <input  name="nuevoPerfil" value="Administrador" hidden>

	            <!-- ENTRADA PARA LA CONTRASEÑA -->

	             <div class="form-group">
	              
	              <div class="input-group">


	                <div class="input-group-prepend">

	                  <div class="input-group-text">

	                  	<span class="input-group-addon"><i class="fa fa-lock"></i></span> 
	                  	
	                  </div>

	                </div> 
	              
	                

	                <input type="password" class="form-control input-lg" name="nuevoPassword" placeholder="Ingresar contraseña" required>

	              </div>

	            </div>

	            <!-- ENTRADA PARA SUBIR FOTO -->

	             <div class="form-group">
	              
	              <div class="panel">SUBIR FOTO</div>

	              <input type="file" class="nuevaFoto" name="nuevaFoto">

	              <p class="help-block">Peso máximo de la foto 2MB</p>

	              <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">

	            </div>

		      </div>

		      <div class="modal-footer">

		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

		        <button type="submit" class="btn btn-primary">Guardar</button>

		      </div>
		      <?php

		          $crearUsuario = new ControladorUsuarios();
		          $crearUsuario -> ctrCrearUsuario();

		        ?>
	      </form>
	    </div>
	  </div>
	</div>

	   <!-- Modal -->
	<div class="modal fade" id="usuarioModalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

	  <div class="modal-dialog" role="document">

	    <div class="modal-content">

	      <form role="form" method="post" enctype="multipart/form-data">

		      <div class="modal-header bg-primary text-light">

		        <h5 class="modal-title" id="exampleModalLabel">Editar usuario</h5>

		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

		          <span aria-hidden="true">&times;</span>

		        </button>

		      </div>

		      <div class="modal-body">
		         <!-- ENTRADA PARA EL NOMBRE -->
	            
	            <div class="form-group">
	              
	              <div class="input-group">
	              
	                <div class="input-group-prepend">

	                  <div class="input-group-text">

	                  	<span class="input-group-addon"><i class="fa fa-user"></i></span> 

	                  </div>

	                </div> 

	                <input type="text" class="form-control input-lg" id="editarNombre" name="editarNombre" value="" required>

	              </div>

	            </div>

	            <!-- ENTRADA PARA EL USUARIO -->

	             <div class="form-group">
	              
	              <div class="input-group">


	                <div class="input-group-prepend">

	                  <div class="input-group-text">

	                  	<span class="input-group-addon"><i class="fa fa-key"></i></span> 
	                  	
	                  </div>

	                </div> 
	              
	              

	                <input type="text" class="form-control input-lg verificarUsuario" name="editarUsuario"  id="editarUsuario" value="" readonly>

	              </div>

	            </div>

	                <!-- ENTRADA PARA EL CORREO -->

	             <div class="form-group">
	              
	              <div class="input-group">


	                <div class="input-group-prepend">

	                  <div class="input-group-text">

	                  	<span class="input-group-addon"><i class="fa fa-address-card"></i></span> 
	                  	
	                  </div>

	                </div> 
	              
	              

	                <input type="email" class="form-control input-lg" name="editarCorreo" id="editarCorreo"  value="" required>

	              </div>

	            </div>

	             <input  name="editarPerfil" id="editarPerfil" value="Administrador" value="" hidden>

	            <!-- ENTRADA PARA LA CONTRASEÑA -->

	             <div class="form-group">
	              
	              <div class="input-group">


	                <div class="input-group-prepend">

	                  <div class="input-group-text">

	                  	<span class="input-group-addon"><i class="fa fa-lock"></i></span> 
	                  	
	                  </div>

	                </div> 
	              
	                
				<input type="password" class="form-control input-lg" name="editarPassword" placeholder="Escriba la nueva contraseña">

                <input type="hidden" id="passwordActual" name="passwordActual" value="">

	              </div>

	            </div>

	            <!-- ENTRADA PARA SUBIR FOTO -->

	             <div class="form-group">
	              
	              <div class="panel">SUBIR FOTO</div>

	              <input type="file" class="nuevaFoto"   name="editarFoto">

	              <p class="help-block">Peso máximo de la foto 2MB</p>

	              <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">

	              <input type="hidden" name="fotoActual" id="fotoActual" value="">

	            </div>

		      </div>

		      <div class="modal-footer">

		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

		        <button type="submit" class="btn btn-primary">Guardar</button>

		      </div>
		      <?php

		          $editarUsuario = new ControladorUsuarios();
		          $editarUsuario -> ctrEditarUsuario();

		        ?>
	      </form>
	    </div>
	  </div>
	</div>

  <?php

      $borrarUsuario= new ControladorUsuarios();
      $borrarUsuario-> ctrBorrarUsuario();

?> 


   